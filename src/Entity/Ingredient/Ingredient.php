<?php

namespace App\Entity\Ingredient;

use App\Entity\ValueObject\Image;
use App\Repository\Ingredient\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;
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

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[ORM\Table(name: '`ingredient`')]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $typeId;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeName;

    #[ORM\Column(length: 255)]
    private string $type;

    #[ORM\Column(length: 255)]
    private string $product;

    #[ORM\Column(length: 255)]
    private string $ingredientId;

    #[ORM\Column]
    private int $count;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description;

    #[ORM\Column(length: 255,)]
    private string $unit;

    #[ORM\Column]
    private float $unitCount;

    #[ORM\Column]
    private float $cost;

    public function __construct(
        Name $name,
        TypeId $typeId,
        TypeName $typeName,
        Type $type,
        Product $product,
        IngredientId$ingredientId,
        Count $count,
        Image $image,
        Description $description,
        Unit $unit,
        UnitCount $unitCount,
        Cost $cost,
    ) {
        $this->name = $name->value;
        $this->typeId = $typeId->value;
        $this->typeName = $typeName->value;
        $this->type = $type->value;
        $this->product = $product->value;
        $this->ingredientId = $ingredientId->value;
        $this->count = $count->value;
        $this->image = $image->value;
        $this->description = $description->value;
        $this->unit = $unit->value;
        $this->unitCount = $unitCount->value;
        $this->cost = $cost->value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTypeId(): string
    {
        return $this->typeId;
    }

    public function setTypeId(string $typeId): void
    {
        $this->typeId = $typeId;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setTypeName(?string $typeName): void
    {
        $this->typeName = $typeName;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getProduct(): string
    {
        return $this->product;
    }

    public function setProduct(string $product): void
    {
        $this->product = $product;
    }

    public function getIngredientId(): string
    {
        return $this->ingredientId;
    }

    public function setIngredientId(string $ingredientId): void
    {
        $this->ingredientId = $ingredientId;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    public function getUnitCount(): float
    {
        return $this->unitCount;
    }

    public function setUnitCount(float $unitCount): void
    {
        $this->unitCount = $unitCount;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }
}
