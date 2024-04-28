<?php
// src/Entity/Cart.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "App\Repository\CartRepository")]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: Car::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $car;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $price;

    
#[ORM\OneToOne(targetEntity: Receipt::class, mappedBy: "cart")]
private ?Receipt $receipt = null;

    
    #[ORM\Column(type: "boolean", options: ["default" => false])]

    private $purchased = false;

    // Getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }
    public function getReceipt(): ?Receipt
    {
        return $this->receipt;
    }
    
    public function setReceipt(?Receipt $receipt): self
    {
        $this->receipt = $receipt;
    
        return $this;
    }
    
        public function isPurchased(): ?bool
    {
        return $this->purchased;
    }

    public function setPurchased(bool $purchased): self
    {
        $this->purchased = $purchased;

        return $this;
    }

}
