<?php

declare(strict_types=1);

namespace App\Entity\Ingredient\ValueObject;

final readonly class Count
{
    public function __construct(
        public ?int $value,
    ) {
        if ($this->value <= 0 || $this->value === null) {
            $this->value = null;
        }
    }
}
