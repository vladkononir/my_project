<?php

declare(strict_types=1);

namespace App\Entity\ValueObject;

final class Description
{
    public function __construct(
        public ?string $value,
    ) {
        if ($this->value === '') {
            $this->value = null;
        }
    }
}
