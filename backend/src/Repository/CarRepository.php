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
            ->select('DISTINCT c.mark') // Corrected to lowercase 'mark'
            ->orderBy('c.mark', 'ASC') // Corrected to lowercase 'mark'
            ->getQuery()
            ->getResult();
    }
    

    public function findAllCars(): array
    {
        $queryBuilder = $this->createQueryBuilder('c')
            ->select('c')
            ->orderBy('c.mark', 'ASC');
    
        // Debugging: Dump the SQL query
        dump($queryBuilder->getQuery()->getSQL());
    
        return $queryBuilder->getQuery()->getResult();
    }
    

    public function findModelsByMark(string $mark): array
    {
        return $this->createQueryBuilder('c')
            ->select('DISTINCT c.model') // Corrected to lowercase 'model'
            ->where('c.mark = :mark') // Corrected to lowercase 'mark'
            ->setParameter('mark', $mark)
            ->orderBy('c.model', 'ASC') // Corrected to lowercase 'model'
            ->getQuery()
            ->getResult();
    }
    
    public function findBySearchCriteria(string $selectedMark, string $selectedModel, int $priceRangeMin, int $priceRangeMax): array
    {
            $qb = $this->createQueryBuilder('c')
        ->andWhere('c.mark = :mark') 
        ->andWhere('c.model = :model')
        ->andWhere('c.price >= :minPrice')
        ->andWhere('c.price <= :maxPrice')
        ->setParameter('mark', $selectedMark)
        ->setParameter('model', $selectedModel)
        ->setParameter('minPrice', $priceRangeMin)
        ->setParameter('maxPrice', $priceRangeMax)
        ->getQuery();

        // Debugging: Dump the SQL query
        dump($qb->getSQL());

        return $qb->getResult();

    }
}