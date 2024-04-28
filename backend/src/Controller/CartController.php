<?php
// src/Controller/CartController.php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Car;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class CartController extends AbstractController
{
    
    #[Route('/cart/add', name: "cart_add", methods: ['POST'])]

    public function addToCart(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $em): Response {
        $user = $this->getUser(); // Get the currently logged-in user
        if (!$user) {
            return $this->json(['message' => 'User not logged in'], Response::HTTP_UNAUTHORIZED);
        }
    
        $userId = $user->getId(); // Get the user's ID
        $data = json_decode($request->getContent(), true);
        $carId = $data['carId'] ?? null;
        $price = $data['price'] ?? null;
    
        $car = $doctrine->getRepository(Car::class)->find($carId);
        if (!$car) {
            return $this->json(['message' => 'Car not found'], Response::HTTP_NOT_FOUND);
        }
    
        $cartItem = new Cart();
        $cartItem->setUser($user);
        $cartItem->setCar($car);
        $cartItem->setPrice($price);
        $em->persist($cartItem);
        $em->flush();
    
        return $this->json(['message' => 'Car added to cart'], Response::HTTP_CREATED);
    }
    #[Route('/cart/items/{userId}', name: "cart_items", methods: ['GET'])]
    public function getCartItems(ManagerRegistry $doctrine, int $userId): Response {
      
        $cartRepository = $doctrine->getRepository(Cart::class);

        $queryBuilder = $cartRepository->createQueryBuilder('c')
            ->select('c', 'car')
            ->join('c.car', 'car')
            ->where('c.user = :userId')
            ->setParameter('userId', $userId);

        $cartItems = $queryBuilder->getQuery()->getResult();

        $cartItemsArray = array_map(function ($item) {
            $car = $item->getCar();
            return [
                'id' => $item->getId(),
                'car' => [
                    'id' => $car->getId(),
                    'description' => $car->getDescription(),
                    'mark' => $car->getMark(),
                    'model' => $car->getModel(),
                    'pictures' => $car->getpictures(),

                ],
                'price' => $item->getPrice(),
            ];
        }, $cartItems);

        return $this->json($cartItemsArray);
    }


    #[Route('/cart/payment', name: "cart_payment", methods: ['POST'])]
    public function handlePayment(Request $request, EntityManagerInterface $em): Response {
        $data = json_decode($request->getContent(), true);
        $itemId = $data['itemId'] ?? null;
        $paymentAmount = $data['paymentAmount'] ?? null;
    
        // Fetch the cart item
        $cartItem = $em->getRepository(Cart::class)->find($itemId);
        if (!$cartItem) {
            return $this->json(['message' => 'Cart item not found'], Response::HTTP_NOT_FOUND);
        }
        $user = $this->getUser(); // Get the currently logged-in user
        if (!$user) {
            return $this->json(['message' => 'User not logged in'], Response::HTTP_UNAUTHORIZED);
        }
        // Deduct the payment amount from the user's bank account
        $userBankAmount = $user->getBankAmount();
        if ($userBankAmount < $paymentAmount) {
            return $this->json(['message' => 'Insufficient funds'], Response::HTTP_BAD_REQUEST);
        }
        $user->setBankAmount($userBankAmount - $paymentAmount);
    
        // Persist changes to the database
        $em->flush();
    
        return $this->json(['message' => 'Payment successful'], Response::HTTP_OK);
    }
    
    
    
    

// Add this route for deleting a cart item
#[Route('/cart/delete/{itemId}', name: "cart_delete", methods: ['DELETE'])]
public function deleteCartItem(int $itemId, EntityManagerInterface $em): Response {
    $cartItem = $em->getRepository(Cart::class)->find($itemId);
    if (!$cartItem) {
        return $this->json(['message' => 'Cart item not found'], Response::HTTP_NOT_FOUND);
    }

    $em->remove($cartItem);
    $em->flush();

    return $this->json(['message' => 'Cart item deleted'], Response::HTTP_OK);
}

}