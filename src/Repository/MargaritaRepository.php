<?php

namespace App\Repository;

use App\Entity\Margarita;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Margarita|null find($id, $lockMode = null, $lockVersion = null)
 * @method Margarita|null findOneBy(array $criteria, array $orderBy = null)
 * @method Margarita[]    findAll()
 * @method Margarita[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MargaritaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Margarita::class);
    }

    // /**
    //  * @return Margarita[] Returns an array of Margarita objects
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
    public function findOneBySomeField($value): ?Margarita
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
