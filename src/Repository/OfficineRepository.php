<?php

namespace App\Repository;

use App\Entity\Officine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Officine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Officine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Officine[]    findAll()
 * @method Officine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfficineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Officine::class);
    }

    // /**
    //  * @return Officine[] Returns an array of Officine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Officine
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
