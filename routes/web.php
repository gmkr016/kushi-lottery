<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Game\Models\Game;
use Modules\Game\Models\Ticket;
use Modules\Game\Services\TicketService;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/resultpage', 'HomeController@resultpage')->name('resultpage');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/view/{ticket}/ticket', 'HomeController@viewTicket');

Route::prefix('/user')
    ->name('user.')
    ->namespace('User')
    ->group(
        function () {
            Route::get('/home', 'DashboardController@index')->name('home');
            Route::get('/lottery', 'LotteryController@index')->name('lotteryindex');
            Route::get('/lotterylists', 'LotteryController@lists')->name('lotterylists');
            Route::get('generate', 'LotteryController@generate');
            Route::post('submit', 'LotteryController@submit');
            Route::delete('delete/{id}', 'LotteryController@destroy');

            Route::get('pracJson', 'LotteryController@pracJson');

            Route::resource('profile', 'ProfileController');
        }
    );

//admin group routes
Route::prefix('/admin')
    ->name('admin.')
    ->namespace('Admin')
    ->middleware('auth:admin')
    ->group(
        function () {
            Route::get('/home', 'HomeController@index')->name('home');
            Route::resource('games', 'GameController');
            Route::resource('agents', 'AgentController');
            Route::resource('tickets', 'TicketController');
            Route::resource('results', 'ResultController');
            Route::get('agentsale', 'ChartController@agentWiseSale')->name('agentwisesale');
            Route::get('districtsale', 'ChartController@districtWiseSale')->name('districtwisesale');
            Route::get('provincesale', 'ChartController@provinceWiseSale')->name('provincewisesale');
            Route::get('drawsale', 'ChartController@drawWiseSale')->name('drawwisesale');

            //using admin auth

            Route::namespace('Auth')
                ->group(
                    function () {
                        //Login Routes

                        Route::post('/logout', 'LoginController@logout')->name('logout');
                        //Forgot Password Routes
                        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
                        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
                        //Reset Password Routes
                        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
                        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
                    }
                );
        }
    );
Route::prefix('/admin')
    ->name('admin.')
    ->namespace('Admin\\Auth')
    ->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
    });

Route::get('test', function () {
    try {
        $gameService = new \Modules\Game\Services\GameService();
        $lotteryNumberService = new \Modules\Game\Services\LotteryNumberService();
        $ticketService = new TicketService((new Ticket()), $lotteryNumberService);
        $statService = new \Modules\Statistics\Services\StatisticService($gameService, $ticketService);
        return $statService->grossSale();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
});

Auth::routes();
