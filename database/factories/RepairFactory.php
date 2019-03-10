<?php

use Faker\Generator as Faker;

$factory->define(App\Repair::class, function (Faker $faker){
   return [
      'status' => $faker->numberBetween($min = 0, $max=4),
      'idno' => 'ABC123',
      'userInformed' => '0',
      'description' => '---',
      'repairCompany' => 'ivec customers supprot',
      'repairDate' => now(),
      'repairDateEnd' => now(),
      'userResponsible' => '0',
      'repairsPrice' => $faker->numberBetween($min = 1000, $max = 9000),
   ];
});
