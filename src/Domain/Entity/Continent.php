<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\ContinentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContinentRepository::class)
 */
class Continent
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
    private $name_continent;

    /**
     * @ORM\OneToMany(targetEntity=Country::class, mappedBy="id_continent_country")
     */
    private $countries;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameContinent(): ?string
    {
        return $this->name_continent;
    }

    public function setNameContinent(string $name_continent): self
    {
        $this->name_continent = $name_continent;

        return $this;
    }

    /**
     * @return Collection|Country[]
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Country $country): self
    {
        if (!$this->countries->contains($country)) {
            $this->countries[] = $country;
            $country->setIdContinentCountry($this);
        }

        return $this;
    }

    public function removeCountry(Country $country): self
    {
        if ($this->countries->removeElement($country)) {
            // set the owning side to null (unless already changed)
            if ($country->getIdContinentCountry() === $this) {
                $country->setIdContinentCountry(null);
            }
        }

        return $this;
    }
}
