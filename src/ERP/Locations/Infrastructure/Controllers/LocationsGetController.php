<?php

declare(strict_types=1);

namespace Medine\ERP\Locations\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Medine\ERP\Locations\Application\Find\LocationFinder;
use Medine\ERP\Locations\Application\Find\LocationFinderRequest;

final class LocationsGetController extends Controller
{
    private $finder;

    public function __construct(LocationFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(string $id)
    {
        $location = ($this->finder)(new LocationFinderRequest(
            $id
        ));

        return new JsonResponse([
            'id' => $location->id(),
            'code' => $location->code(),
            'name' => $location->name(),
            'mainContact' => $location->mainContact(),
            'barcode' => $location->barcode(),
            'state' => $location->state(),
            'direction' => $location->direction(),
            'companyId' => $location->companyId(),
            'itemState' => $location->itemState()
        ], JsonResponse::HTTP_OK);
    }
}
