<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Sensor::class, function (Faker $faker) {
    $now = Carbon::now();

    return [
        'id' => $faker->unique()->uuid,
        'name' => 'Sensor #' . $faker->numberBetween(1, 100),
        'status' => $faker->randomElement([0, 1]),
        'keyword' => $faker->password(),
        'pin' => $faker->randomElement(['D4', 'A2']),
        'has_history' => $faker->boolean(),
        'history_step' => mt_rand(0, 100),
        'room_id' => function () {

            return factory(\App\Room::class)->make()->getKey();
        },
        'node_id' => function () {

            return factory(\App\Node::class)->make()->getKey();
        },
        'value' => mt_rand(1, 1000),
        'created_at' => $now->format('Y-m-d H:i:s'),
        'updated_at' => $now->format('Y-m-d H:i:s')
    ];
});
