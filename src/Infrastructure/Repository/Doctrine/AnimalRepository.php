<?php

namespace App\Infrastructure\Repository\Doctrine;

use App\Domain\Entity\Animal;
use App\Domain\Repository\AnimalRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AnimalRepository extends ServiceEntityRepository implements AnimalRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

     /**
      * @param string $name
      * @return Animal[]
      */
    public function findAnimalByHabitat(string $name): array
    {
        return $this->getEntityManager()->createQueryBuilder()
        ->select('a')
        ->from(Animal::class, 'a')
        ->innerJoin('a.habitats', 'h')
        ->where('h.name_habitat =:name')
        ->setParameter('name',$name)
        ->getQuery()
        ->getResult();
    }

    /**
     * @param int $id
     * @return Animal[]
     */
    public function findAnimalByContinent(int $id): array
    {
        return $this->getEntityManager()->createQueryBuilder()
        ->select('a')
        ->from(Animal::class, 'a')
        ->innerJoin('a.pins', 'p')
        ->innerJoin('p.id_region_pin', 'r')
        ->innerJoin('r.id_country_region', 'c')
        ->innerJoin('c.id_continent_country', 'd')
        ->where('d.id =:id')
        ->setParameter('id',$id)
        ->getQuery()
        ->getResult();
    }

    public function getContinentForAnimal(int $id): Animal
    {
        return $this->getEntityManager()->createQueryBuilder()
        ->select('a','p','r','c','d')
        ->from(Animal::class, 'a')
        ->innerJoin('a.pins', 'p')
        ->innerJoin('p.id_region_pin', 'r')
        ->innerJoin('r.id_country_region', 'c')
        ->innerJoin('c.id_continent_country', 'd')
        ->where('a.id =:id')
        ->setParameter('id',$id)
        ->getQuery()
        ->getResult();
    }

}
