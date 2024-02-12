<?php

declare(strict_types=1);

namespace App\Repository\Ingredient;

use App\Entity\Ingredient\Ingredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ingredient>
 */
final class IngredientRepository extends ServiceEntityRepository implements IngredientRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ingredient::class);
    }

    public function save(Ingredient $ingredient): void
    {
        $this->_em->persist($ingredient);
        $this->_em->flush();
    }
}
