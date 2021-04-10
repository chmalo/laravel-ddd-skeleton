<?php

declare(strict_types=1);

namespace Medine\ERP\Clients\Application\Search;

use Medine\ERP\ClientCategories\Application\Response\ClientCategoryResponse;
use Medine\ERP\ClientCategories\Domain\Contracts\ClientCategoryRepository;
use Medine\ERP\ClientCategories\Domain\Entity\ClientCategory;
use Medine\ERP\Clients\Application\Response\ClientCatalogsResponse;
use Medine\ERP\ClientTypes\Application\Response\ClientTypeResponse;
use Medine\ERP\ClientTypes\Domain\Contracts\ClientTypeRepository;
use Medine\ERP\ClientTypes\Domain\Entity\ClientType;
use Medine\ERP\Shared\Domain\Criteria;
use Medine\ERP\Shared\Domain\Criteria\Filters;
use Medine\ERP\Shared\Domain\Criteria\Order;
use function Lambdish\Phunctional\map;

final class ClienteCatalogsSearcher
{
    private $categoryRepository;
    private $typeRepository;
    private $clientCatalogsResponse;

    public function __construct(
        ClientCategoryRepository $categoryRepository,
        ClientTypeRepository $typeRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->typeRepository = $typeRepository;
        $this->clientCatalogsResponse = new ClientCatalogsResponse();
    }

    public function __invoke(ClienteCatalogsSearcherRequest $request): ClientCatalogsResponse
    {
        $criteria = new Criteria(
            Filters::fromValues($request->filters()),
            Order::fromValues($request->orderBy(), $request->order()),
            $request->offset(),
            $request->limit()
        );

        $this->clientCatalogsResponse->setClientCategory(...map( $this->toResponseClientCategory(),
            $this->categoryRepository->matching($criteria)));

        $this->clientCatalogsResponse->setClientType(...map( $this->toResponseClientType(),
            $this->typeRepository->matching($criteria)));

        return $this->clientCatalogsResponse;
    }

    private function toResponseClientType(): callable
    {
        return function (ClientType $clientType) {
            return new ClientTypeResponse(
                $clientType->id()->value(),
                $clientType->companyId()->value(),
                $clientType->name()->value(),
                $clientType->description()->value(),
                $clientType->state()->value(),
            );
        };
    }

    private function toResponseClientCategory(): callable
    {
        return function (ClientCategory $clientCategory) {
            return new ClientCategoryResponse(
                $clientCategory->id()->value(),
                $clientCategory->companyId()->value(),
                $clientCategory->name()->value(),
                $clientCategory->description()->value(),
                $clientCategory->state()->value(),
            );
        };
    }
}
