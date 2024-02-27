<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

public function findUniqueBrands(): array
{
    return $this->createQueryBuilder('c')
        ->select('DISTINCT c.Mark')
        ->orderBy('c.Mark', 'ASC')
        ->getQuery()
        ->getResult();
}

public function findModelsByMark(string $mark): array
{
    return $this->createQueryBuilder('c')
        ->select('DISTINCT c.Model')
        ->where('c.Mark = :mark')
        ->setParameter('mark', $mark)
        ->orderBy('c.Model', 'ASC')
        ->getQuery()
        ->getResult();
}

public function findBySearchCriteria(string $selectedMark, string $selectedModel, int $priceRangeMin, int $priceRangeMax): array
{
    $qb = $this->createQueryBuilder('c')
        ->andWhere('c.Mark = :mark')
        ->andWhere('c.Model = :model')
        ->andWhere('c.Price >= :minPrice')
        ->andWhere('c.Price <= :maxPrice')
        ->setParameter('mark', $selectedMark)
        ->setParameter('model', $selectedModel)
        ->setParameter('minPrice', $priceRangeMin)
        ->setParameter('maxPrice', $priceRangeMax)
        ->getQuery();

    return $qb->getResult();
}

}