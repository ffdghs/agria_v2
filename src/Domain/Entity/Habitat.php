<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\HabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HabitatRepository::class)
 */
class Habitat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_habitat;

    /**
     * @ORM\ManyToMany(targetEntity=Animal::class, mappedBy="habitats")
     */
    private $animals;

    public function __construct()
    {
        $this->id_animal_habitat = new ArrayCollection();
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameHabitat(): ?string
    {
        return $this->name_habitat;
    }

    public function setNameHabitat(string $name_habitat): self
    {
        $this->name_habitat = $name_habitat;

        return $this;
    }

    /**
     * @return Collection|Animal[]
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): self
    {
        if (!$this->animals->contains($animal)) {
            $this->animals[] = $animal;
            $animal->addHabitat($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): self
    {
        if ($this->animals->removeElement($animal)) {
            $animal->removeHabitat($this);
        }

        return $this;
    }

}
