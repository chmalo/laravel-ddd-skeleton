<?php

declare(strict_types=1);

namespace Medine\ERP\PurchaseInvoices\Application\Create;

use Medine\ERP\PurchaseInvoices\Domain\PurchaseInvoice;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceAccountsPayId;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceCode;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceCompanyId;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceDiscount;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceId;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceIssueDate;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceObservations;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoicePaymentTerm;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceProviderId;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceReference;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceSubtotal;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceTax;
use Medine\ERP\PurchaseInvoices\Domain\ValueObject\PurchaseInvoiceTotal;

final class PurchaseInvoiceCreator
{
    public function __invoke(PurchaseInvoiceCreatorRequest $request)
    {
        $purchaseInvoice = PurchaseInvoice::create(
            new PurchaseInvoiceId($request->id()),
            new PurchaseInvoiceProviderId($request->providerId()),
            new PurchaseInvoicePaymentTerm($request->paymentTerm()),
            new PurchaseInvoiceCode($request->code()),
            new PurchaseInvoiceIssueDate($request->issueDate()),
            new PurchaseInvoiceAccountsPayId($request->accountsPayId()),
            new PurchaseInvoiceReference($request->reference()),
            new PurchaseInvoiceObservations($request->observations()),
            new PurchaseInvoiceSubtotal($request->subtotal()),
            new PurchaseInvoiceDiscount($request->discount()),
            new PurchaseInvoiceTax($request->tax()),
            new PurchaseInvoiceTotal($request->total()),
            new PurchaseInvoiceCompanyId($request->companyId()),
        //$request->items()//todo:implement this line
        );
    }
}
