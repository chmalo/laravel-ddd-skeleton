<?php

declare(strict_types=1);

namespace Tests\Feature\PurchaseInvoices;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Passport\Passport;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

final class PurchaseInvoiceGetControllerTest extends TestCase
{
    use DatabaseTransactions;

    private $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
        parent::setUp();
    }

    /**
     * @test
     */
    public function it_should_get_an_existing_invoice()
    {
        Passport::actingAs(
            User::factory()->create()
        );
        $purchaseInvoice = $this->purchaseInvoice();
        $response = $this->postJson('/api/purchase_invoices', $purchaseInvoice);

        $response->assertJson([]);
        $response->assertStatus(201);

        $response = $this->getJson('/api/purchase_invoices/' . $purchaseInvoice['id']);

        $response->assertJson($purchaseInvoice);
        $response->assertStatus(200);
    }

    private function purchaseInvoice(): array
    {
        return [
            'id' => Uuid::uuid4()->toString(),
            'providerId' => Uuid::uuid4()->toString(),
            'paymentTerm' => 'cash',
            'code' => $this->faker->postcode,
            'issueDate' => '25/10/2021',
            'accountsPayId' => Uuid::uuid4()->toString(),
            'reference' => $this->faker->text(15),
            'observations' => $this->faker->text(255),
            'subtotal' => 100,
            'discount' => 10,
            'tax' => 6.30,
            'total' => 96.30,
            'companyId' => Uuid::uuid4()->toString(),
            'items' => [
                [
                    'id' => Uuid::uuid4()->toString(),
                    'categoryId' => Uuid::uuid4()->toString(),
                    'itemId' => Uuid::uuid4()->toString(),
                    'quantity' => 1,
                    'unitId' => Uuid::uuid4()->toString(),
                    'unitPrice' => 100,
                    'subtotal' => 100,
                    'taxId' => Uuid::uuid4()->toString(),
                    'discountRate' => 10,
                    'accountingCenterId' => Uuid::uuid4()->toString(),
                    'accountId' => Uuid::uuid4()->toString(),
                    'locationId' => Uuid::uuid4()->toString()
                ]
            ]
        ];
    }
}
