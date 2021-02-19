<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Medine\ERP\Locations\Infrastructure\Controllers\LocationsPostController;

Route::middleware('auth:api')->group(function () {
    Route::post('/location', LocationsPostController::class);
});
