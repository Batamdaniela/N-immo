<?php

namespace App\Repository;

use App\Entity\DossierCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DossierCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method DossierCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method DossierCategorie[]    findAll()
 * @method DossierCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossierCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DossierCategorie::class);
    }

    // /**
    //  * @return DossierCategorie[] Returns an array of DossierCategorie objects
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
    public function findOneBySomeField($value): ?DossierCategorie
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
