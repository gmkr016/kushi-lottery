<?php

use App\Events\TicketSold;
use Illuminate\Http\Request;
use \App\Http\Controllers\Api\ApiController;

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
    Route::get('getcurrentdraw', 'Apicontroller@getCurrentDraw');
    Route::get('getcurrentsalesinfo', 'ApiController@getCurrentSalesInfo');
    Route::get('getcategories', 'ApiController@getCategories');
    Route::post('postNumbers', 'ApiController@postNumbers');
    Route::get('getselectednumbersbyagent', 'ApiController@getSelectedNumbersByAgent');
    Route::get(
        'drawwisesale',
        'ApiController@getDrawWiseSale'
    );

    // Route::get('currentTotalEarning', 'ApiController@currentTotalEarning');
});

Route::get(
    'agentwisesale',
    function () {
        $lott = \App\Models\Lottery::all();
        $data = array();
        foreach ($lott as $l) {
            array_push($data, ApiController::getUserName($l->u_id));
        }
        $acv = array_count_values($data);
        $na = array();
        foreach ($acv as $key => $value) {
            array_push($na, ["agent" => $key, "ticketCount" => $value]);
        }
        return $na;
    }
);

Route::get(
    'districtwisesale',
    function () {
        $lott = \App\Models\Lottery::all();
        $district = array();
        foreach ($lott as $l) {
            array_push($district, ApiController::getDistrictLocation($l->u_id));
        }
        $acv = array_count_values($district);
        $na = array();
        foreach ($acv as $key => $value) {
            array_push($na, ["district" => $key, "ticketCount" => $value]);
        }
        return $na;
    }
);

Route::get(
    'provincewisesale',
    function () {
        $lott = \App\Models\Lottery::all();
        $province = array();
        foreach ($lott as $l) {
            array_push($province, ApiController::getProvinceLocation($l->u_id));
        }
        $acv = array_count_values($province);
        $na = array();
        foreach ($acv as $key => $value) {
            array_push($na, ["province" => $key, "ticketCount" => $value]);
        }
        return $na;
    }
);

Route::get('stest', function () {
    return TicketSold::dispatch(6);
});
