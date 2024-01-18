<?php

declare(strict_types=1);

namespace App\Command;

use App\Repository\User\UserRepositoryInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\RegistrationUserService;

#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user.',
    aliases: ['app:add-user'],
)]
final class CreateUserCommand extends Command
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly RegistrationUserService $userRegistration,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Creates a new user.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output,
    ): int {
        $io = new SymfonyStyle($input, $output);
        $io->title('Creating a user');
        $email = $this->userRegistration->emailInput($io);
        $password = $this->userRegistration->passwordInput($io);
        try {
            $user = $this->userRepository->createUser($email, $password);
        } catch (\Exception $ex) {
            $io->error(
                sprintf(
                    '%s %s %s',
                    'User not created ',
                    'error - ',
                    $ex->getMessage()
                )
            );

            return Command::FAILURE;
        }
        $this->userRepository->save($user);
        $io->success('User created');

        return Command::SUCCESS;
    }
}
