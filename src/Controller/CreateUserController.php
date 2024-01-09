<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-user',
)]
class CreateUserController extends Command
{
    private \Doctrine\Persistence\ObjectManager $entityManager;
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(ManagerRegistry $doctrine, UserPasswordHasherInterface $userPasswordHasher)
    {
        parent::__construct();
        $this->entityManager = $doctrine->getManager();
        $this->userPasswordHasher = $userPasswordHasher;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Your email')
            ->addArgument('password', InputArgument::REQUIRED, 'Your password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');
        $user = new User();
        $hashedPassword = $this->userPasswordHasher->hashPassword($user, $password);
        $user->setEmail($email);
        $user->setPassword($hashedPassword);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $output->writeln('User created');

        return Command::SUCCESS;
    }
}