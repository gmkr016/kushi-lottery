<?php

use Illuminate\Support\Facades\Route;
use Modules\Game\Http\Controllers\Api\Agent\GameController;

Route::controller(GameController::class)->group(function () {
    Route::match(['GET', 'HEAD'], '/', 'index')->name('index')->middleware(['auth:sanctum', 'ability:games:index']);
    Route::post('/', 'store')->name('store')->middleware(['auth:sanctum', 'ability:games:store']);
    Route::match(['GET', 'HEAD'], '/{game}', 'show')->name('show')->middleware(['auth:sanctum', 'ability:games:show']);
    Route::match(['PUT', 'PATCH'], '/{game}', 'update')->name('update')->middleware(['auth:sanctum', 'ability:games:update']);
    Route::delete('/{game}', 'destroy')->name('destroy')->middleware(['auth:sanctum', 'ability:games:destroy']);
});
