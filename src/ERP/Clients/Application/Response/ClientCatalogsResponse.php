<?php

declare(strict_types=1);


namespace Medine\ERP\Clients\Application\Response;


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

    public function setClientCategory(... $clientCategory): void
    {
        $this->clientCategory = $clientCategory;
    }

    public function setClientType(... $clientType): void
    {
        $this->clientType = $clientType;
    }


}
