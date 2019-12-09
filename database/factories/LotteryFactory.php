<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Lottery::class, function (Faker $faker) {
    return [
        'cat_id' => 2,
        'serial' => $faker->numberBetween($min = 1000, $max = 9000),
        'u_id' => $faker->numberBetween($min = 1, $max = 9),
        'first_number' => $faker->numberBetween($min = 1, $max = 45),
        'second_number' => $faker->numberBetween($min = 1, $max = 45),
        'third_number' => $faker->numberBetween($min = 1, $max = 45),
        'fourth_number' => $faker->numberBetween($min = 1, $max = 45),
        'fifth_number' => $faker->numberBetween($min = 1, $max = 45),
        'sixth_number' => $faker->numberBetween($min = 1, $max = 45),
    ];
});