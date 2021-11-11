<?php

namespace App\Repository;

use App\Entity\ListeGlobale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeGlobale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeGlobale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeGlobale[]    findAll()
 * @method ListeGlobale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeGlobaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeGlobale::class);
    }

    // /**
    //  * @return ListeGlobale[] Returns an array of ListeGlobale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeGlobale
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
