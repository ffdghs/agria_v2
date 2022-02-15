<?php

namespace App\Domain\Repository;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserRepositoryInterface
{
    public function upgradePassword(UserInterface $user, string $newHashedPassword): void;
}