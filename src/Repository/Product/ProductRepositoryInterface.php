<?php

declare(strict_types=1);

namespace App\Repository\Product;

use App\Entity\Product\Product;

interface ProductRepositoryInterface
{
    public function save(Product $product): void;
}
