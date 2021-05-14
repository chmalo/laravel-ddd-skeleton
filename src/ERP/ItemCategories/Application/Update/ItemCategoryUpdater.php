<?php

declare(strict_types=1);

namespace Medine\ERP\ItemCategories\Application\Update;

use Medine\ERP\ItemCategories\Domain\Entity\ItemCategoryRepository;
use Medine\ERP\ItemCategories\Domain\Service\Find\ItemCategoryFinder;
use Medine\ERP\Shared\Domain\Bus\Event\EventBus;

final class ItemCategoryUpdater
{
    private $repository;
    private $bus;

    public function __construct(ItemCategoryRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->finder = new ItemCategoryFinder($repository);
        $this->bus = $bus;
    }

    public function __invoke(ItemCategoryUpdaterRequest $request)
    {
        $category = ($this->finder)($request->id());
        $category->changeName($request->name());
        $category->changeDescription($request->description());
        $category->changeState($request->state());
        $category->changeUpdatedBy($request->updatedBy());

        $this->repository->update($category);
        $this->bus->publish(...$category->pullDomainEvents());
    }
}
