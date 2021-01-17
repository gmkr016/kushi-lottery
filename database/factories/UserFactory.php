<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(
    App\User::class,
    function (Faker $faker) {
        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => '$2y$10$7WAQ7bDzwM1hv/dV/dt7AeszTxCyXJfG7WaUt6vr5Cc9jfj84yFpO', // secret 123456
            'pan' => $faker->randomNumber(9),
            'cname' => $faker->company(),
            'location' => $faker->numberBetween($min = 1, $max = 64),
            'contact' => $faker->phoneNumber(),
            'wallet' => $faker->randomNumber(5),
            'photo' => $faker->firstNameMale() . 'jpg',
            'remember_token' => $faker->randomNumber(9),
        ];
    }
);
