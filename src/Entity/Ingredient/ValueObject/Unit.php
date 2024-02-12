<?php

declare(strict_types=1);

namespace App\Entity\Ingredient\ValueObject;

final class Unit
{
    public function __construct(
        public ?string $value,
    ) {
        if ($this->value === '') {
            $this->value = null;
        }
    }
}
