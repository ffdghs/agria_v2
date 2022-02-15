<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Animal;

interface AnimalRepositoryInterface
{
    /**
     * @return Animal[]
     */
    public function findAll():array;
    /**
     * @param string $name
     * @return Animal[]
     */
    public function findAnimalByHabitat(string $name): array;

    /**
     * @param int $id
     * @return Animal[]
     */
    public function findAnimalByContinent(int $id): array;

    public function getContinentForAnimal(int $id): Animal;

    public function saveAnimal(Animal $animal): Animal;

    public function deleteAnimal(int $id): void;
}