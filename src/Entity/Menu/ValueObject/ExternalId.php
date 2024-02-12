<?php

declare(strict_types=1);

namespace App\Entity\Menu\ValueObject;

final readonly class ExternalId
{
    public function __construct(
        public ?string $value,
    ) {
        if ($this->value === '' || $this->value === null) {
            throw new \InvalidArgumentException('Invalid externalId of category');
        }
    }
}
