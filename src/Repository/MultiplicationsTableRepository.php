<?php

namespace App\Repository;

use App\Entity\MultiplicationsTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MultiplicationsTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method MultiplicationsTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method MultiplicationsTable[]    findAll()
 * @method MultiplicationsTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MultiplicationsTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MultiplicationsTable::class);
    }

    // /**
    //  * @return MultiplicationsTable[] Returns an array of MultiplicationsTable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MultiplicationsTable
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
