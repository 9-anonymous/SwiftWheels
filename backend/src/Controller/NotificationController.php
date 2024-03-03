<?php
namespace App\Controller;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\NotificationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

class NotificationController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    
    #[Route('/notifications', name: 'app_notifications_unread', methods: ['GET'])]
    public function getUnreadNotifications(NotificationRepository $notificationRepository): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Not authenticated'], Response::HTTP_UNAUTHORIZED);
        }
    
        $notifications = $notificationRepository->findLatestNotificationsForUser($user, 10);
        $this->logger->info('Unread Notifications:', $notifications);

        $notificationArray = [];
        foreach ($notifications as $notification) {
            $notificationArray[] = [
                'id' => $notification->getId(),
                'message' => $notification->getMessage(),
                'messageTitle' => $notification->getMessageTitle(),
                'messageId' => $notification->getMessageId(), // Add the messageId field
                'isRead' => $notification->isRead(), // Add the isRead field
                'createdAt' => $notification->getCreatedAt()->format('Y-m-d H:i:s'), // Format the createdAt field
            ];
        }
    
        return new JsonResponse(['notifications' => $notificationArray]);
    }
  
    #[Route('/notifications/mark-as-read', name: 'app_notifications_mark_as_read', methods: ['POST'])]
    public function markNotificationsAsRead(ManagerRegistry $doctrine, NotificationRepository $notificationRepository, Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Not authenticated'], Response::HTTP_UNAUTHORIZED);
        }

        // Ensure the request's Content-Type is set to application/json
        
        $data = json_decode($request->getContent(), true);
        $notificationId = $data['id'] ?? null;

        if ($notificationId === null) {
            return new JsonResponse(['error' => 'Missing notification ID'], Response::HTTP_BAD_REQUEST);
        }

        $notification = $notificationRepository->find($notificationId);
        if (!$notification || $notification->getReceiver() !== $user) {
            return new JsonResponse(['error' => 'Invalid notification'], Response::HTTP_BAD_REQUEST);
        }

        $notification->setRead(true);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($notification);
        $entityManager->flush();

        return new JsonResponse(['success' => true]);
    }
    #[Route('/notifications/unread-count', name: 'app_notifications_unread_count', methods: ['GET'])]
public function getUnreadNotificationsCount(NotificationRepository $notificationRepository): JsonResponse
{
    $user = $this->getUser();
    if (!$user) {
        return new JsonResponse(['error' => 'Not authenticated'], Response::HTTP_UNAUTHORIZED);
    }

    $unreadCount = $notificationRepository->findUnreadNotificationsCountForUser($user);
    return new JsonResponse(['unreadCount' => $unreadCount]);
}


#[Route('/notifications/mark-all-as-read', name: 'app_notifications_mark_all_as_read', methods: ['POST'])]
public function markAllNotificationsAsRead(ManagerRegistry $doctrine, NotificationRepository $notificationRepository): JsonResponse
{
    $user = $this->getUser();
    if (!$user) {
        return new JsonResponse(['error' => 'Not authenticated'], Response::HTTP_UNAUTHORIZED);
    }

    $notificationRepository->markNotificationsAsRead($user);
    return new JsonResponse(['success' => true]);
}

#[Route('/notifications', name: 'app_notifications_all', methods: ['GET'])]
public function getAllNotifications(NotificationRepository $notificationRepository): JsonResponse
{
    $user = $this->getUser();
    if (!$user) {
        return new JsonResponse(['error' => 'Not authenticated'], Response::HTTP_UNAUTHORIZED);
    }

    $notifications = $notificationRepository->findAllNotificationsForUser($user);
    // Format the notifications as needed
    return new JsonResponse(['notifications' => $notifications]);
}
}

