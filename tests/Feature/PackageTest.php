<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Http\Response;
use App\Massage;
use App\Package;

class PackageTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    public function test_try_to_create_package_with_invalid_data()
    {
        $uri = route('package.store');
        $data = [
            'name' => 'My awesome package',
        ];

        $res = $this->post($uri, $data);
        $res->assertRedirect();
    }

    public function test_try_to_create_package_without_massage_in_db()
    {
        $uri = route('package.store');
        $data = [
            'name' => 'My awesome package',
            'items' => [
                ['price' => 10, 'amount' => 10, 'duration' => 5, 'massage_id' => 1]
            ]
        ];

        $res = $this->post($uri, $data);
        $res->assertStatus(Response::HTTP_INTERNAL_SERVER_ERROR);
        $this->assertDatabaseMissing('packages', ['name' => $data['name']]);
        $this->assertDatabaseMissing('package_items', $data['items'][0]);
    }

    public function test_create_package()
    {
        $this->withoutExceptionHandling();
        $massage = factory(Massage::class)->create();
        $uri = route('package.store');
        $data = [
            'name' => 'My awesome package',
            'items' => [
                ['price' => $massage->price, 'amount' => 10, 'duration' => $massage->duration, 'massage_id' => $massage->id]
            ]
        ];

        $res = $this->post($uri, $data);
        $res->assertSuccessful();
        $this->assertDatabaseHas('packages', ['name' => $data['name']]);
        $this->assertDatabaseHas('package_items', $data['items'][0]);
    }

    public function test_update_package()
    {
        $this->withoutExceptionHandling();

        $massage = factory(Massage::class)->create();
        $package = Package::create(['name' => 'My awesome package']);
        $uri = route('package.update', $package->id);

        $data = [
            'name' => 'My other awesome package',
            'items' => [
                ['price' => $massage->price, 'amount' => 10, 'duration' => $massage->duration, 'massage_id' => $massage->id]
            ]
        ];

        $res = $this->patch($uri, $data);
        $res->assertSuccessful();
        $this->assertDatabaseHas('packages', ['name' => $data['name']]);
        $this->assertDatabaseHas('package_items', $data['items'][0]);
    }
}
