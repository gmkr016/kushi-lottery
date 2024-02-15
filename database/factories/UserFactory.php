<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('test@123'),
            'pan' => $this->faker->randomNumber(9),
            'cname' => $this->faker->company(),
            'location' => $this->faker->numberBetween($min = 1, $max = 64),
            'contact' => $this->faker->phoneNumber(),
            'wallet' => $this->faker->randomNumber(5),
            'photo' => $this->faker->firstNameMale().'jpg',
            'remember_token' => $this->faker->randomNumber(9),
        ];
    }
}
