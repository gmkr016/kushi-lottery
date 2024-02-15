<?php

namespace Modules\Game\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Modules\Game\Database\Seeders\TicketSeeder;
use Modules\Game\Enums\EnumNumbersType;
use Modules\Game\Models\Game;
use Modules\Game\Models\LotteryNumber;
use Modules\Game\Models\Ticket;

class LotteryNumberFactory extends Factory
{
    protected $model = LotteryNumber::class;

    public function definition(): array
    {
        $ticketIds = Ticket::query()->pluck('id')->toArray();
        return [
            'ticketId' => $this->faker->randomElement($ticketIds),
            'type' => Arr::random(EnumNumbersType::toArray()),
            'first' => $this->faker->numberBetween(int1: 1, int2: 45),
            'second' => $this->faker->numberBetween(int1: 1, int2: 45),
            'third' => $this->faker->numberBetween(int1: 1, int2: 45),
            'fourth' => $this->faker->numberBetween(int1: 1, int2: 45),
            'fifth' => $this->faker->numberBetween(int1: 1, int2: 45),
            'sixth' => $this->faker->numberBetween(int1: 1, int2: 45),
        ];
    }
}
