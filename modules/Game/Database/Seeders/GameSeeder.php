<?php

namespace Modules\Game\Database\Seeders;

use App\Models\Game\Game;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Game::factory()
            ->count(50)
            ->create();
        Game::query()->orderBy('id', 'asc')->each(function (Game $game, $index) {
            $game->endDate = Carbon::parse($game->startDate)->addDays(6);
            $game->drawDate = $game->endDate;
            $game->title = sprintf("Game-%d", ++$index);
            $game->save();
        });
    }
}
