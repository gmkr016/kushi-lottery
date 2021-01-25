<?php

namespace Database\Seeders;

use App\Models\Lottery;
use Illuminate\Database\Seeder;

class LotterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lottery::factory()->count(100)->create();
    }
}
