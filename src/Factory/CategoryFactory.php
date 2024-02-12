<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Menu\Category;
use App\Entity\Menu\ValueObject\ExternalId;
use App\Entity\Menu\ValueObject\Name;
use App\Entity\Menu\ValueObject\Priority;

final readonly class CategoryFactory
{
    public function getMenu(Array $category): Category
    {
        return new Category(
            new ExternalId($category['id']),
            new Name($category['name']),
            new Priority($category['priority']),
        );
    }
}
