<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['POST'])]
    public function login(Request $request, ManagerRegistry $doctrine, JWTTokenManagerInterface $JWTManager, SessionInterface $session, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        /** @var User $user */
        $user = $doctrine->getRepository(User::class)->findOneBy(['username' => $data['username']]);

        if (!$user) {
            return new JsonResponse(['message' => 'Username not found'],  401);
        }

        // Use the verify() method to check the password
        if (!$passwordHasher->isPasswordValid($user, $data['password'])) {
                        return new JsonResponse(['message' => 'Incorrect password'],  401);
        }

        // Generate the JWT Token
        $token = $JWTManager->create($user);
        $session->set('user_id', $user->getId());

        return new JsonResponse([
            'token' => $token,
            'userId' => $user->getId(), 
            'roles' => $user->getRoles(),

        ]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['POST'])]
    public function logout(): void
    {
        // Implement logout logic if needed
        // Note: Symfony handles logout through its firewall configuration, no need for explicit logout logic here.
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
