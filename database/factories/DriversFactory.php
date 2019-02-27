<?php

use Faker\Generator as Faker;

$factory->define(App\Drivers::class, function (Faker $faker) {
    return [
        'Fname' => $faker->firstName,
        'Lname' => $faker->lastName,
        'birthDate' => $faker->dateTimeInInterval($startDate = '-45 years', $interval = '+ 7 months', $timezone = null),
    ];
});
