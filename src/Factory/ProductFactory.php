<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Product\Product;
use App\Entity\Product\ValueObject\Category;
use App\Entity\Product\ValueObject\Cost;
use App\Entity\Product\ValueObject\ExternalId;
use App\Entity\Product\ValueObject\Priority;
use App\Entity\Product\ValueObject\ProjectProduct;
use App\Entity\Product\ValueObject\Title;
use App\Entity\Product\ValueObject\Weight;
use App\Entity\ValueObject\Description;
use App\Entity\ValueObject\Image;

final readonly class ProductFactory
{
    public function getProduct(array $product): Product
    {
        return new Product(
            new ExternalId($product['id']),
            new Priority($product['priority']),
            new Title($product['title']),
            new Image($product['image']),
            new Description($product['description']),
            new Weight($product['weight']),
            new Cost($product['cost']),
            new Category($product['category']['name']),
            new ProjectProduct($product['projectProduct']['id']),
        );
    }
}
