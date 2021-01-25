<?php

namespace App\Listeners;

use App\Http\Controllers\Admin\ResultController;
use App\Models\Result;

class TotalWinnersUpdate
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
        $draw_id = $event->draw_id;
        $forPosition = $event->forPosition;
        $row = Result::where('cat_id', $draw_id)->where('winnerpos', $forPosition)->first();
        $numberOfWinners = ResultController::winnersCheck($draw_id, $forPosition);
        $row->noswinners = $numberOfWinners;
        if ($row->save()) {
            return $row;
        } else {
            return 'error';
        }
    }
}
