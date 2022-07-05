<?php

namespace App\Domain\Service;

use App\Domain\Entity\Animal;
use App\Domain\Repository\AnimalRepositoryInterface;

class AnimalService
{
    private $animalRepository;

    public function __construct(AnimalRepositoryInterface $animalRepository)
    {
        $this->animalRepository = $animalRepository;
    }

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @param int|null $limit
     * @param int|null $start
     * @return Animal[]
     */
    public function getAnimalsBy(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $start = null): array
    {
        return $this->animalRepository->findBy($criteria, $orderBy, $limit, $start);
    }

    /**
     * @return Animal[]
     */
    public function getAnimals(): array
    {
        return $this->animalRepository->findAll();
    }

    public function getAnimal(int $id): Animal
    {
        return $this->animalRepository->findBy(['id' => $id])[0];
    }

    /**
     * @param string $name
     * @return Animal[]
     */
    public function getAnimalsByHabitat(string $name): array
    {
        return $this->animalRepository->findAnimalByHabitat($name);
    }

    /**
     * @param int $id
     * @return Animal[]
     */
    public function getAnimalsByContinent(int $id): array
    {
        return $this->animalRepository->findAnimalByContinent($id);
    }

    /**
     * @param int $id
     * @return Animal
     */
    public function getLocationForAnimal(int $id): Animal
    {
        return $this->animalRepository->getContinentForAnimal($id);
    }

    /**
     * @param Animal $animal
     * @return Animal
     */
    public function saveAnimal(Animal $animal): Animal
    {
        return $this->animalRepository->saveAnimal($animal);
    }

    public function deleteAnimal(int $id): void
    {
        $this->animalRepository->deleteAnimal($id);
    }
}