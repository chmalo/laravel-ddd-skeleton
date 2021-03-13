<?php

declare(strict_types=1);


namespace Medine\ERP\Product\Domain\Contracts;


use Medine\ERP\Product\Domain\Entity\Product;
use Medine\ERP\Product\Domain\ValueObjects\ProductId;
use Medine\ERP\Shared\Domain\Criteria;

interface ProductRepository
{
    public function save(Product $product): void;

    public function find(ProductId $productId): ?Product;

    public function update(Product $product): void;

    public function count(Criteria $criteria): int;
}
