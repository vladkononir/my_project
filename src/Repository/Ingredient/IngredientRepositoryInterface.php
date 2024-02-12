<?php

declare(strict_types=1);

namespace App\Repository\Ingredient;

use App\Entity\Ingredient\Ingredient;

interface IngredientRepositoryInterface
{
    public function save(Ingredient $ingredient): void;
}
