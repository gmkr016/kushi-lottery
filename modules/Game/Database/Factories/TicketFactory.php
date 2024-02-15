<?php

namespace Modules\Game\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Game\Enums\EnumIdentificationType;
use Modules\Game\Models\Game;

class TicketFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition()
    {
        $gamesArray = Game::query()->select(['id', 'user_id'])->get()->toArray();
        $randomRow = $this->faker->randomElement($gamesArray);

        return [
            'user_id' => $randomRow['user_id'],
            'gameId' => $randomRow['id'],
            'identificationType' => $this->faker->randomElement(EnumIdentificationType::toArray()),
            'identificationNumber' => $this->faker->randomDigitNotNull
        ];
    }
}
