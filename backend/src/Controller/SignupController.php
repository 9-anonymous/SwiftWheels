<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Annotation\Route;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SignupController extends AbstractController
{
 
#[Route('/register', name: 'api_register', methods: ['POST'])]
    public function register(UserPasswordHasherInterface $passwordHasher,Request $request, \Doctrine\Persistence\ManagerRegistry $doctrine): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $entityManager = $doctrine->getManager();
        
        $user = new User();
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $plaintextPassword=$data['password']; // Ensure password is hashed
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $entityManager->persist($user);
        $entityManager->flush();
    
        return new JsonResponse(['message' => 'User registered'], JsonResponse::HTTP_CREATED);
    }
    }
