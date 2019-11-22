<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')
    ->get(
        '/user',
        function (Request $request) {
            return $request->user();
        }
    );

Route::group(
    [
        'prefix' => 'auth',
        'namespace' => 'Api',
    ],
    function () {
        Route::get(
            'test',
            function () {
                return response()->json(
                    [
                        'id' => 'test',
                        'name' => 'susant',
                    ]
                );
            }
        );
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
    }
);
Route::group(['namespace' => 'Api'], function () {
    Route::post('getNumbers', 'ApiController@getNumbers'); // for rajan api
    Route::post('getnumber', 'ApiController@getnumber'); // for susant api test
    // Route::get('getnumbers', function($params){
    //     return response()->json($params);
    // });
    Route::get('me', 'ApiController@me');
    Route::post('getCategories', 'ApiController@getCategories');
    Route::post('postNumbers', 'ApiController@postNumbers');
});

Route::get(
    'agentwisesale',
    'Api\ApiController@agentWiseSale'
);
