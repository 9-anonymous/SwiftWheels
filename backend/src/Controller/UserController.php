<?php

namespace App\Controller;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
 use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    #[Route('/users/role/{role}', name: 'app_user_by_role', methods: ['GET'])]
    public function getUsersByRole($role, UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findByRole($role);
        $usernames = array_map(function ($user) {
            return $user->getUsername();
        }, $users);
    
        return new JsonResponse($usernames);
    }
    
    #[Route('/api/users', name: "api_clients", methods: ['GET'])]
    public function getClients(UserRepository $UserRepository): JsonResponse
    {
        $Users = $UserRepository->findAll();
        
        return $this->json($Users, 200, [], ['groups' => 'user:read']);
    }
    #[Route('/api/users/{id}', name: 'api_delete_client', methods: ['DELETE'])]
    public function deleteClient($id, EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            // Fetch the User entity
            $user = $entityManager->getRepository(User::class)->find($id);
    
            if (!$user) {
                throw $this->createNotFoundException('Client non trouvé.');
            }
    
            // Remove the User entity
            $entityManager->remove($user);
            $entityManager->flush();
    
            return $this->json(['message' => 'Client supprimé avec succès.']);
        } catch (EntityNotFoundException $e) {
            // Handle the EntityNotFoundException
            return $this->json(['error' => 'Erreur lors de la récupération du client.'], 500);
        }
    }
        #[Route('/api/users/count', name: 'api_count_clients', methods: ['GET'])]
    public function countClients(UserRepository $userRepository): JsonResponse
    {
        $count = $userRepository->count([]);
    
        return $this->json($count);
    }
    #[Route('/users', name: 'app_user', methods: ['GET'])]
    public function listUsers(Request $request, ManagerRegistry $doctrine, UserRepository $userRepository): JsonResponse
    
        {
            $users = $userRepository->findAll();
            $usernames = [];
            foreach ($users as $user) {
                $usernames[] = $user->getUsername();
            }
            return new JsonResponse($usernames);
        }
    }