<?php

namespace Database\Factories;

use App\Models\Lottery;
use Illuminate\Database\Eloquent\Factories\Factory;

class LotteryFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Lottery::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'cat_id' => 2,
            'serial' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'u_id' => $this->faker->numberBetween($min = 1, $max = 9),
            'first_number' => $this->faker->numberBetween($min = 1, $max = 45),
            'second_number' => $this->faker->numberBetween($min = 1, $max = 45),
            'third_number' => $this->faker->numberBetween($min = 1, $max = 45),
            'fourth_number' => $this->faker->numberBetween($min = 1, $max = 45),
            'fifth_number' => $this->faker->numberBetween($min = 1, $max = 45),
            'sixth_number' => $this->faker->numberBetween($min = 1, $max = 45),
        ];
    }
}
