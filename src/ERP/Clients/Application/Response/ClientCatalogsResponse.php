<?php

declare(strict_types=1);


namespace Medine\ERP\Clients\Application\Response;


use Medine\ERP\ClientCategories\Application\Response\ClientCategoryResponse;
use Medine\ERP\ClientTypes\Application\Response\ClientTypeResponse;

final class ClientCatalogsResponse
{
    private $clientCategory = [];
    private $clientType = [];

    public function clientCategory(): array
    {
        return $this->clientCategory;
    }

    public function clientType(): array
    {
        return $this->clientType;
    }

    public function setClientCategory(ClientCategoryResponse ...$clientCategory): void
    {
        $this->clientCategory = $clientCategory;
    }

    public function setClientType(ClientTypeResponse ...$clientType): void
    {
        $this->clientType = $clientType;
    }


}
