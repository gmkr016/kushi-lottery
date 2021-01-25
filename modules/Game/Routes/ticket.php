<?php

use Illuminate\Support\Facades\Route;
use Modules\Game\Http\Controllers\Api\Agent\TicketController;

Route::controller(TicketController::class)->group(function () {
    Route::match(['GET', 'HEAD'], '/', 'index')->name('index')->middleware(['auth:sanctum', 'ability:tickets:index']);
    Route::post('/', 'store')->name('store')->middleware(['auth:sanctum', 'ability:tickets:store']);
    Route::match(['GET', 'HEAD'], '/{ticket}', 'show')->name('show')->middleware(['auth:sanctum', 'ability:tickets:show']);
    Route::match(['PUT', 'PATCH'], '/{ticket}', 'update')->name('update')->middleware(['auth:sanctum', 'ability:tickets:update']);
    Route::delete('/{ticket}', 'destroy')->name('destroy')->middleware(['auth:sanctum', 'ability:tickets:destroy']);
});
