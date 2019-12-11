<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LotteryCategory;
use Illuminate\Http\Request;
use App\Models\Lottery as Lottery;
use Carbon\Carbon as Carbon;

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



    private function getDrawDate($lott_cat)
    {
        $draw_date = \App\LotteryCategory::find($lott_cat)->draw_date;
        return date('Y-m-d', $draw_date);
    }

    public function totalTicket()
    {
        return Lottery::count();
    }

    private function ticketIssued($recentlyAddedLottoId)
    {
        $issuDate = new Carbon(Lottery::find($recentlyAddedLottoId)->created_at);
        return $issuDate->toDateTimeString();
    }
    public function postNumbers(Request $request)
    {
        foreach ($request->lotteryNumbers as $index) {
            $lott = new Lottery();
            $lott->serial = auth('api')->id();
            $lott->cat_id = $index['categories'];
            $lott->u_id = auth('api')->id();
            $lott->first_number = $index['first'];
            $lott->second_number = $index['second'];
            $lott->third_number = $index['third'];
            $lott->fourth_number = $index['fourth'];
            $lott->fifth_number = $index['fifth'];
            $lott->sixth_number = $index['sixth'];
            if (response()->json($lott->save())) {

                $msg = [
                    "response" => response()->json('success', 201),
                    "numbers" => [
                        $index
                    ],
                    "serial_number" => $lott->id . auth()->id(),
                    "drawDate" => $this->getDrawDate($index['categories']),
                    "totalTicket" => $this->totalTicket(),
                    "created_at" => $this->ticketIssued($lott->id),

                ];
            } else {
                $msg = ["response" => response()->json('failed', 501)];
            }
        }
        return response()->json($msg);
    }

    /**
     * Get Username from user Id
     */
    public static function getUserName($id)
    {
        return \App\User::find($id)->name;
    }

    /**
     * Get drawname
     */
    public static function getDraw($cat_id)
    {
        return \App\LotteryCategory::find($cat_id)->title;
    }

    /**
     * Get user's location code
     * 
     * @param  user_id
     * @return location_code
     */
    public static function getDistrictLocation($u_id)
    {
        $city_id = \App\User::find($u_id)->location;
        return self::getDistrict($city_id);
    }

    public static function getProvinceLocation($u_id)
    {
        $city_id = \App\User::find($u_id)->location;
        return self::getProvince($city_id);
    }

    /**
     * Get districtname from city_id
     */
    public static function getDistrict($city_id)
    {
        $district_id = \App\City::find($city_id)->district_id;
        return \App\District::find($district_id)->district;
    }

    // private static function getDistrictName($district_id)
    // {
    //     return \App\District::find($district_id)->district;
    // }


    public static function getProvince($city_id)
    {
        $province_id = \App\City::find($city_id)->province_id;
        return \App\Province::find($province_id)->province;
        // return self::getProvinceName($district_id);
    }
    /** 
     * Get Current Draw Object
     * 
     * @return Current_Draw_object
     */
    public static function getCurrentDraw()
    {
        $nowUnix = \Carbon\Carbon::now()->timestamp;
        $currentDraw = \App\LotteryCategory::where('draw_date', '>', $nowUnix)
            ->orderBy('draw_date', 'desc')
            ->first();
        return $currentDraw;
    }


    public static function currentTotalEarning()
    {
        $currentDraw = self::getCurrentDraw();
        // return $currentDraw;
        $saleCount  = \App\Models\Lottery::where('cat_id', $currentDraw->id)->get();
        return count($saleCount) * 100;
    }

    public static function currentTotalEarningByUser()
    {
        $currentDraw = self::getCurrentDraw();
        $user = auth('api')->user();
        return $user->id;
        $ticketSold = \App\Models\Lottery::where('cat_id', $currentDraw->id)
            ->where('u_id', $user->id)
            ->get();
        return count($ticketSold);
    }

    public static function totalEarning()
    {
        $saleCount  = \App\Models\Lottery::count();
        return $saleCount * 100;
    }

    public function getCurrentSalesInfo()
    {
        $salesInfo['cu_totalTicketSold'] = self::currentTotalEarningByUser(); //ticket sales count of current draw of logged in user
        $salesInfo['cu_totalTicketRev'] = $salesInfo['cu_totalTicketSold'] * 100;
        $salesInfo['totalRev'] = self::totalEarning();
        $salesInfo['c_totalEarning'] = self::currentTotalEarning();
        return $salesInfo;
    }

    // $sales_data['totalTicket'] = $this->apiC->totalTicket();
    // $sales_data['currentTotalTicketByAgent'] = $this->apiC->currentTotalEarningByUser();
}
