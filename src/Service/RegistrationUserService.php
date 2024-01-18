<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\Console\Style\SymfonyStyle;
use RuntimeException;

class RegistrationUserService
{
    public function emailInput(
        SymfonyStyle $io,
    ): string {
        return $io->askHidden('What is your email?', function ($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new RuntimeException('The email is incorrect');
            }

            return $email;
        });
    }

    public function passwordInput(
        SymfonyStyle $io,
    ): string {
        return $io->askHidden(
            'What is your password?',
            function ($password) {
                if (strlen($password) < 8) {
                    throw new RuntimeException(
                        'The password cannot be less than 8 symbols'
                    );
                }

                return $password;
            }
        );
    }
}
