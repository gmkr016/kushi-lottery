<?php

namespace Modules\Game\Database\Seeders;

use App\Models\Game\LotteryNumber;
use Illuminate\Database\Seeder;

class LotteryNumberSeeder extends Seeder
{
    public function run(): void
    {
        LotteryNumber::factory()->count(5000)->create();
    }
}
