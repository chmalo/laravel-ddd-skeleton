<?php

declare(strict_types=1);

namespace Tests\Feature\Locations;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Passport\Passport;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

final class LocationsPutControllerTest extends TestCase
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
    public function it_should_update_an_existing_location()
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $location_id = Uuid::uuid4()->toString();

        $this->postJson('/api/location', [
            'id' => $location_id,
            'code' => $this->faker->postcode,
            'name' => 'bodega',
            'mainContact' => $this->faker->name,
            'barcode' => $this->faker->postcode,
            'state' => 'activo',
            'direction' => 'el paraiso',
            'companyId' => Uuid::uuid4()->toString(),
            'itemState' => 'disponible'
        ]);

        $response = $this->putJson('/api/location/'. $location_id, [
            'code' => $this->faker->postcode,
            'name' => 'bodega',
            'mainContact' => $this->faker->name,
            'barcode' => $this->faker->postcode,
            'state' => 'activo',
            'direction' => 'el paraiso',
            'companyId' => Uuid::uuid4()->toString(),
            'itemState' => 'disponible'
        ]);
dd($response->getContent());
        $response->assertJson([]);
        $response->assertStatus(200);
    }
}













