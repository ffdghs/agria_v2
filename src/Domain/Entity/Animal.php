<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $diet_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $status_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $family_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $population_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $description_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $nickname_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $main_picture_animal;

    /**
     * @var Pin[]
     * @ORM\OneToMany(targetEntity=Pin::class, mappedBy="id_animal_pin")
     */
    private $pins;


    /**
     * @var Habitat[]
     * @ORM\ManyToMany(targetEntity=Habitat::class, inversedBy="animals")
     */
    private $habitats;

    /**
     * @var Picture[]
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="animal")
     */
    private $pictures;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $appearance_animal;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $legs_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $social_animal;

    /**
     * @var User[]
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="favorite_animal_user")
     */
    private $user_favorite_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cutOut_image_animal;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descMore_animal;

    
    public function __construct()
    {
        $this->habitats = new ArrayCollection();
        $this->pins = new ArrayCollection();
        $this->pictures = new ArrayCollection();
        $this->user_favorite_animal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameAnimal(): ?string
    {
        return $this->name_animal;
    }

    public function setNameAnimal(string $name_animal): self
    {
        $this->name_animal = $name_animal;

        return $this;
    }

    public function getDietAnimal(): ?string
    {
        return $this->diet_animal;
    }

    public function setDietAnimal(string $diet_animal): self
    {
        $this->diet_animal = $diet_animal;

        return $this;
    }

    public function getStatusAnimal(): ?string
    {
        return $this->status_animal;
    }

    public function setStatusAnimal(string $status_animal): self
    {
        $this->status_animal = $status_animal;

        return $this;
    }

    public function getFamilyAnimal(): ?string
    {
        return $this->family_animal;
    }

    public function setFamilyAnimal(string $family_animal): self
    {
        $this->family_animal = $family_animal;

        return $this;
    }

    public function getPopulationAnimal(): ?string
    {
        return $this->population_animal;
    }

    public function setPopulationAnimal(string $population_animal): self
    {
        $this->population_animal = $population_animal;

        return $this;
    }

    public function getDescriptionAnimal(): ?string
    {
        return $this->description_animal;
    }

    public function setDescriptionAnimal(string $description_animal): self
    {
        $this->description_animal = $description_animal;

        return $this;
    }

    public function getNicknameAnimal(): ?string
    {
        return $this->nickname_animal;
    }

    public function setNicknameAnimal(string $nickname_animal): self
    {
        $this->nickname_animal = $nickname_animal;

        return $this;
    }

    public function getMainPictureAnimal(): ?string
    {
        return $this->main_picture_animal;
    }

    public function setMainPictureAnimal(string $main_picture_animal): self
    {
        $this->main_picture_animal = $main_picture_animal;

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
            $pin->setIdAnimalPin($this);
        }

        return $this;
    }

    public function removePin(Pin $pin): self
    {
        if ($this->pins->removeElement($pin)) {
            // set the owning side to null (unless already changed)
            if ($pin->getIdAnimalPin() === $this) {
                $pin->setIdAnimalPin(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|Habitat[]
     */
    public function getHabitats(): Collection
    {
        return $this->habitats;
    }

    public function addHabitat(Habitat $habitat): self
    {
        if (!$this->habitats->contains($habitat)) {
            $this->habitats[] = $habitat;
        }

        return $this;
    }

    public function removeHabitat(Habitat $habitat): self
    {
        $this->habitats->removeElement($habitat);

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setAnimal($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->picture->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getAnimal() === $this) {
                $picture->setAnimal(null);
            }
        }

        return $this;
    }

    public function getAppearanceAnimal(): ?string
    {
        return $this->appearance_animal;
    }

    public function setAppearanceAnimal(string $appearance_animal): self
    {
        $this->appearance_animal = $appearance_animal;

        return $this;
    }

    public function getLegsAnimal(): ?int
    {
        return $this->legs_animal;
    }

    public function setLegsAnimal(int $legs_animal): self
    {
        $this->legs_animal = $legs_animal;

        return $this;
    }

    public function getSocialAnimal(): ?string
    {
        return $this->social_animal;
    }

    public function setSocialAnimal(string $social_animal): self
    {
        $this->social_animal = $social_animal;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserFavoriteAnimal(): Collection
    {
        return $this->user_favorite_animal;
    }

    public function addUserFavoriteAnimal(User $userFavoriteAnimal): self
    {
        if (!$this->user_favorite_animal->contains($userFavoriteAnimal)) {
            $this->user_favorite_animal[] = $userFavoriteAnimal;
            $userFavoriteAnimal->addFavoriteAnimalUser($this);
        }

        return $this;
    }

    public function removeUserFavoriteAnimal(User $userFavoriteAnimal): self
    {
        if ($this->user_favorite_animal->removeElement($userFavoriteAnimal)) {
            $userFavoriteAnimal->removeFavoriteAnimalUser($this);
        }

        return $this;
    }

    public function getCutOutImageAnimal(): ?string
    {
        return $this->cutOut_image_animal;
    }

    public function setCutOutImageAnimal(?string $cutOut_image_animal): self
    {
        $this->cutOut_image_animal = $cutOut_image_animal;

        return $this;
    }

    public function getDescMoreAnimal(): ?string
    {
        return $this->descMore_animal;
    }

    public function setDescMoreAnimal(?string $descMore_animal): self
    {
        $this->descMore_animal = $descMore_animal;

        return $this;
    }

}
