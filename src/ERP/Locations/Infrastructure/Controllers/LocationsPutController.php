<?php

declare(strict_types=1);

namespace Medine\ERP\Locations\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Medine\ERP\Locations\Application\Update\LocationUpdater;
use Medine\ERP\Locations\Application\Update\LocationUpdaterRequest;

final class LocationsPutController extends Controller
{
    private $updater;

    public function __construct(LocationUpdater $updater)
    {
        $this->updater = $updater;
    }

    public function __invoke(string $id, Request $request)
    {
        ($this->updater)(new LocationUpdaterRequest(
            $id,
            $request->code,
            $request->name,
            $request->mainContact,
            $request->barcode,
            $request->state,
            $request->direction,
            $request->companyId,
            $request->itemState
        ));

        return new JsonResponse([], JsonResponse::HTTP_OK);
    }
}
