<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User\User;
use App\Entity\User\ValueObject\Email;
use App\Entity\User\ValueObject\Password;
use App\Repository\User\UserRepositoryInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final readonly class RegistrationUserService
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
        private UserRepositoryInterface $userRepository,
    ) {
    }

    public function register(Email $email, Password $password): void
    {
        $user = new User($email);

        $hashedPassword = $this->passwordHasher->hashPassword($user, $password->value);
        $user->setPassword($hashedPassword);

        $this->userRepository->save($user);
    }
}