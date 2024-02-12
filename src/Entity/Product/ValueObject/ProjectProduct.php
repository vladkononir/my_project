<?php

declare(strict_types=1);

namespace App\Entity\Product\ValueObject;

final class ProjectProduct
{
    public function __construct(
        public ?string $value,
    ) {
        if ($this->value === '') {
            $this->value = null;
        }
    }
}
