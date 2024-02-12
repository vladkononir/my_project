<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\User\ValueObject\Email;
use App\Entity\User\ValueObject\Password;
use App\Service\RegistrationUserService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user.',
)]
final class CreateUserCommand extends Command
{
    public function __construct(
        private readonly RegistrationUserService $userRegistrationService,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Creating a user');

        try {
            $email = $this->askEmail($io);
            $password = $this->askPassword($io);

            $this->userRegistrationService->register($email, $password);
        } catch (\Exception $exception) {
            $io->error(sprintf('User has not been created. Error: %s',
                $exception->getMessage()));

            return Command::FAILURE;
        }

        $io->success('User was created');

        return Command::SUCCESS;
    }

    private function askEmail(SymfonyStyle $io): Email
    {
        $email = $io->askHidden('What is your email?');

        return new Email($email);
    }

    private function askPassword(SymfonyStyle $io): Password
    {
        $password = $io->askHidden('What is your password?');

        return new Password($password);
    }
}