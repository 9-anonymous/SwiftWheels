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
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class UserController extends AbstractController
{
    #[Route('/users/subscribed-experts', name: 'app_subscribed_experts', methods: ['GET'])]
public function getSubscribedExperts(UserRepository $userRepository): JsonResponse
{
    $experts = $userRepository->findBy(['roles' => 'ROLE_EXPERT', 'isSubscribed' => true]);
    $usernames = array_map(function ($user) {
        return $user->getUsername();
    }, $experts);

    return new JsonResponse($usernames);
}

#[Route('/users/role/{role}', name: 'app_user_by_role', methods: ['GET'])]
public function getUsersByRole($role, UserRepository $userRepository, Request $request): JsonResponse
{
    // Check if we need to filter by subscription status
    $filterSubscribed = $request->query->get('filterSubscribed') === 'true';

    if ($role === 'ROLE_EXPERT' && $filterSubscribed) {
        $users = $userRepository->findBy(['roles' => $role, 'isSubscribed' => true]);
    } else {
        $users = $userRepository->findByRole($role);
    }

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
  

        #[Route('/users/{id}', name: 'app_user_details', methods: ['GET'])]
        public function getUserDetails($id, UserRepository $userRepository): JsonResponse
        {
            $user = $userRepository->find($id);
        
            if (!$user) {
                return new JsonResponse(['message' => 'User not found'], 404);
            }
        
            $data = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'roles' => $user->getRoles(),
                'pictureUrl' => $user->getPictureUrl(),
                'bankAccount' => $user->getBankAccount(),
                'bankAmount' => $user->getBankAmount(),
                'jobTitle' => $user->getJobTitle(),
                'speciality' => $user->getSpeciality(),
                'jobDescription' => $user->getJobDescription(),
                'confirmationToken' => $user->getConfirmationToken(),
                'isSubscribed' => $user->getIsSubscribed(),
            ];
        
            return new JsonResponse($data);
        }
        

    }