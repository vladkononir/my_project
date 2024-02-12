<?php

declare(strict_types=1);

namespace App\Service;

use App\Factory\CategoryFactory;
use App\Repository\Menu\MenuRepositoryInterface;
use Psr\Log\LoggerInterface;

final readonly class ParserCategoryService
{
    public function __construct(
        private MenuRepositoryInterface $menuRepository,
        private CategoryFactory $menuFactory,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * @param array[] $menu
     */
    public function ParsingMenu(array $menu): void
    {
        foreach ($menu as $categories) {
            try {
                $category = $this->menuFactory->getMenu($categories);
                $this->menuRepository->save($category);
            } catch (\Exception $exception) {
                $this->logger->error($exception->getMessage());
            }
        }
    }
}
