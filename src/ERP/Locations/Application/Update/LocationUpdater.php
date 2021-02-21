<?php

declare(strict_types=1);

namespace Medine\ERP\Locations\Application\Update;

use Medine\ERP\Locations\Domain\LocationRepository;
use Medine\ERP\Locations\Domain\Service\LocationFinder;
use Medine\ERP\Locations\Domain\ValueObject\LocationBarcode;
use Medine\ERP\Locations\Domain\ValueObject\LocationCode;
use Medine\ERP\Locations\Domain\ValueObject\LocationCompanyId;
use Medine\ERP\Locations\Domain\ValueObject\LocationDirection;
use Medine\ERP\Locations\Domain\ValueObject\LocationId;
use Medine\ERP\Locations\Domain\ValueObject\LocationItemState;
use Medine\ERP\Locations\Domain\ValueObject\LocationMainContact;
use Medine\ERP\Locations\Domain\ValueObject\LocationName;
use Medine\ERP\Locations\Domain\ValueObject\LocationState;


final class LocationUpdater
{
    private $finder;
    private $repository;

    public function __construct(LocationRepository $repository)
    {
        $this->repository = $repository;
        $this->finder = new LocationFinder($repository);
    }

    public function __invoke(LocationUpdaterRequest $request)
    {
        $location = ($this->finder)(new LocationId($request->id()));


        $location->changeCode(new LocationCode($request->code()));
        $location->changeName(new LocationName($request->name()));
        $location->changeMainContact(new LocationMainContact($request->mainContact()));
        $location->changeBarcode(new LocationBarcode($request->barcode()));
        $location->changeState(new LocationState($request->state()));
        $location->changeDirection(new LocationDirection($request->direction()));
        $location->changeCompanyId(new LocationCompanyId($request->companyId()));
        $location->changeItemState(new LocationItemState($request->itemState()));

        //...
        $this->repository->update($location);
    }
}
