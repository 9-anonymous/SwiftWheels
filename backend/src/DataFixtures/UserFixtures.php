<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $pictureUrl = 'profilepicture-6611bc955ada0.jpg';

        $admin = new User();
        $admin->setUsername('Admin');
        $admin->setEmail('admin@gmail.com');
        $adminPassword = $this->passwordHasher->hashPassword($admin, '0000');
        $admin->setPassword($adminPassword);
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPictureUrl($pictureUrl); 
        $manager->persist($admin);

        $client = new User();
        $client->setUsername('client1');
        $client->setEmail('client1@example.com');
        $clientPassword = $this->passwordHasher->hashPassword($client, '0000');
        $client->setPassword($clientPassword);
        $client->setRoles(['ROLE_CLIENT']);
        $client->setBankAccount('123456789');
        $client->setPictureUrl($pictureUrl);  
        $manager->persist($client);

        $expert = new User();
        $expert->setUsername('expert1');
        $expert->setEmail('expert1@example.com');
        $expertPassword = $this->passwordHasher->hashPassword($expert, '0000');
        $expert->setPassword($expertPassword);
        $expert->setRoles(['ROLE_EXPERT']);
        $expert->setJobTitle('Job 1');
        $expert->setSpeciality('Speciality 1');
        $expert->setPictureUrl($pictureUrl); 
        $manager->persist($expert);

        $manager->flush();
    }
}
