<?php

declare(strict_types=1);

namespace App\ValueObject;

final readonly class EmailValueObject
{
    public function __construct(
        public string $value,
    ) {
        if (false === \filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(
                \sprintf(
                    'Expected a value to be a valid e-mail address. Got: %s',
                    $value
                )
            );
        }
    }
}