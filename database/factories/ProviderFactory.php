<?php

use Faker\Generator as Faker;

$factory->define(\App\Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->companyEmail,
        'website' => $faker->unique()->domainName,
        'payed' => $faker->randomFloat(NULL, 0, NULL)
    ];
});
