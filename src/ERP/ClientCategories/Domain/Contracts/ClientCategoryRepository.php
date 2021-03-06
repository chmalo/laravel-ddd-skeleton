<?php

declare(strict_types=1);

namespace Medine\ERP\ClientCategories\Domain\Contracts;


use Medine\ERP\ClientCategories\Domain\Entity\ClientCategory;
use Medine\ERP\ClientCategories\Domain\ValueObjects\ClientCategoryId;

interface ClientCategoryRepository
{
    public function find(ClientCategoryId $id): ?ClientCategory;
    public function save(ClientCategory $clientCategory): void;
    public function update(ClientCategory $clientCategory): void;
    public function matching(\Medine\ERP\Shared\Domain\Criteria $criteria): array;
}
