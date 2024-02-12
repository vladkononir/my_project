<?php

declare(strict_types=1);

namespace App\Service;

use App\Factory\ProductFactory;
use App\Repository\Product\ProductRepositoryInterface;
use Psr\Log\LoggerInterface;

final readonly class ParserProductService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ProductFactory $productFactory,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * @param array[] $menu
     */
    public function parsingProduct(array $menu): void
    {
        foreach ($menu as $categories) {
            foreach ($categories as $categoryKey => $category) {
                if ($categoryKey === 'products') {
                    foreach ($category as $products) {
                        try {
                            $product = $this->productFactory->getProduct(
                                $products
                            );
                            $this->productRepository->save($product);
                        } catch (\Exception $exception) {
                            $this->logger->error($exception->getMessage());
                        }
                    }
                }
            }
        }
    }
}
