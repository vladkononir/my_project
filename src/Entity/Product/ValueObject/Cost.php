<?php

declare(strict_types=1);

namespace App\Entity\Product\ValueObject;

final readonly class Cost
{
    public function __construct(
        public ?float $value,
    ) {
        if ($this->value < 0 || $this->value === null) {
            throw new \InvalidArgumentException('Invalid cost of product');
        }
    }
}
