<?php

declare(strict_types=1);

namespace App\ValueObject;

final readonly class Password
{
    public function __construct(
        public string $value,
    ) {
        if (strlen($this->value) < 8) {
            throw new \InvalidArgumentException('The password cannot be less than 8 symbols');
        }
    }
}