<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Repository\User\UserRepositoryInterface;

readonly final class RegistrationUserService
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
        private UserRepositoryInterface $userRepository,
    ) {
    }

    public function register(string $email, string $password): void
    {
        $user = new User;
        $hashedPassword = $this->passwordHasher->hashPassword($user, $password);
        $user->setEmail($email);
        $user->setPassword($hashedPassword);
        $this->userRepository->save($user);
    }
}
