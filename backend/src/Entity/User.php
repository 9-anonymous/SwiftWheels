<?php

namespace App\Entity;
use App\Entity\Car;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
        #[Groups("user:read")]

    private int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Groups("user:read")]

    private ?string $email;

    #[ORM\Column(type: 'string')]
    #[Groups("user:read")]

    private string $password;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $bankAccount = null;

    #[ORM\Column(type:"integer", nullable: true)]
    private ?int $bankAmount = null;
    

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $jobTitle = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups("user:read")]

    private ?string $speciality = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $jobDescription = null;
    
    #[ORM\Column(type: 'string', length: 255, nullable: false, options: ['default' => 'ROLE_CLIENT'])]
    #[Groups("user:read")]

    private string $roles = 'ROLE_CLIENT';


    #[ORM\Column(length: 255)]     
    
    #[Groups("user:read")]
     private ?string $username = null;


    #[ORM\Column(type: 'string', nullable: true)]
private ?string $pictureUrl = null;

#[ORM\Column(type: 'string', length: 255, nullable: true)]
private ?string $confirmationToken = null;

#[ORM\OneToMany(targetEntity: Car::class, mappedBy: "user")]
#[Groups("user:read")]
private $cars;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }
  /**
     * @return Collection|Car[]
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): self
    {
        if (!$this->cars->contains($car)) {
            $this->cars[] = $car;
            $car->setUser($this);
        }

        return $this;
    }

    public function removeCar(Car $car): self
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getUser() === $this) {
                $car->setUser(null);
            }
        }

        return $this;
    }

public function getConfirmationToken(): ?string
{
    return $this->confirmationToken;
}

public function setConfirmationToken(?string $confirmationToken): self
{
    $this->confirmationToken = $confirmationToken;

    return $this;
}


    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUsername(): ?string
    {
        return $this->username;
    }
    
    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        return explode(',', $this->roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = implode(',', $roles);

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getBankAccount(): ?string
    {
        return $this->bankAccount;
    }

    public function setBankAccount(?string $bankAccount): self
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }
    public function getBankAmount(): ?int
    {
        return $this->bankAmount;
    }

    public function setBankAmount(?int $bankAmount): self
    {
        $this->bankAmount = $bankAmount;

        return $this;
    }
   

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(?string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getPictureUrl(): ?string
{
    return $this->pictureUrl;
}

public function setPictureUrl(?string $pictureUrl): self
{
    $this->pictureUrl = $pictureUrl;

    return $this;
}
public function getJobDescription(): ?string
    {
        return $this->jobDescription;
    }

    public function setJobDescription(?string $jobDescription): self
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    

}
