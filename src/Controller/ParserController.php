<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ParserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ParserController extends AbstractController
{
    public function __construct(
        private readonly ParserService $parser,
    ) {
    }

    #[Route('/parser', name: 'parser')]
    public function Test(): Response
    {
        $this->parser->parsing();

        return new Response();
    }
}
