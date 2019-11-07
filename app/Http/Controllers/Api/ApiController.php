<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LotteryCategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getNumbers(Request $request)
    {
        return response()->json($request);
        if (empty($params)) {
            return response()->json('no params detected');
        } else {
            return response()->json($params);
        }
    }

    public function getNumber(Request $request)
    {
        if (empty($request)) {
            return response()->json('no params detected');
        } else {
            return response()->json($request->arr);
        }
    }
    public function me()
    {
        return response()->json(auth()->user());
    }

    // get categories list for api
    public function getCategories()
    {
        $cat = LotteryCategory::select('id', 'title')->get();
        return response()->json($cat);
    }

    // post data came from app
    public function postNumbers(Request $request)
    {

        $lotteryNumbers = '{
                            "lotteryNumber":[
                                {
                                    "categories":"1",
                                    "first":"42",
                                    "second":"45",
                                    "third":"8",
                                    "forth":"4",
                                    "fifth":"14",
                                    "sixth":"20"
                                },
                                {
                                "categories":"1",
                                    "first":"11",
                                    "second":"28",
                                    "third":"21",
                                    "forth":"13",
                                    "fifth":"29",
                                    "sixth":"23"
                                }
                            ],
                            "token":"token",
                            }';
        $lott = json_decode($lotteryNumbers);


        return response()->json($lott);
    }
}
