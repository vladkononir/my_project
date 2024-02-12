<?php

declare(strict_types=1);

namespace App\Service;

use App\Factory\IngredientFactory;
use App\Repository\Ingredient\IngredientRepository;
use Psr\Log\LoggerInterface;

final readonly class ParserIngredientService
{
    public function __construct(
        private IngredientRepository $ingredientRepository,
        private IngredientFactory $ingredientFactory,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * @param array[] $menu
     */
    public function parsingIngredient(array $menu): void
    {
        foreach ($menu as $categories) {
            foreach ($categories as $categoryKey => $category) {
                if ($categoryKey === 'products') {
                    foreach ($category as $products) {
                        foreach ($products as $productKey => $product) {
                            if ($productKey === 'groups') {
                                foreach ($product as $groups) {
                                    foreach ($groups as $typeKey => $type) {
                                        if ($typeKey === 'ingredients') {
                                            foreach ($type as $ingredients) {
                                                try {
                                                    $ingredient =
                                                        $this
                                                        ->ingredientFactory
                                                        ->getIngredient(
                                                        $products,
                                                        $groups,
                                                        $ingredients,
                                                    );
                                                    $this
                                                        ->ingredientRepository
                                                        ->save(
                                                        $ingredient
                                                    );
                                                } catch (\Exception $exception) {
                                                    $this->logger->error(
                                                        $exception->getMessage()
                                                    );
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
