<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get(
    'sb',
    function () {
        return view('admin.home');
    }
);
Route::get('/lottery', 'LotteryController@index');
Route::get('/', 'Admin\HomeController@index')->middleware('auth:admin');

Route::get('generate', 'LotteryController@generate');
Route::post('submit', 'LotteryController@submit');

Route::prefix('/admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(
        function () {
            Route::get('/home', 'HomeController@index')->name('home');
            Route::namespace('Auth')
                ->group(
                    function () {

                        //Login Routes
                        Route::get('/', 'LoginController@showLoginForm')->name('login');
                        Route::get('/login', 'LoginController@showLoginForm')->name('login');
                        Route::post('/login', 'LoginController@login');
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

Auth::routes();
