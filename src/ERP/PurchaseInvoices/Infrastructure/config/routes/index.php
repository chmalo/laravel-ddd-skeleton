<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Medine\Apps\ERP\Backend\Controller\PurchaseInvoices\PurchaseInvoicePostController;
use Medine\ERP\PurchaseInvoices\Infrastructure\Controllers\PurchaseInvoiceGetController;

Route::middleware('auth:api')->group(function () {
    Route::post('/purchase_invoices', PurchaseInvoicePostController::class);
    Route::get('/purchase_invoices/{id}', PurchaseInvoiceGetController::class);
});
