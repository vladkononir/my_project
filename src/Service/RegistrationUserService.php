<?php

declare(strict_types=1);

namespace App\Service;

use App\ValueObject\EmailValueObject;
use App\Entity\User;
use App\ValueObject\PasswordValueObject;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Repository\User\UserRepositoryInterface;

final readonly class RegistrationUserService
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
        private UserRepositoryInterface $userRepository,
    ) {
    }

    public function register($email, $password): void
    {
        $user = new User();

        $validEmail = new EmailValueObject($email);

        $hashedPassword = $this->passwordHasher->hashPassword($user, $password);

        $validHashedPassword = new PasswordValueObject($hashedPassword);

        $user->setEmail($validEmail);
        $user->setPassword($validHashedPassword);
        $this->userRepository->save($user);
    }
}
