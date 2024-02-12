<?php

declare(strict_types=1);

namespace App\Entity\Product;

use App\Repository\Product\ProductsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Product\ValueObject\Category;
use App\Entity\Product\ValueObject\Cost;
use App\Entity\Product\ValueObject\ExternalId;
use App\Entity\Product\ValueObject\Priority;
use App\Entity\Product\ValueObject\ProjectProduct;
use App\Entity\Product\ValueObject\Title;
use App\Entity\Product\ValueObject\Weight;
use App\Entity\ValueObject\Description;
use App\Entity\ValueObject\Image;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
#[ORM\Table(name: '`product`')]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $externalId;

    #[ORM\Column(length: 255)]
    private int $priority;

    #[ORM\Column(length: 255)]
    private string $title;

    #[ORM\Column(length: 255)]
    private ?string $image;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description;

    #[ORM\Column(length: 255)]
    private string $weight;

    #[ORM\Column(length: 255)]
    private float $cost;

    #[ORM\Column(length: 255)]
    private ?string $projectProduct;

    #[ORM\Column(length: 255)]
    private string $category;

    public function __construct(
        ExternalId $externalId,
        Priority $priority,
        Title $title,
        Image $image,
        Description $description,
        Weight $weight,
        Cost $cost,
        Category $category,
        ProjectProduct $projectProduct,
    ) {
        $this->externalId = $externalId->value;
        $this->priority = $priority->value;
        $this->title = $title->value;
        $this->image = $image->value;
        $this->description = $description->value;
        $this->weight = $weight->value;
        $this->cost = $cost->value;
        $this->category = $category->value;
        $this->projectProduct = $projectProduct->value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function setExternalId(string $externalId): void
    {
        $this->externalId = $externalId;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
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

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    public function getProjectProduct(): ?string
    {
        return $this->projectProduct;
    }

    public function setProjectProduct(?string $projectProduct): void
    {
        $this->projectProduct = $projectProduct;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }
}
