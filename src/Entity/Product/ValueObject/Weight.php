<?php

declare(strict_types=1);

namespace App\Entity\Product\ValueObject;

final readonly class Weight
{
    public function __construct(
        public ?string $value,
    ) {
        if ($this->value === '' || $this->value === null) {
            throw new \InvalidArgumentException('Invalid weight of product');
        }
    }
}
