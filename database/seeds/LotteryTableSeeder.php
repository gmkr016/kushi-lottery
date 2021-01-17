<?php

use Illuminate\Database\Seeder;

class LotteryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Lottery::class, 50000)->create();
    }
}
