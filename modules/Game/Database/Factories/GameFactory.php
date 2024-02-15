<?php

namespace Modules\Game\Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    public function definition(): array
    {
        $usersArray = User::query()->pluck('id')->toArray();

        $startDate = Carbon::instance($this->faker->dateTimeBetween('-6 months', '+1 months'));
        $endDate = (clone $startDate)->addDays(7);
        return [
            'user_id' => $this->faker->randomElement($usersArray),
            'title' => sprintf("GameWeek-%s", $this->faker->unique()->randomNumber(2)),
            'startDate' => $startDate,
            'endDate' => $endDate,
            'drawDate' => $endDate
        ];
    }
}
