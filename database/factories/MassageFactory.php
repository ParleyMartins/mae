<?php

use Faker\Generator as Faker;
use App\Massage;

$factory->define(Massage::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'price' => $faker->numberBetween(1, 200),
        'duration' => $faker->numberBetween(30, 90),
        'description' => $faker->text,
    ];
});
