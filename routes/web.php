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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');

// Route::get();

// Route::get('/lottery', 'LotteryController@index');
// Route::get('/', 'Admin\HomeController@index')->middleware('auth:admin');
// Route::get('/',

Route::prefix('/user')
    ->name('user.')
    ->namespace('User')
    ->group(
        function () {
            // Route::get('/home', 'HomeController@index')->name('home');
            //using user auth
            Route::get('/', 'DashboardController@index')->name('home');
            Route::get('/home', 'DashboardController@index')->name('home');
            Route::get('/lottery', 'LotteryController@index')->name('lotteryindex');
            Route::get('/lotterylists', 'LotteryController@lists')->name('lotterylists');
            Route::get('generate', 'LotteryController@generate');
            Route::post('submit', 'LotteryController@submit');
            Route::delete('delete/{id}', 'LotteryController@destroy');

            Route::resource('profile', 'ProfileController');

            Route::namespace ('Auth')
                ->group(
                    function () {

                        //Login Routes
                        // Route::get('/', 'LoginController@showLoginForm')->name('login');
                        // Route::get('/login', 'LoginController@showLoginForm')->name('login');
                        // Route::post('/login', 'LoginController@login');
                        // Route::post('/logout', 'LoginController@logout')->name('logout');
                        //Forgot Password Routes
                        // Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
                        // Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
                        // //Reset Password Routes
                        // Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
                        // Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
                    }
                );
        }
    );

//admin group routes
Route::prefix('/admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(
        function () {

            Route::get('/home', 'HomeController@index')->name('home');
            Route::resource('categories', 'LotteryCategoryController');
            Route::get('recenthistory/{id}', 'HistoryController@recent');
            Route::get('archivehistory/{id}', 'HistoryController@archive');
            Route::get('userhistory/{id}', 'HistoryController@userHistory');

            //using admin auth

            Route::namespace ('Auth')
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
