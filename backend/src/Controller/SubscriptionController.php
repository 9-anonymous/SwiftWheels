<?php

// src/Controller/SubscriptionController.php

namespace App\Controller;

use App\Entity\Subscription;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class SubscriptionController extends AbstractController
{
    #[Route('/subscribe', name: 'subscribe', methods: ['POST'])]
    public function subscribe(Request $request, ManagerRegistry $doctrine, UserInterface $user): JsonResponse
    {
        $data = $request->request->all();
        $duration = $data['duration'];
        $entityManager = $doctrine->getManager();
        
        // Calculate subscription end date based on duration
        $subEnd = new \DateTime();
        switch ($duration) {
            case '1 month':
                $subEnd->modify('+1 month');
                break;
            case '6 months':
                $subEnd->modify('+6 months');
                break;
            case '1 year':
                $subEnd->modify('+1 year');
                break;
            default:
                return new JsonResponse(['message' => 'Invalid subscription duration.'], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        // Update user's bank amount
        $user->setBankAmount($user->getBankAmount() - $this->calculatePrice($duration));
        $user->setIsSubscribed(true);
        
        // Create and persist subscription
        $subscription = new Subscription();
        $subscription->setUser($user);
        $subscription->setSubEnd($subEnd);
        $entityManager->persist($subscription);
        $entityManager->flush();
        
        return new JsonResponse(['message' => 'Subscription successful.'], JsonResponse::HTTP_CREATED);
    }

    private function calculatePrice(string $duration): int
    {
        switch ($duration) {
            case '1 month':
                return 10;  // $10
            case '6 months':
                return 50;  // $50
            case '1 year':
                return 90;  // $90
            default:
                throw new \InvalidArgumentException('Invalid subscription duration.');
        }
    }
}
