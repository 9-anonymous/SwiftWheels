<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Psr\Log\LoggerInterface;

class SignupController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/register', name: 'api_register', methods: ['POST'])]
    public function register(UserPasswordHasherInterface $passwordHasher, Request $request, ManagerRegistry $doctrine): JsonResponse
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
                    $uploadedFile->move(
                        $this->getParameter('upload_directory'),
                        $newFilename
                    );
                    $pictureUrl = $newFilename;
                } catch (FileException $e) {
                    $this->logger->error('File upload error:', [$e->getMessage()]);
                }
            }
        }

        $user->setPictureUrl($pictureUrl);

        $roles = is_array($data['roles']) ? $data['roles'] : [$data['roles']];
        if (in_array('ROLE_CLIENT', $roles)) {
            $user->setRoles(['ROLE_CLIENT']);
            $user->setBankAccount($data['bankAccount']);
        } elseif (in_array('ROLE_EXPERT', $roles)) {
            $user->setRoles(['ROLE_EXPERT']);
            $user->setJobTitle($data['jobTitle']);
            $user->setSpeciality($data['speciality']);
        } else {
            $user->setRoles(['ROLE_USER']);
        }
        
        $entityManager->persist($user);
        $entityManager->flush();
        
        return new JsonResponse(['message' => 'User registered'], JsonResponse::HTTP_CREATED);
    }
    
}