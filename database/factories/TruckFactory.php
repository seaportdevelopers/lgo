<?php

use Faker\Generator as Faker;

$factory->define(App\Truck::class, function (Faker $faker) {
    return [
        'id' => rand(1000,9000),
        'idno' => rand(100000,999999),
        'status' => rand(0,4),
        'manufacturer' => $faker->company,
        'model' => $faker->countryCode,
        'rlDate' => $faker->datetime,
        'user_id' => rand(1000,9000),
    ];
});
