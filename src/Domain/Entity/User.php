<?php

namespace App\Domain\Entity;

use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepositoryInterface::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $login_user;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_user;

    /**
     * @ORM\ManyToOne(targetEntity=Avatar::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_avatar_user;

    /**
     * @ORM\ManyToOne(targetEntity=Badge::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_badge_user;

    /**
     * @ORM\ManyToMany(targetEntity=Trophy::class, inversedBy="users")
     */
    private $id_trophy_user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name_user;

    /**
     * @ORM\ManyToMany(targetEntity=Animal::class, inversedBy="user_favorite_animal")
     */
    private $favorite_animal_user;

    
    public function __construct()
    {
        $this->id_trophy_user = new ArrayCollection();
        $this->favorite_animal_user = new ArrayCollection();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoginUser(): ?string
    {
        return $this->login_user;
    }

    public function setLoginUser(string $login_user): self
    {
        $this->login_user = $login_user;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->login_user;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->email_user;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmailUser(): ?string
    {
        return $this->email_user;
    }

    public function setEmailUser(string $email_user): self
    {
        $this->email_user = $email_user;

        return $this;
    }

    public function getIdAvatarUser(): ?Avatar
    {
        return $this->id_avatar_user;
    }

    public function setIdAvatarUser(?Avatar $id_avatar_user): self
    {
        $this->id_avatar_user = $id_avatar_user;

        return $this;
    }

    public function getIdBadgeUser(): ?Badge
    {
        return $this->id_badge_user;
    }

    public function setIdBadgeUser(?Badge $id_badge_user): self
    {
        $this->id_badge_user = $id_badge_user;

        return $this;
    }

    /**
     * @return Collection|Trophy[]
     */
    public function getIdTrophyUser(): Collection
    {
        return $this->id_trophy_user;
    }

    public function addIdTrophyUser(Trophy $idTrophyUser): self
    {
        if (!$this->id_trophy_user->contains($idTrophyUser)) {
            $this->id_trophy_user[] = $idTrophyUser;
        }

        return $this;
    }

    public function removeIdTrophyUser(Trophy $idTrophyUser): self
    {
        $this->id_trophy_user->removeElement($idTrophyUser);

        return $this;
    }

    public function getNameUser(): ?string
    {
        return $this->name_user;
    }

    public function setNameUser(?string $name_user): self
    {
        $this->name_user = $name_user;

        return $this;
    }

    /**
     * @return Collection|Animal[]
     */
    public function getFavoriteAnimalUser(): Collection
    {
        return $this->favorite_animal_user;
    }

    public function addFavoriteAnimalUser(Animal $favoriteAnimalUser): self
    {
        if (!$this->favorite_animal_user->contains($favoriteAnimalUser)) {
            $this->favorite_animal_user[] = $favoriteAnimalUser;
        }

        return $this;
    }

    public function removeFavoriteAnimalUser(Animal $favoriteAnimalUser): self
    {
        $this->favorite_animal_user->removeElement($favoriteAnimalUser);

        return $this;
    }

}
