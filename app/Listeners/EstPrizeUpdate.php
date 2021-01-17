<?php

namespace App\Listeners;

use App\LotteryCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $currentTotalEarning=ApiController::currentTotalEarning();
        $row->estprize = intval($currentTotalEarning)*0.60 ;
        $row->save();
        Log::debug($row);
    }
}
