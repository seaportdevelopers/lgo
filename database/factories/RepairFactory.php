<?php

use Faker\Generator as Faker;

$factory->define(App\Repair::class, function (Faker $faker) {
    return [
      'id' => rand(1000,9000),
      'category' => rand(1,3),
      'idno' => rand(100000,999999),
      'userInformed' => rand(1000,9000),
      'description' => $faker->text,
      'repairCompany' => $faker->company,
      'repairDate' => $faker->date,
      'repairDateEnd' => $faker->date,
      'userResponsible' => rand(1,10),
      'repairsPrice' => rand(100,999999),
    ];
});
