<?php
// src/Controller/CartController.php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Car;
use App\Entity\User;
use App\Entity\Receipt;

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
#[Route('/receipt/items/{userId}', name: "receipt_items", methods: ['GET'])]
public function getPurchasedItems(ManagerRegistry $doctrine, int $userId): Response {
    $receiptRepository = $doctrine->getRepository(Receipt::class);

    $queryBuilder = $receiptRepository->createQueryBuilder('r')
        ->select('r', 'c', 'car')
        ->join('r.cart', 'c')
        ->join('c.car', 'car')
        ->where('c.user = :userId')
        ->setParameter('userId', $userId);

    $purchasedItems = $queryBuilder->getQuery()->getResult();

    $purchasedItemsArray = array_map(function ($item) {
        $car = $item->getCart()->getCar();
        return [
            'id' => $item->getId(),
            'car' => [
                'id' => $car->getId(),
                'description' => $car->getDescription(),
                'mark' => $car->getMark(),
                'model' => $car->getModel(),
                'pictures' => $car->getPictures(),
            ],
            'price' => $item->getCart()->getPrice(),
            'purchaseDate' => $item->getPurchaseDate()->format('Y-m-d H:i:s'),
        ];
    }, $purchasedItems);

    return $this->json($purchasedItemsArray);
}
#[Route('/receipt/create', name: "receipt_create", methods: ['POST'])]
public function createReceipt(Request $request, EntityManagerInterface $em): Response {
    $data = json_decode($request->getContent(), true);
    $cartData = $data['cart'] ?? null;
    $purchaseDate = $data['purchaseDate'] ?? null;

    if (!$cartData || !$purchaseDate) {
        return $this->json(['message' => 'Invalid data'], Response::HTTP_BAD_REQUEST);
    }

    $cartId = $cartData['id'];
    $cart = $em->getRepository(Cart::class)->find($cartId);

    if (!$cart) {
        return $this->json(['message' => 'Cart item not found'], Response::HTTP_NOT_FOUND);
    }

    $receipt = new Receipt();
    $receipt->setCart($cart);
    $receipt->setPurchaseDate(new \DateTime($purchaseDate));

    $em->persist($receipt);
    $em->flush();

    return $this->json(['message' => 'Receipt created'], Response::HTTP_CREATED);
}

}