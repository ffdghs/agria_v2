<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
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
    private $name_country;

    /**
     * @ORM\ManyToOne(targetEntity=Continent::class, inversedBy="countries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_continent_country;

    /**
     * @ORM\OneToMany(targetEntity=Region::class, mappedBy="id_country_region")
     */
    private $regions;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude_country;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude_country;

    public function __construct()
    {
        $this->regions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCountry(): ?string
    {
        return $this->name_country;
    }

    public function setNameCountry(string $name_country): self
    {
        $this->name_country = $name_country;

        return $this;
    }

    public function getIdContinentCountry(): ?Continent
    {
        return $this->id_continent_country;
    }

    public function setIdContinentCountry(?Continent $id_continent_country): self
    {
        $this->id_continent_country = $id_continent_country;

        return $this;
    }

    /**
     * @return Collection|Region[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
            $region->setIdCountryRegion($this);
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        if ($this->regions->removeElement($region)) {
            // set the owning side to null (unless already changed)
            if ($region->getIdCountryRegion() === $this) {
                $region->setIdCountryRegion(null);
            }
        }

        return $this;
    }

    public function getLatitudeCountry(): ?float
    {
        return $this->latitude_country;
    }

    public function setLatitudeCountry(float $latitude_country): self
    {
        $this->latitude_country = $latitude_country;

        return $this;
    }

    public function getLongitudeCountry(): ?float
    {
        return $this->longitude_country;
    }

    public function setLongitudeCountry(float $longitude_country): self
    {
        $this->longitude_country = $longitude_country;

        return $this;
    }
}
