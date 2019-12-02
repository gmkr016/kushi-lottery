<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LotteryCategory;
use Illuminate\Http\Request;
use App\Models\Lottery as Lottery;

class ApiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
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

    private function genSerial($num)
    {
        return;
    }
    // post data came from app
    public function postNumbers(Request $request)
    {

        //         $demoData = '[
        //     {
        //         "categories": "1",
        //         "first": "10",
        //         "second": "24",
        //         "third": "33",
        //         "fourth": "47",
        //         "fifth": "33",
        //         "sixth": "65"
        //     },
        //     {
        //         "categories": "1",
        //         "first": "36",
        //         "second": "47",
        //         "third": "14",
        //         "fourth": "52",
        //         "fifth": "44",
        //         "sixth": "33"
        //     }
        // ]';
        // return $request->lotteryNumbers;
        // return auth()->id();
        foreach ($request->lotteryNumbers as $index) {
            // return response()->json($index);
            $lott = new Lottery();
            $lott->serial = auth()->id();
            $lott->cat_id = $index['categories'];
            $lott->u_id = auth()->id();
            $lott->first_number = $index['first'];
            $lott->second_number = $index['second'];
            $lott->third_number = $index['third'];
            $lott->fourth_number = $index['fourth'];
            $lott->fifth_number = $index['fifth'];
            $lott->sixth_number = $index['sixth'];
            if (response()->json($lott->save())) {

                $index['serial_number'] = $lott->id . auth()->id();
                $msg = [
                    "response" => response()->json('success', 201),
                    "numbers" => [
                        $index
                    ],
                ];
            } else {
                $msg = ["response" => response()->json('failed', 501)];
            }
        }
        return response()->json($msg);
    }

    public function getUserName($id)
    {
        return \App\User::find($id)->name;
    }

    public function agentWiseSale()
    {
        $lott = \App\Models\Lottery::all();
        $data = [];
        foreach ($lott as $l) {
            array_push($data, $this->getUserName($l->u_id));
        }
        $acv = array_count_values($data);
        $na = [];
        foreach ($acv as $key => $value) {
            array_push($na, ["agent" => $key, "ticketCount" => $value]);
        }
        return $na;
    }
}
