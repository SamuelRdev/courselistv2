<?php

namespace App\Repository;

use App\Entity\ListeContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeContent[]    findAll()
 * @method ListeContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeContent::class);
    }

    // /**
    //  * @return ListeContent[] Returns an array of ListeContent objects
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
    public function findOneBySomeField($value): ?ListeContent
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
