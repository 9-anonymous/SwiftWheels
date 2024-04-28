<?php

namespace App\Entity;

 use App\Repository\ReceiptRepository;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass:"App\Repository\ReceiptRepository")]
 
class Receipt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $receiptId = null;

 
    
    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $purchaseDate;
    
    #[ORM\OneToOne(targetEntity: Cart::class, inversedBy: "receipt")]
    private ?Cart $cart = null;
    

    public function getId(): ?int
    {
        return $this->receiptId;
    }


    public function getPurchaseDate(): ?\DateTimeInterface
{
    return $this->purchaseDate;
}

public function setPurchaseDate(\DateTimeInterface $purchaseDate): self
{
    $this->purchaseDate = $purchaseDate;
    return $this;
}
public function getCart(): ?Cart
{
    return $this->cart;
}

public function setCart(?Cart $cart): self
{
    $this->cart = $cart;

    return $this;
}

}
