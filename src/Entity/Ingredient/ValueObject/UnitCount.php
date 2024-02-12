<?php

declare(strict_types=1);

namespace App\Entity\Ingredient\ValueObject;

final class UnitCount
{
    public function __construct(
        public ?float $value,
    ) {
        if ($this->value <= 0) {
            $this->value = null;
        }
    }
}
