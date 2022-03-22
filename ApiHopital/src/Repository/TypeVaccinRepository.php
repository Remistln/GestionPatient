<?php

namespace App\Repository;

use App\Entity\TypeVaccin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeVaccin|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeVaccin|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeVaccin[]    findAll()
 * @method TypeVaccin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeVaccinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeVaccin::class);
    }

    // /**
    //  * @return TypeVaccin[] Returns an array of TypeVaccin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeVaccin
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
