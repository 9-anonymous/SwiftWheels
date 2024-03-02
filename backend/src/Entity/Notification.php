<?php
// src/Entity/Notification.php
namespace App\Entity;

use Doctrine\DBAL\Types\Types; // Add this use statement
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $receiver = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isRead = false;
    // Additional fields like createdAt, read status, etc.
    #[ORM\Column(nullable: true)]
    private ?int $messageId = null;
    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $messageTitle = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function setReceiver(?User $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
    public function isRead(): bool
    {
        return $this->isRead;
    }
    
    public function setRead(bool $isRead): self
    {
        $this->isRead = $isRead;
    
        return $this;
    }


    public function getMessageId(): ?int
{
    return $this->messageId;
}

public function setMessageId(?int $messageId): self
{
    $this->messageId = $messageId;

    return $this;
}

// Add a constructor to set default values
public function __construct()
{
    $this->isRead = false;
}
 
public function getMessageTitle(): ?string
{
    return $this->messageTitle;
}

public function setMessageTitle(?string $messageTitle): self
{
    $this->messageTitle = $messageTitle;

    return $this;
}
}
