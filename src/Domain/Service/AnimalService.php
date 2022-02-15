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
     * @return Animal[]
     */
    public function getAnimals(): array
    {
        return $this->animalRepository->findAll();
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