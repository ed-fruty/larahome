<?php

use App\Node;
use Carbon\Carbon;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Node::class, function (Faker $faker) {

    $now = Carbon::now();

    return [
        'id'    =>  $faker->unique()->uuid,
        'name'  =>  'Node #' . $faker->numberBetween(1, 100),
        'keyword'   => $faker->unique()->password,
        'status'    => mt_rand(0, 1),
        'platform'  => $faker->randomElement(Node::PLATFORMS),
        'connection'    => $faker->randomElement(Node::CONNECTIONS),
        'protocol'  => $faker->randomElement(Node::PROTOCOLS),
        'dsn'   => 'braud=9600&device=/dev/tty/COM1',
        'pinged_at' => $now->format('Y-m-d H:i:s'),
        'created_at'    => $now->format('Y-m-d H:i:s'),
        'updated_at'    => $now->format('Y-m-d H:i:s')
    ];
});
