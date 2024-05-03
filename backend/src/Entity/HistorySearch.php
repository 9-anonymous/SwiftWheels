<?php

namespace App\Entity;

use App\Repository\HistorySearchRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistorySearchRepository::class)]
class HistorySearch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $userId = null;

    #[ORM\Column(length: 255)]
    private ?string $mark = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $priceRangeMin = null;

    #[ORM\Column]
    private ?int $priceRangeMax = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(string $mark): static
    {
        $this->mark = $mark;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getPriceRangeMin(): ?int
    {
        return $this->priceRangeMin;
    }

    public function setPriceRangeMin(int $priceRangeMin): static
    {
        $this->priceRangeMin = $priceRangeMin;

        return $this;
    }

    public function getPriceRangeMax(): ?int
    {
        return $this->priceRangeMax;
    }

    public function setPriceRangeMax(int $priceRangeMax): static
    {
        $this->priceRangeMax = $priceRangeMax;

        return $this;
    }
}
