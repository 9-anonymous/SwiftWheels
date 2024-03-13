<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SignupController extends AbstractController
{
    #[Route('/register', name: 'api_register', methods: ['POST'])]
    public function register(UserPasswordHasherInterface $passwordHasher, Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $entityManager = $doctrine->getManager();

        $user = new User();
        $user->setUsername($data['username']);

        $user->setEmail($data['email']);
        $plaintextPassword = $data['password'];
        $hashedPassword = $passwordHasher->hashPassword($user, $plaintextPassword);
        $user->setPassword($hashedPassword);

        // Assign roles and additional attributes based on roles array
        if (in_array('ROLE_CLIENT', $data['roles'])) {
            $user->setRoles(['ROLE_CLIENT']);
            $user->setBankAccount($data['bankAccount']);
        } elseif (in_array('ROLE_EXPERT', $data['roles'])) {
            $user->setRoles(['ROLE_EXPERT']);
            $user->setJobTitle($data['jobTitle']);
            $user->setSpeciality($data['speciality']);
        } else {
            $user->setRoles(['ROLE_USER']); // Set default role if no specific role is provided
        }

        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse(['message' => 'User registered'], JsonResponse::HTTP_CREATED);
    }
}