<?php
// src/Repository/NotificationRepository.php
namespace App\Repository;

use App\Entity\Notification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notification::class);
    }

    public function findUnreadNotificationsForUser($user)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.receiver = :user')
            ->andWhere('n.isRead = :read')
            ->setParameter('user', $user)
            ->setParameter('read', false)
            ->getQuery()
            ->getResult();
    }

    public function markNotificationsAsRead($user)
    {
        $this->createQueryBuilder('n')
            ->update(Notification::class, 'n')
            ->set('n.isRead', ':read')
            ->where('n.receiver = :user')
            ->setParameter('user', $user)
            ->setParameter('read', true)
            ->getQuery()
            ->execute();
    }
    public function findLatestNotificationsForUser($user, $limit)
{
    return $this->createQueryBuilder('n')
        ->andWhere('n.receiver = :user')
        ->orderBy('n.createdAt', 'DESC')
        ->setMaxResults($limit)
        ->setParameter('user', $user)
        ->getQuery()
        ->getResult();
}
    public function findUnreadNotificationsCountForUser($user)
{
    return $this->createQueryBuilder('n')
        ->select('COUNT(n.id)')
        ->where('n.receiver = :user')
        ->andWhere('n.isRead = :read')
        ->setParameter('user', $user)
        ->setParameter('read', false)
        ->getQuery()
        ->getSingleScalarResult();
}
public function findAllNotificationsForUser($user)
{
    return $this->createQueryBuilder('n')
        ->andWhere('n.receiver = :user')
        ->setParameter('user', $user)
        ->getQuery()
        ->getResult();
}
}
