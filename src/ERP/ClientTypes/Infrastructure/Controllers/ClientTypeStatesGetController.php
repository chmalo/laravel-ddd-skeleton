<?php

declare(strict_types=1);

namespace Medine\ERP\ClientTypes\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final class ClientTypeStatesGetController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(string $id): JsonResponse
    {
        $data = ' data-id="' . $id . '" ';
        $html = '';
        $html .= '<button class="btn btn-block  my-3 btn-outline-success updateState" ' . $data . ' data-state="active">Active</button>';
        $html .= '<button class="btn btn-block  my-3 btn-outline-danger updateState" ' . $data . ' data-state="inactive">Inactive</button>';

        return new JsonResponse($html, JsonResponse::HTTP_OK);
    }

}
