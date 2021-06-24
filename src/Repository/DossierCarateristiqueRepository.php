<?php

namespace App\Repository;

use App\Entity\DossierCarateristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DossierCarateristique|null find($id, $lockMode = null, $lockVersion = null)
 * @method DossierCarateristique|null findOneBy(array $criteria, array $orderBy = null)
 * @method DossierCarateristique[]    findAll()
 * @method DossierCarateristique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossierCarateristiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DossierCarateristique::class);
    }

    // /**
    //  * @return DossierCarateristique[] Returns an array of DossierCarateristique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DossierCarateristique
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
