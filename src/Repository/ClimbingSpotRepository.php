<?php

namespace App\Repository;

use App\Entity\ClimbingSpot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClimbingSpot>
 *
 * @method ClimbingSpot|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClimbingSpot|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClimbingSpot[]    findAll()
 * @method ClimbingSpot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClimbingSpotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClimbingSpot::class);
    }

    public function save(ClimbingSpot $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ClimbingSpot $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ClimbingSpot[] Returns an array of ClimbingSpot objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClimbingSpot
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
