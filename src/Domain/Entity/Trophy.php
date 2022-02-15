<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\TrophyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrophyRepository::class)
 */
class Trophy
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
    private $name_trophy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_trophy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_trophy;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="id_trophy_user")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTrophy(): ?string
    {
        return $this->name_trophy;
    }

    public function setNameTrophy(string $name_trophy): self
    {
        $this->name_trophy = $name_trophy;

        return $this;
    }

    public function getUrlTrophy(): ?string
    {
        return $this->url_trophy;
    }

    public function setUrlTrophy(string $url_trophy): self
    {
        $this->url_trophy = $url_trophy;

        return $this;
    }

    public function getDescriptionTrophy(): ?string
    {
        return $this->description_trophy;
    }

    public function setDescriptionTrophy(string $description_trophy): self
    {
        $this->description_trophy = $description_trophy;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addIdTrophyUser($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeIdTrophyUser($this);
        }

        return $this;
    }
}
