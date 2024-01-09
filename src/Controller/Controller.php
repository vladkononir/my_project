<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

final class Controller extends AbstractController
{
    #[Route('/', name: 'name_page')]
    public function firstFunction(): Response
    {
        return $this->render('index.html.twig');
    }
}