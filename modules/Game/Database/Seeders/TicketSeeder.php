<?php

namespace Modules\Game\Database\Seeders;

use App\Models\Game\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        Ticket::factory()->count(100)->create();
    }
}
