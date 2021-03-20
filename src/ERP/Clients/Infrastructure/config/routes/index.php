<?php

use Illuminate\Support\Facades\Route;
use Medine\Apps\ERP\Backend\Controller\Clients\ClientBreadcrumbsPostController;
use Medine\Apps\ERP\Backend\Controller\Clients\ClientesGetController;
use Medine\Apps\ERP\Backend\Controller\Clients\ClientGetController;
use Medine\Apps\ERP\Backend\Controller\Clients\ClientPostController;
use Medine\Apps\ERP\Backend\Controller\Clients\ClientPutController;


Route::middleware('auth:api')->group(function () {
    Route::post('/client/breadcrumbs', ClientBreadcrumbsPostController::class);
    Route::post('/client', ClientPostController::class);
    Route::get('/client/{id}', ClientGetController::class);
    Route::put('/client/{id}', ClientPutController::class);
    Route::get('/client', ClientesGetController::class);
});
