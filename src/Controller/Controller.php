<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{

    #[Route('/', name: 'name_page')]
    public function firstFunction(): Response
    {

        return $this->render('index.html.twig');
    }
}