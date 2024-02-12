<?php

declare(strict_types=1);

namespace App\Repository\Menu;

use App\Entity\Menu\Category;

interface MenuRepositoryInterface
{
    public function save(Category $menu): void;
}
