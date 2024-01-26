<?php

use Illuminate\Support\Facades\Route;
use Modules\Statistics\Controllers\Api\Agent\StatisticsController;

Route::controller(StatisticsController::class)->group(function () {
    Route::get('games', 'getCurrentGameStatistics');
});