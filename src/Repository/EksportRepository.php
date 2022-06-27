<?php

namespace App\Repository;

use App\Entity\Eksport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Types\DateType;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Eksport|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eksport|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eksport[]    findAll()
 * @method Eksport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EksportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eksport::class);
    }

    public function findByLokalAndDate(string $lokal, \DateTime $dataOd, \DateTime $dataDo) {
        return $this->createQueryBuilder('e')
            ->andWhere('e.lokal = :lokal')
            ->andWhere('e.data > :dataOd')
            ->andWhere('e.data < :dataDo')
            ->setParameters(array('dataOd' => $dataOd, 'dataDo' => $dataDo, 'lokal' => $lokal))
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }
}
