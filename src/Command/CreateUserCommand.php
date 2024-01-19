<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\RegistrationUserService;
use RuntimeException;

#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user.',
    aliases: ['app:add-user'],
)]
final class CreateUserCommand extends Command
{
    public function __construct(
        private readonly RegistrationUserService $userRegistrationService,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Creates a new user.');
    }

    private function askEmail(
        SymfonyStyle $io
    ): string {
        return $io->askHidden('What is your email?', function ($email): string {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new RuntimeException('The email is incorrect');
            }

            return $email;
        });
    }

    private function askPassword(
        SymfonyStyle $io
    ): string {
        return $io->askHidden(
            'What is your password?',
            function ($password): string {
                if (strlen($password) < 8) {
                    throw new RuntimeException(
                        'The password cannot be less than 8 symbols'
                    );
                }

                return $password;
            }
        );
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output,
    ): int {
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
}
