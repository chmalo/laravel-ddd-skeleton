<?php

declare(strict_types=1);

namespace Medine\ERP\Locations\Application\Find;

use Medine\ERP\Locations\Application\LocationResponse;
use Medine\ERP\Locations\Domain\Service\LocationFinder as DomainFinder;
use Medine\ERP\Locations\Domain\ValueObject\LocationId;

final class LocationFinder
{
    private $finder;

    public function __construct(DomainFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(LocationFinderRequest $request)
    {
        $location = ($this->finder)(new LocationId($request->id()));

        return new LocationResponse(
            $location->id()->value(),
            $location->code()->value(),
            $location->name()->value(),
            $location->mainContact()->value(),
            $location->barcode()->value(),
            $location->state()->value(),
            $location->direction()->value(),
            $location->companyId()->value(),
            $location->itemState()->value(),
        );
    }

}
