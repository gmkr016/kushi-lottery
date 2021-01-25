<?php

namespace App\Listeners;

use App\Http\Controllers\Api\ApiController;
use App\LotteryCategory;
use Illuminate\Support\Facades\Log;

class EstPrizeUpdate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $row = LotteryCategory::find($event->lott_cat);
        $currentTotalEarning = ApiController::currentTotalEarning();
        $row->estprize = intval($currentTotalEarning) * 0.60;
        $row->save();
        // Log::debug($row);
    }
}
