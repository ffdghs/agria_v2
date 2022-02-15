<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\Doctrine\AvatarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvatarRepository::class)
 */
class Avatar
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
    private $name_avatar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_avatar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_avatar;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="id_avatar_user")
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

    public function getNameAvatar(): ?string
    {
        return $this->name_avatar;
    }

    public function setNameAvatar(string $name_avatar): self
    {
        $this->name_avatar = $name_avatar;

        return $this;
    }

    public function getUrlAvatar(): ?string
    {
        return $this->url_avatar;
    }

    public function setUrlAvatar(string $url_avatar): self
    {
        $this->url_avatar = $url_avatar;

        return $this;
    }

    public function getDescriptionAvatar(): ?string
    {
        return $this->description_avatar;
    }

    public function setDescriptionAvatar(string $description_avatar): self
    {
        $this->description_avatar = $description_avatar;

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
            $user->setIdAvatarUser($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getIdAvatarUser() === $this) {
                $user->setIdAvatarUser(null);
            }
        }

        return $this;
    }
}
