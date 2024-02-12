<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

final readonly class ParserService
{
    public function __construct(
        private HttpClientInterface $client,
        private ParserCategoryService $parserMenuService,
        private ParserProductService $parserProductService,
        private ParserIngredientService $parserIngredientService,
    ) {
    }

    public function parsing(): void
    {
        $response = $this->client->request('GET',
            'https://dev.justreserve.me/widget/v1/place/menu/rchj2hydhtG7',
        );

        $content = $response->getContent();
        $menu = json_decode($content, true);

        $this->parserMenuService->ParsingMenu($menu);
        $this->parserProductService->parsingProduct($menu);
        $this->parserIngredientService->parsingIngredient($menu);
    }
}
