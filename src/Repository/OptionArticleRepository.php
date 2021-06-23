<?php

namespace App\Repository;

use App\Entity\OptionArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OptionArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionArticle[]    findAll()
 * @method OptionArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OptionArticle::class);
    }

    // /**
    //  * @return OptionArticle[] Returns an array of OptionArticle objects
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
    public function findOneBySomeField($value): ?OptionArticle
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
