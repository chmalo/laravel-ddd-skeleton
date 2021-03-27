<?php

declare(strict_types=1);

namespace Tests\Feature\Locations;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Passport\Passport;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

final class LocationGetControllerTest extends TestCase
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
    public function it_should_get_an_existing_location()
    {
        Passport::actingAs(
            User::factory()->create()
        );
        $location = $this->location();
        $response = $this->postJson('/api/location', $location);
dd($response->getContent());
        $response->assertJson([]);
        $response->assertStatus(201);
        dd($response->getContent());
        $response = $this->getJson('/api/location/' . $location['id']);

        $response->assertJson($location);
        $response->assertStatus(200);
    }

    private function location(): array
    {
        return [
            'id' => \Medine\ERP\Shared\Domain\ValueObjects\Uuid::random()->value(),
            'code' => $this->faker->postcode,
            'name' => 'bodega',
            'mainContact' => $this->faker->name,
            'barcode' => $this->faker->postcode,
            'state' => 'activo',
            'direction' => 'el paraiso',
            'companyId' => \Medine\ERP\Shared\Domain\ValueObjects\Uuid::random()->value(),
            'itemState' => 'disponible'
        ];
    }
}
