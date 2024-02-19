<?php

namespace Modules\Game\Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class GameFactory extends Factory
{
    public function definition(): array
    {
        $usersArray = User::query()->pluck('id')->toArray();

        $startDate = Carbon::parse('first sunday of october 2023')->format('Y-m-d H:i:s');
        $randomAddDays = array_filter(range(7, 1000), fn($num) => $num % 7 === 0);
        return [
            'user_id' => $this->faker->randomElement($usersArray),
            'title' => sprintf('GameWeek-%s', $this->faker->unique()->randomNumber(2)),
            'startDate' => Carbon::parse($startDate)->addDays(-abs(Arr::random($randomAddDays))),
            'endDate' => Carbon::parse($startDate)->addDays(7)->format('Y-m-d H:i:s'),
            'drawDate' => Carbon::parse($startDate)->addDays(7)->format('Y-m-d H:i:s'),
        ];
    }
}
