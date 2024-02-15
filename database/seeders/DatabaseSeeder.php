<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Game\Database\Seeders\GameSeeder;
use Modules\Game\Database\Seeders\LotteryNumberSeeder;
use Modules\Game\Database\Seeders\TicketSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this
            ->call([
                UsersSeeder::class,
                GameSeeder::class,
                TicketSeeder::class,
                LotteryNumberSeeder::class,
            ]);
    }
}
