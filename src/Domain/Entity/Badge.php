<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\BadgeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BadgeRepository::class)
 */
class Badge
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
    private $name_badge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_badge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_badge;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="id_badge_user")
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

    public function getNameBadge(): ?string
    {
        return $this->name_badge;
    }

    public function setNameBadge(string $name_badge): self
    {
        $this->name_badge = $name_badge;

        return $this;
    }

    public function getUrlBadge(): ?string
    {
        return $this->url_badge;
    }

    public function setUrlBadge(string $url_badge): self
    {
        $this->url_badge = $url_badge;

        return $this;
    }

    public function getDescriptionBadge(): ?string
    {
        return $this->description_badge;
    }

    public function setDescriptionBadge(string $description_badge): self
    {
        $this->description_badge = $description_badge;

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
            $user->setIdBadgeUser($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getIdBadgeUser() === $this) {
                $user->setIdBadgeUser(null);
            }
        }

        return $this;
    }
}
