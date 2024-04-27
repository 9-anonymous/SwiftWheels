<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\User;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("car")]
    private ?int $id = null;

    #[ORM\Column(length:  255, nullable: true)]
    #[Groups("car")]
    private ?string $mark = null;    

    #[ORM\Column(length:  255, nullable: true)]
    #[Groups("car")]
    private ?string $model = null;

    #[ORM\Column(type: 'integer')]
    #[Groups("car")]
    private ?int $price = null;

    #[ORM\Column(length:  255)]
    #[Groups("car")]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length:  255, nullable: true)]
    #[Groups("car")]
    private ?string $pictures = null;

    #[ORM\Column(type: 'boolean')]
    #[Groups("car")]
    private ?bool $abs = null;

    #[ORM\Column(type: 'boolean')]
    #[Groups("car")]
    private ?bool $epc = null;

    #[ORM\Column(type: 'boolean')]
    #[Groups("car")]
    private ?bool $grayCard = null;

    #[ORM\Column(type: 'boolean')]
    #[Groups("car")]
    private ?bool $autoGearBox = null;

    #[ORM\Column(type: 'boolean')]
    #[Groups("car")]
    private ?bool $taxes = null;

    #[ORM\Column(type: 'boolean')]
    #[Groups("car")]
    private ?bool $insurance = null;

    #[ORM\Column(length:  255)]
    #[Groups("car")]
    private ?string $color = null;

    #[ORM\Column(type: 'integer')]
    #[Groups("car")]
    private ?int $mileage = null;

    #[ORM\Column(type: 'integer')]
    #[Groups("car")]
    private ?int $quantity = null;

    #[ORM\Column(type: 'datetime')]
    #[Groups("car")]
    private ?\DateTimeInterface $addDate = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $sellDate = null;


    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "cars")]
    #[ORM\JoinColumn(nullable: false)]
    
    private $user;

    // Getter and setter methods
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(?string $mark): self
    {
        $this->mark = $mark;
        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getpictures(): ?string
    {
        return $this->pictures;
    }

    public function setpictures(?string $pictures): self
    {
        $this->pictures = $pictures;
        return $this;
    }

    public function getAbs(): ?bool
    {
        return $this->abs;
    }

    public function setAbs(?bool $abs): self
    {
        $this->abs = $abs;
        return $this;
    }

    public function getEpc(): ?bool
    {
        return $this->epc;
    }

    public function setEpc(?bool $epc): self
    {
        $this->epc = $epc;
        return $this;
    }

    public function getGrayCard(): ?bool
    {
        return $this->grayCard;
    }

    public function setGrayCard(?bool $grayCard): self
    {
        $this->grayCard = $grayCard;
        return $this;
    }

    public function getAutoGearBox(): ?bool
    {
        return $this->autoGearBox;
    }

    public function setAutoGearBox(?bool $autoGearBox): self
    {
        $this->autoGearBox = $autoGearBox;
        return $this;
    }

    public function getTaxes(): ?bool
    {
        return $this->taxes;
    }

    public function setTaxes(?bool $taxes): self
    {
        $this->taxes = $taxes;
        return $this;
    }

    public function getInsurance(): ?bool
    {
        return $this->insurance;
    }

    public function setInsurance(?bool $insurance): self
    {
        $this->insurance = $insurance;
        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(?int $mileage): self
    {
        $this->mileage = $mileage;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getAddDate(): ?\DateTimeInterface
    {
        return $this->addDate;
    }

    public function setAddDate(?\DateTimeInterface $addDate): self
    {
        $this->addDate = $addDate;
        return $this;
    }

    public function getSellDate(): ?\DateTimeInterface
    {
        return $this->sellDate;
    }

    public function setSellDate(?\DateTimeInterface $sellDate): self
    {
        $this->sellDate = $sellDate;
        return $this;
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

}
