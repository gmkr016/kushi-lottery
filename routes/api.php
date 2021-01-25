<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        $data = [];
        foreach ($lott as $l) {
            array_push($data, ApiController::getUserName($l->u_id));
        }
        $acv = array_count_values($data);
        $na = [];
        foreach ($acv as $key => $value) {
            array_push($na, ['agent' => $key, 'ticketCount' => $value]);
        }

        return $na;
    }
);

Route::get(
    'districtwisesale',
    function () {
        $lott = \App\Models\Lottery::all();
        $district = [];
        foreach ($lott as $l) {
            $district[] = ApiController::getDistrictLocation($l->u_id);
        }
        $acv = array_count_values($district);
        $na = [];
        foreach ($acv as $key => $value) {
            $na[] = ['district' => $key, 'ticketCount' => $value];
        }

        return $na;
    }
);

Route::get(
    'provincewisesale',
    function () {
        $lott = \App\Models\Lottery::all();
        $province = [];
        foreach ($lott as $l) {
            $province[] = ApiController::getProvinceLocation($l->u_id);
        }
        $acv = array_count_values($province);
        $na = [];
        foreach ($acv as $key => $value) {
            $na[] = ['province' => $key, 'ticketCount' => $value];
        }

        return $na;
    }
);
