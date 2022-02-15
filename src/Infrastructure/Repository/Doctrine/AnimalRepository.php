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

    public function findAll(): array
    {
        return $this->createQueryBuilder('a')
            ->getQuery()
            ->getResult();
    }
     /**
      * @param string $name
      * @return Animal[]
      */
    public function findAnimalByHabitat(string $name): array
    {
        return $this->createQueryBuilder('a')
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
        return $this->createQueryBuilder('a')
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
        return $this->createQueryBuilder('a')
        ->select('a,p,r,c,d')
        ->innerJoin('a.pins', 'p')
        ->innerJoin('p.id_region_pin', 'r')
        ->innerJoin('r.id_country_region', 'c')
        ->innerJoin('c.id_continent_country', 'd')
        ->where('a.id =:id')
        ->setParameter('id',$id)
        ->getQuery()
        ->getResult();
    }

    public function saveAnimal(Animal $animal): Animal
    {
        $this->getEntityManager()->persist($animal);
        $this->getEntityManager()->flush();

        return $animal;
    }

    public function deleteAnimal(int $id): void
    {
        $animal = $this->find($id);
        $this->getEntityManager()->remove($animal);
        $this->getEntityManager()->flush();
    }
}
