<?php

declare(strict_types=1);

namespace App\ValueObject;

final readonly class PasswordValueObject
{
    public function __construct(
        public string $value,
    ) {
        if ($this->value < 8) {
            throw new \InvalidArgumentException(
                \sprintf(
                    'The password cannot be less than 8 symbols. Got: %s',
                    $value
                )
            );
        }
    }
}