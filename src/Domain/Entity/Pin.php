<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\PinRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PinRepository::class)
 */
class Pin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude_pin;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude_pin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $style_pin;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="pins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_region_pin;

    /**
     * @ORM\ManyToOne(targetEntity=Animal::class, inversedBy="pins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_animal_pin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLongitudePin(): ?float
    {
        return $this->longitude_pin;
    }

    public function setLongitudePin(float $longitude_pin): self
    {
        $this->longitude_pin = $longitude_pin;

        return $this;
    }

    public function getLatitudePin(): ?float
    {
        return $this->latitude_pin;
    }

    public function setLatitudePin(float $latitude_pin): self
    {
        $this->latitude_pin = $latitude_pin;

        return $this;
    }

    public function getStylePin(): ?string
    {
        return $this->style_pin;
    }

    public function setStylePin(string $style_pin): self
    {
        $this->style_pin = $style_pin;

        return $this;
    }

    public function getIdRegionPin(): ?Region
    {
        return $this->id_region_pin;
    }

    public function setIdRegionPin(?Region $id_region_pin): self
    {
        $this->id_region_pin = $id_region_pin;

        return $this;
    }

    public function getIdAnimalPin(): ?Animal
    {
        return $this->id_animal_pin;
    }

    public function setIdAnimalPin(?Animal $id_animal_pin): self
    {
        $this->id_animal_pin = $id_animal_pin;

        return $this;
    }
}
