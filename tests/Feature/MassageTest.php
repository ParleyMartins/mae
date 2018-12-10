<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Massage;

class MassageTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_massage()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $uri = route('massage.store');
        $data = ['name' => 'New massage', 'price' => 100, 'duration' => 90];
        $packageData = ['price' => $data['price'], 'duration' => $data['duration'], 'amount' => 1];

        $res = $this->actingAs($user)->post($uri, $data);

        $res->assertStatus(201);
        $this->assertDatabaseHas('massages', $data);
        $this->assertDatabaseHas('packages', ['name' => $data['name']]);
        $this->assertDatabaseHas('massage_package', $packageData);
    }

    public function test_update_massage()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $oldData = ['name' => 'New massage', 'price' => 100, 'duration' => 90];
        $massage = Massage::create($oldData);
        $uri = route('massage.update', $massage->id);
        $newData = ['name' => 'Right massage', 'price' => 200, 'duration' => 60];
        $packageData = ['price' => $newData['price'], 'duration' => $newData['duration'], 'amount' => 1];

        $res = $this->actingAs($user)->patch($uri, $newData);

        $res->assertStatus(200);
        $this->assertDatabaseHas('massages', $newData);
        $this->assertDatabaseMissing('massages', $oldData);
        $this->assertDatabaseHas('packages', ['name' => $newData['name']]);
        $this->assertDatabaseMissing('massages', ['name' => $oldData['name']]);
        $this->assertDatabaseHas('massage_package', $packageData);
    }

    public function test_delete_massage()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $data = ['name' => 'New massage', 'price' => 100, 'duration' => 90];
        $massage = Massage::create($data);
        $uri = route('massage.destroy', $massage->id);
        $packageData = ['price' => $massage->price, 'duration' => $massage->duration, 'amount' => 1];

        $res = $this->actingAs($user)->delete($uri);

        $res->assertStatus(204);
        $this->assertDatabaseMissing('massages', $data);
        $this->assertDatabaseMissing('packages', ['name' => $massage->name]);
        $this->assertDatabaseMissing('massage_package', $packageData);
    }
}
