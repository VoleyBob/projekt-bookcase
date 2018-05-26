<?php

namespace App\Repository;

use App\Entity\BookcaseEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BookcaseEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookcaseEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookcaseEntity[]    findAll()
 * @method BookcaseEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookcaseEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BookcaseEntity::class);
    }

//    /**
//     * @return BookcaseEntity[] Returns an array of BookcaseEntity objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookcaseEntity
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
