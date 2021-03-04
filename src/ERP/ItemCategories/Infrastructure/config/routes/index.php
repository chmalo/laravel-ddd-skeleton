<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Medine\ERP\ItemCategories\Infrastructure\Controller\ItemCategoryGetController;
use Medine\ERP\ItemCategories\Infrastructure\Controller\ItemCategoryPostController;
use Medine\ERP\ItemCategories\Infrastructure\Controller\ItemCategoryPutController;

Route::middleware('auth:api')->group(function () {
    Route::post('/item_categories', ItemCategoryPostController::class);
    Route::put('/item_categories/{id}', ItemCategoryPutController::class);
    Route::get('/item_categories/{id}', ItemCategoryGetController::class);
});
