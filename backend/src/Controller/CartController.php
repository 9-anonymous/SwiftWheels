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
    /**
     * @Route("/cart/add", name="cart_add", methods={"POST"})
     */
    public function addToCart(ManagerRegistry $doctrine,Request $request, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent(), true);
        $carId = $data['carId'] ?? null;
        $userId = $data['userId'] ?? null;
        $price = $data['price'] ?? null;

        // Assuming you have a method to get the current user
        $user = $doctrine->getRepository(User::class)->find($userId);
        $car = $doctrine->getRepository(Car::class)->find($carId);

        if (!$user || !$car) {
            return $this->json(['message' => 'User or car not found'], Response::HTTP_NOT_FOUND);
        }

        $cartItem = new Cart();
        $cartItem->setUser($user);
        $cartItem->setCar($car);
        $cartItem->setPrice($price);

        $em->persist($cartItem);
        $em->flush();

        return $this->json(['message' => 'Car added to cart'], Response::HTTP_CREATED);
    }
}
