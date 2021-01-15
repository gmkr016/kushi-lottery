<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LotteryCategory;
use App\Models\Lottery as Lottery;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Utils\Helper\AesHelper;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ["except" => ['getSelectedNumbersByAgent','currentTotalEarning','getAllFutureDraw']]);
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

    public function totalTicket()
    {
        return Lottery::count();
    }

    private function ticketIssued($recentlyAddedLottoId)
    {
        $issuDate = new Carbon(Lottery::find($recentlyAddedLottoId)->created_at);
        return $issuDate->toDateTimeString();
    }

    private function getLastSerial()
    {
        return DB::table('lotteries')->latest('serial')->first()->serial;
    }
    public function postNumbers(Request $request)
    {
        $newSerial = ($this->getLastSerial()) + 1;
        foreach ($request->lotteryNumbers as $index) {
            $lott = new Lottery();
            $lott->serial = $newSerial;
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
                        $index,
                    ],
                    "serial_number" => $newSerial,
                    "drawDate" => $this->getDrawDate($index['categories']),
                    "totalTicket" => $this->totalTicket(),
                    "created_at" => $this->ticketIssued($lott->id),
                    "encrypted_key" => $this->encrypted($newSerial . '' . $this->getDrawDate($index['categories']) . '' . $this->ticketIssued($lott->id), 'encrypt', "256")

                ];
            } else {
                $msg = ["response" => response()->json('failed', 501)];
            }
        }
        return response()->json($msg);
    }

    /**
     * encrypt lottery data
     */
    public function encrypted($data = null, $key = null, $blockSize = null)
    {
        $aes = new AesHelper($data, $key, $blockSize);
        return $aes->encrypt();
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

    private function getDrawDate($lott_cat)
    {
        $draw_date = \App\LotteryCategory::find($lott_cat)->draw_date;
        return date('Y-m-d', $draw_date);
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
    public static function getAllFutureDraw()
    {
        $nowUnix = \Carbon\Carbon::now()->timestamp;
        $futureDraws =  \App\LotteryCategory::where('draw_date', '>', $nowUnix)->orderBy('draw_date', 'asc')->get();
        if ($futureDraws->count() > 0) {
            return $futureDraws;
        }
        return false;
    }
    public static function getCurrentDraw()
    {
        $nowUnix = \Carbon\Carbon::now()->timestamp;
        return \App\LotteryCategory::where('draw_date', '>', $nowUnix)
            ->orderBy('draw_date', 'asc')
            ->first();
    }

    public static function currentTotalEarning()
    {
        $currentDraw = self::getCurrentDraw();
        $saleCount = null;
        if ($currentDraw != null) {
            $saleCount = \App\Models\Lottery::where('cat_id', $currentDraw->id)->get();
            return count($saleCount) * 100;
        }
        return $saleCount;
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
        $saleCount = \App\Models\Lottery::count();
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

    public function getSelectedNumbersByAgent(Request $request)
    {
        $getData = Lottery::where(
            [
                ['u_id', '=', $request->user_id],
                ['cat_id', '=', $request->draw_id],
                ['serial', '=', $request->serial],

            ]
        )->get();
        $getData['draw_date'] = $this->getDrawDate($request->draw_id);
        return response()->json($getData);
    }

    public static function getDrawWiseSale()
    {
        $lott = Lottery::all();
        $draw = array();
        foreach ($lott as $l) {
            array_push($draw, self::getDraw($l->cat_id));
        }
        $acv = array_count_values($draw);
        $na = array();
        foreach ($acv as $key => $value) {
            array_push($na, ["draw" => $key, "ticketCount" => $value]);
        }
        return $na;
    }
}
