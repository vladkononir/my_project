<?php

declare(strict_types=1);

namespace App\Entity\Ingredient\ValueObject;

final readonly class IngredientId
{
    public function __construct(
        public ?string $value,
    ) {
        if ($this->value === '' || $this->value === null) {
            throw new \InvalidArgumentException('Invalid ingredientId of ingredient');
        }
    }
}
