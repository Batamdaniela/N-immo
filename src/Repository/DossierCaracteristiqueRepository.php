<?php

namespace App\Repository;

use App\Entity\DossierCaracteristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DossierCaracteristique|null find($id, $lockMode = null, $lockVersion = null)
 * @method DossierCaracteristique|null findOneBy(array $criteria, array $orderBy = null)
 * @method DossierCaracteristique[]    findAll()
 * @method DossierCaracteristique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossierCaracteristiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DossierCaracteristique::class);
    }

    // /**
    //  * @return DossierCaracteristique[] Returns an array of DossierCaracteristique objects
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
    public function findOneBySomeField($value): ?DossierCaracteristique
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
