<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SignupController extends AbstractController
{
    private $logger;
    private $urlGenerator;

    public function __construct(LoggerInterface $logger, UrlGeneratorInterface $urlGenerator)
    {
        $this->logger = $logger;
        $this->urlGenerator = $urlGenerator;
    }

    #[Route('/register', name: 'api_register', methods: ['POST'])]
    public function register(MailerInterface $mailer, UserPasswordHasherInterface $passwordHasher, Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $data = $request->request->all();
        $entityManager = $doctrine->getManager();
        $user = new User();
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $plaintextPassword = $data['password'];
        $hashedPassword = $passwordHasher->hashPassword($user, $plaintextPassword);
        $user->setPassword($hashedPassword);
        $pictureUrl = null;

        if ($request->files->get('picture')) {
            $uploadedFile = $request->files->get('picture');
            if ($uploadedFile) {
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
                try {
                    $uploadedFile->move($this->getParameter('upload_directory'), $newFilename);
                    $pictureUrl = $newFilename;
                } catch (FileException $e) {
                    $this->logger->error('File upload error:', [$e->getMessage()]);
                }
            }
        }

        $user->setPictureUrl($pictureUrl);
        $roles = is_array($data['roles']) ? $data['roles'] : [$data['roles']];

        // Handle registration failure case
        $failureResponse = new JsonResponse(['message' => 'Registration failed. Please try again.'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);

        if (in_array('ROLE_CLIENT', $roles)) {
            $user->setRoles(['ROLE_CLIENT']);
            $user->setBankAccount($data['bankAccount']);
            $entityManager->persist($user);
            $entityManager->flush();

            return new JsonResponse(['message' => 'Client registration successful.'], JsonResponse::HTTP_CREATED);
        } elseif (in_array('ROLE_EXPERT', $roles)) {
            // Generate a confirmation token
            $user->setConfirmationToken(bin2hex(random_bytes(32)));

            // Persist the user entity before sending the confirmation email
            $entityManager->persist($user);
            $entityManager->flush();

            // This ensures the user is added to the database
            // Generate the confirmation URL
            $confirmationUrl = $this->urlGenerator->generate('confirm_expert', ['token' => $user->getConfirmationToken()], UrlGeneratorInterface::ABSOLUTE_URL);

            // Prepare and send email to admins
            $adminUsers = $entityManager->getRepository(User::class)->findBy(['roles' => 'ROLE_ADMIN']);
            foreach ($adminUsers as $admin) {
                $email = (new Email())
                    ->from('no-reply@example.com')
                    ->to($admin->getEmail())
                    ->subject('Expert ' . $user->getUsername() . ' has registered on SwiftWheels website')
                    ->text('The expert ' . $user->getUsername() . ' has registered on the website. Please confirm their registration by clicking the following link: ' . $confirmationUrl);
                $mailer->send($email);
            }

            // Return the response indicating successful registration
            return new JsonResponse(['message' => 'Expert registration successful. Waiting for admin approval.'], JsonResponse::HTTP_CREATED);
        } else {
            // For other roles, you might want to handle them differently or add them to the database immediately
            // For now, we'll just return a message indicating the user needs to confirm their registration
            return new JsonResponse(['message' => 'User registered. Please check your email to confirm your registration.'], JsonResponse::HTTP_CREATED);
        }

        return $failureResponse;
    }

    #[Route('/confirm-expert/{token}', name: 'confirm_expert', methods: ['GET'])]
    public function confirmExpert(string $token, ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $user = $entityManager->getRepository(User::class)->findOneBy(['confirmationToken' => $token]);

        if (!$user) {
            return new JsonResponse(['message' => 'Invalid token'], JsonResponse::HTTP_BAD_REQUEST);
        }

        // Update the user's role to ROLE_EXPERT
        $user->setRoles(['ROLE_EXPERT']);
        $user->setConfirmationToken(null); // Clear the token

        // Persist and flush the user entity after confirmation
        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Expert confirmed'], JsonResponse::HTTP_OK);
    }
}