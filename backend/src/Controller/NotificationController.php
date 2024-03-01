<?php
namespace App\Controller;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\NotificationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;

class NotificationController extends AbstractController
{
    #[Route('/notifications/unread', name: 'app_notifications_unread', methods: ['GET'])]
    public function getUnreadNotifications(NotificationRepository $notificationRepository): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Not authenticated'], Response::HTTP_UNAUTHORIZED);
        }
    
        $notifications = $notificationRepository->findUnreadNotificationsForUser($user);
        $notificationArray = [];
        foreach ($notifications as $notification) {
            $notificationArray[] = [
                'id' => $notification->getId(),
                'message' => $notification->getMessage(),
                // Add other necessary fields
            ];
        }
    
        return new JsonResponse(['notifications' => $notificationArray]);
    }
    #[Route('/notifications/unread/count', name: 'app_notifications_unread_count', methods: ['GET'])]
public function getUnreadNotificationsCount(NotificationRepository $notificationRepository): JsonResponse
{
    $user = $this->getUser();
    if (!$user) {
        return new JsonResponse(['error' => 'Not authenticated'], Response::HTTP_UNAUTHORIZED);
    }

    $count = $notificationRepository->findUnreadNotificationsCountForUser($user);

    return new JsonResponse(['count' => $count]);
}
#[Route('/notifications/mark-as-read', name: 'app_notifications_mark_as_read', methods: ['POST'])]
public function markNotificationsAsRead(ManagerRegistry $doctrine,NotificationRepository $notificationRepository): JsonResponse
{
    $user = $this->getUser();
    if (!$user) {
        return new JsonResponse(['error' => 'Not authenticated'], Response::HTTP_UNAUTHORIZED);
    }

    $notifications = $notificationRepository->findUnreadNotificationsForUser($user);
    $notificationArray = [];
    foreach ($notifications as $notification) {
        $notification->setRead(true);
        $notificationArray[] = [
            'id' => $notification->getId(),
            'message' => $notification->getMessage(),
            'messageUrl' => $notification->getMessageUrl(),
        ];
    }
    $entityManager = $doctrine->getManager();
    $entityManager->flush();

 
    return new JsonResponse(['notifications' => $notificationArray]);
}}