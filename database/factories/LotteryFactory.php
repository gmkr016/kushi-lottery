<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Lottery::class, function (Faker $faker) {
    return [
        'cat_id' => $faker->numberBetween($min = 1, $max = 8),
        'serial' => $faker->uuid(),
        'u_id' => $faker->numberBetween($min = 1, $max = 18),
        'first_number' => $faker->numberBetween($min = 1, $max = 45),
        'second_number' => $faker->numberBetween($min = 1, $max = 45),
        'third_number' => $faker->numberBetween($min = 1, $max = 45),
        'fourth_number' => $faker->numberBetween($min = 1, $max = 45),
        'fifth_number' => $faker->numberBetween($min = 1, $max = 45),
        'sixth_number' => $faker->numberBetween($min = 1, $max = 45),
    ];
});
