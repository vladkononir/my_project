<?php

declare(strict_types=1);

namespace App\Entity\Menu\ValueObject;

final readonly class Priority
{
    public function __construct(
        public ?int $value,
    ) {
        if ($this->value <= 0 || $this->value === null) {
            throw new \InvalidArgumentException('Invalid priority of category');
        }
    }
}
