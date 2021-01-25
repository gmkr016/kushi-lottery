<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Api\Agent\LoginController;
use Modules\Auth\Http\Controllers\Api\Agent\RegisterController;

Route::prefix('agent')
    ->name('agent.')
    ->controller(LoginController::class)
    ->group(function () {
        Route::post('login', 'login')->name('login');

        Route::post('logout', 'logout')->name('logout')->middleware('auth:sanctum');
    });
Route::prefix('agent')
    ->name('agent.')
    ->controller(RegisterController::class)->group(function () {
        Route::post('register', 'register')->name('register');
    });
