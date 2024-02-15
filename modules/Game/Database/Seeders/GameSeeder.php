<?php

namespace Modules\Game\Database\Seeders;

use App\Models\Game\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Game::factory()
            ->count(50)
            ->create();
    }
}
