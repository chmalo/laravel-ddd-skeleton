<?php

use Illuminate\Support\Facades\Route;
use Medine\Apps\ERP\Backend\Controller\Company\CompanyBreadcrumbsPostController;
use Medine\Apps\ERP\Backend\Controller\Company\CompanyPostController;
use Medine\Apps\ERP\Backend\Controller\Company\CompanyPutController;

Route::middleware('auth:api')->group(function () {
    Route::post('/company', CompanyPostController::class);
    Route::post('/company/breadcrumbs', CompanyBreadcrumbsPostController::class);
    Route::put('/company/{id}', CompanyPutController::class);
});
