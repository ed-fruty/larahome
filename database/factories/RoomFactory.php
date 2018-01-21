<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'id'    => $faker->unique()->uuid,
        'name' => 'Room #' . $faker->numberBetween(1, 100),
    ];
});
