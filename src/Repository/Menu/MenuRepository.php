<?php

declare(strict_types=1);

namespace App\Repository\Menu;

use App\Entity\Menu\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
final class MenuRepository extends ServiceEntityRepository implements MenuRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function save(Category $menu): void
    {
        $this->_em->persist($menu);
        $this->_em->flush();
    }
}
