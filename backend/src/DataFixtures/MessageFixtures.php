<?php

namespace App\DataFixtures;

use App\Entity\Message;
use App\Entity\Notification;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MessageFixtures extends Fixture implements DependentFixtureInterface
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $expert = $manager->getRepository(User::class)->findOneBy(['username' => 'expert1']);
        $client = $manager->getRepository(User::class)->findOneBy(['username' => 'client1']);

        if (!$expert || !$client) {
            throw new \Exception('Expert or client user not found. Please ensure UserFixtures has run first.');
        }

        for ($i = 1; $i <= 7; $i++) {
            $message = new Message();
            $message->setTitle("Message $i");
            $message->setContent("This is message number $i.");
            $message->setSender($expert);
            $message->setReceiver($client);
            $message->setCreatedAt(new \DateTime());
            $manager->persist($message);

            $notification = new Notification();
            $notification->setReceiver($client);
            $notification->setSender($expert);
            $notification->setMessage($message->getContent());
            $notification->setMessageId($message->getId());
            $notification->setMessageTitle($message->getTitle());
            $notification->setCreatedAt(new \DateTime());
            $manager->persist($notification);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,  
        ];
    }
}