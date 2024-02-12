<?php

declare(strict_types = 1);

namespace App\Factory;

use App\Entity\Ingredient\Ingredient;
use App\Entity\Ingredient\ValueObject\Cost;
use App\Entity\Ingredient\ValueObject\Count;
use App\Entity\Ingredient\ValueObject\IngredientId;
use App\Entity\Ingredient\ValueObject\Name;
use App\Entity\Ingredient\ValueObject\Product;
use App\Entity\Ingredient\ValueObject\Type;
use App\Entity\Ingredient\ValueObject\TypeId;
use App\Entity\Ingredient\ValueObject\TypeName;
use App\Entity\Ingredient\ValueObject\Unit;
use App\Entity\Ingredient\ValueObject\UnitCount;
use App\Entity\ValueObject\Description;
use App\Entity\ValueObject\Image;

final readonly class IngredientFactory
{
    public function getIngredient(array $products, array $types, array $ingredients): Ingredient
    {
        return new Ingredient(
            new Name($ingredients['name']),
            new TypeId($types['id']),
            new TypeName($types['name']),
            new Type($types['type']),
            new Product($products['title']),
            new IngredientId($ingredients['id']),
            new Count($ingredients['count']),
            new Image($ingredients['image']),
            new Description($ingredients['description']),
            new Unit($ingredients['unit']),
            new UnitCount($ingredients['unitCount']),
            new Cost($ingredients['cost']),
        );
    }
}
