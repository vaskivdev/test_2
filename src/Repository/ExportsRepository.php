<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Exports;

class ExportsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Exports::class);
    }
    
    public function findAllSuitable(string $local = null, \DateTime $dateFrom = null, \DateTime $dateTo = null) : array
    {

        $qb = $this->createQueryBuilder('p');
        $qb->where('p.name IS NOT NULL');
        $qb->andWhere('p.createdAt IS NOT NULL');
        $qb->andWhere('p.username IS NOT NULL');
        $qb->andWhere('p.localname IS NOT NULL');
        
        if ($local != null) {
            $qb->andWhere('p.localname = :local');
            $qb->setParameter('local', $local);
        }
        
        if ($dateFrom != null) {
            $qb->andWhere('p.createdAt >= :dateFrom');
            $qb->setParameter('dateFrom', $dateFrom);
        }
        
        if ($dateTo != null) {
            $qb->andWhere('p.createdAt <= :dateTo');
            $qb->setParameter('dateTo', $dateFrom);
        }
                        
        $qb->orderBy('p.createdAt', 'desc');
        $qb->addOrderBy('p.localname', 'asc');
        $query = $qb->getQuery();
        $result = $query->getResult();

        return $this->transformAll($result);
    }
    
    private function transform(Exports $export) : array
    {
        return [
            'id' => $export->getId(),
            'name' => $export->getName(),
            'date' => $export->getCreatedAt()->format('Y-m-d'),
            'hour' => $export->getCreatedAt()->format('H:i'),
            'username' => $export->getUsername(),
            'localname' => $export->getLocalname(),
        ];
    }

    private function transformAll(array $objects) : array
    {
        $exportsArray = [];

        foreach ($objects as $object) {
            $exportsArray[] = $this->transform($object);
        }

        return $exportsArray;
    }
    
    public function findAllLocales() : array
    {
        return $this->createQueryBuilder('p')
            ->select('p.localname as name')
            ->orderBy('p.localname', 'asc')
            ->groupBy('p.localname')
            ->getQuery()
            ->getResult();
    }
}
