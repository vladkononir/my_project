<?php

declare(strict_types=1);

namespace App\Entity\Ingredient\ValueObject;

final readonly class Type
{
    public function __construct(
        public ?string $value,
    ) {
        if ($this->value === '' || $this->value === null) {
            throw new \InvalidArgumentException('Invalid type of ingredient of ingredient');
        }
    }
}
