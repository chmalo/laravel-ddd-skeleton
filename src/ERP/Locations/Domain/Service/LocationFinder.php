<?php


namespace Medine\ERP\Locations\Domain\Service;


use Medine\ERP\Locations\Domain\Entity\Location;
use Medine\ERP\Locations\Domain\LocationRepository;
use Medine\ERP\Locations\Domain\ValueObject\LocationId;

class LocationFinder
{
    private $repository;

    public function __construct(LocationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(LocationId $id): Location
    {
        $location = $this->repository->find($id);

        if (null === $location) {
            throw new LocationNotExistsException($id);
        }

        return $location;
    }
}
