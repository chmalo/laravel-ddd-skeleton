<?php

declare(strict_types=1);

namespace Medine\Apps\ERP\Backend\Controller\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Medine\ERP\ClientCategories\Application\Response\ClientCategoryResponse;
use Medine\ERP\Clients\Application\Response\ClientResponse;
use Medine\ERP\Clients\Application\Search\ClienteCatalogsSearcher;
use Medine\ERP\Clients\Application\Search\ClienteCatalogsSearcherRequest;
use Medine\ERP\ClientTypes\Application\Response\ClientTypeResponse;
use function Lambdish\Phunctional\map;

final class ClientesCatalogsGetController extends Controller
{
    private $searcher;

    public function __construct(ClienteCatalogsSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(string $companyId)
    {
        $response = ($this->searcher)(new ClienteCatalogsSearcherRequest(
            [['field' => 'companyId', 'value' => $companyId]]
        ));

        return new JsonResponse( [
            'clientCategories' => map($this->formatClientCategories(), $response->clientCategory()),
            'clientTypes' => map($this->formatClientTypes(), $response->clientType())
        ], JsonResponse::HTTP_OK);
    }

    private function formatClientCategories(): callable
    {
        return function (ClientCategoryResponse $categoryResponse) {
            return [
                'id' => $categoryResponse->id(),
                'name' => $categoryResponse->name()
            ];
        };
    }

    private function formatClientTypes(): callable
    {
        return function (ClientTypeResponse $typeResponse) {
            return [
                'id' => $typeResponse->id(),
                'name' => $typeResponse->name()
            ];
        };
    }
}
