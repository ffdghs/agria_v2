<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
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
    private $name_region;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="regions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_country_region;

    /**
     * @ORM\OneToMany(targetEntity=Pin::class, mappedBy="id_region_pin")
     */
    private $pins;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude_region;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude_region;

    public function __construct()
    {
        $this->pins = new ArrayCollection();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRegion(): ?string
    {
        return $this->name_region;
    }

    public function setNameRegion(string $name_region): self
    {
        $this->name_region = $name_region;

        return $this;
    }

    public function getIdCountryRegion(): ?Country
    {
        return $this->id_country_region;
    }

    public function setIdCountryRegion(?Country $id_country_region): self
    {
        $this->id_country_region = $id_country_region;

        return $this;
    }

    /**
     * @return Collection|Pin[]
     */
    public function getPins(): Collection
    {
        return $this->pins;
    }

    public function addPin(Pin $pin): self
    {
        if (!$this->pins->contains($pin)) {
            $this->pins[] = $pin;
            $pin->setIdRegionPin($this);
        }

        return $this;
    }

    public function removePin(Pin $pin): self
    {
        if ($this->pins->removeElement($pin)) {
            // set the owning side to null (unless already changed)
            if ($pin->getIdRegionPin() === $this) {
                $pin->setIdRegionPin(null);
            }
        }

        return $this;
    }

    public function getLatitudeRegion(): ?float
    {
        return $this->latitude_region;
    }

    public function setLatitudeRegion(?float $latitude_region): self
    {
        $this->latitude_region = $latitude_region;

        return $this;
    }

    public function getLongitudeRegion(): ?float
    {
        return $this->longitude_region;
    }

    public function setLongitudeRegion(?float $longitude_region): self
    {
        $this->longitude_region = $longitude_region;

        return $this;
    }
}
