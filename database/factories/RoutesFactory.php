<?php

use Faker\Generator as Faker;

$factory->define(App\Routes::class, function (Faker $faker) {
    return [
    	'userCreated' => $faker->randomDigit,
        'type' => $faker->randomDigit,
        'POINT_A' => $faker->streetAddress,
        'POINT_B' => $faker->streetAddress,
        'client' => $faker->company,
        'driverID' => $faker->randomDigit,
        'TruckID' => $faker->randomDigit,
        'CargoID' => $faker->randomDigit,
        'status' => $faker->numberBetween($min = 0, $max = 4)
        //
    ];
});
