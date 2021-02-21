<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Medine\ERP\Locations\Infrastructure\Controllers\LocationsPostController;
use Medine\ERP\Locations\Infrastructure\Controllers\LocationsPutController;

Route::middleware('auth:api')->group(function () {
    Route::post('/location', LocationsPostController::class);
    Route::put('/location/{id}', LocationsPutController::class);
});
