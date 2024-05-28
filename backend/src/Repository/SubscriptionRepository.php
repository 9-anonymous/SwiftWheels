<?php
namespace App\Repository;

use App\Entity\Subscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SubscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subscription::class);
    }

    public function findExpiredSubscriptions()
    {
        $now = new \DateTime();
        return $this->createQueryBuilder('s')
                    ->where('s.endDate < :now')
                    ->setParameter('now', $now)
                    ->getQuery()
                    ->getResult();
    }
}
