<?php

namespace App\Repository;

use App\Entity\BookEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BookEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookEntity[]    findAll()
 * @method BookEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BookEntity::class);
    }

//    /**
//     * @return BookEntity[] Returns an array of BookEntity objects
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
    public function findOneBySomeField($value): ?BookEntity
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
