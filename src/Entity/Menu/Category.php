<?php

declare(strict_types=1);

namespace App\Entity\Menu;

use App\Repository\Menu\MenuRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Menu\ValueObject\ExternalId;
use App\Entity\Menu\ValueObject\Name;
use App\Entity\Menu\ValueObject\Priority;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ORM\Table(name: '`category`')]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private ?string $externalId;

    #[ORM\Column(length: 255)]
    private ?string $name;

    #[ORM\Column(length: 255)]
    private ?int $priority;

    public function __construct(
        ExternalId $externalId,
        Name $name,
        Priority $priority,
    ) {
        $this->externalId = $externalId->value;
        $this->name = $name->value;
        $this->priority = $priority->value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(string $externalId): void
    {
        $this->externalId = $externalId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): void
    {
        $this->priority = $priority;
    }
}
