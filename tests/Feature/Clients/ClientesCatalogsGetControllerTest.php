<?php

declare(strict_types=1);

namespace Tests\Feature\Clients;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Passport\Passport;
use Ramsey\Uuid\Uuid;
use Tests\Feature\Shared\FeatureBase;

final class ClientesCatalogsGetControllerTest extends FeatureBase
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
    public function it_should_get_all_catalogs_for_an_existing_company_in_client_module()
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $companyId = Uuid::uuid4();
        $this->buildCompany($companyId, $this->faker);

        $response = $this->getJson('/api/client/catalogs/' . $companyId);

        $response->assertStatus(200);
    }

}
