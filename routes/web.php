<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Enum;
use Modules\Game\Enums\EnumIdentificationType;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/resultpage', 'HomeController@resultpage')->name('resultpage');
Route::get('/faq', 'HomeController@faq')->name('faq');

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

            Route::get('pracJson', 'LotteryController@pracJson');

            Route::resource('profile', 'ProfileController');

            Route::namespace('Auth')
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
    ->middleware('auth:admin')
    ->group(
        function () {
            Route::get('/home', 'HomeController@index')->name('home');
            Route::resource('games', 'GameController');
            Route::resource('agents', 'AgentController');
            Route::resource('tickets', 'TicketController');
            Route::resource('results', 'ResultController');
            Route::get('recenthistory/{id}', 'HistoryController@recent');
            Route::get('archivehistory/{id}', 'HistoryController@archive');
            Route::get('userhistory/{id}', 'HistoryController@userHistory');
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
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
    });

Auth::routes();

// Route::get('provincedb', function () {
//     if (($handle = fopen(public_path() . '/province.csv', 'r')) !== FALSE) {
//         while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
//             $province_data = new \App\Province();
//             $province_data->id = $data[0];
//             $province_data->province = $data[1];
//             $province_data->save();
//         }
//         fclose($handle);
//         return response()->json('Data Submitted');
//     }
// });

// Route::get('districtdb', function () {
//     if (($handle = fopen(public_path() . '/district.csv', 'r')) !== FALSE) {
//         $i = 0;
//         while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
//             $district_data = new \App\District();
//             $district_data->id = $data[0];
//             $district_data->district = $data[1];
//             $district_data->province_id = $data[2];
//             $district_data->save();
//         }
//         fclose($handle);
//         return response()->json('Data Submitted');
//     }
// });

// Route::get('citydb', function () {
//     if (($handle = fopen(public_path() . '/city.csv', 'r')) !== FALSE) {
//         $i = 0;
//         while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
//             $city_data = new \App\City();
//             $city_data->id = $data[0];
//             $city_data->city = $data[1];
//             $city_data->district_id = $data[2];
//             $city_data->province_id = $data[3];
//             $city_data->save();
//         }
//         fclose($handle);
//         return response()->json('Data Submitted');
//     }
// });
