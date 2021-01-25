<?php

namespace App\Http\Controllers\Api;

use App\DTO\LotteryData;
use App\DTO\ResponseData;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Lottery as Lottery;
use App\Models\LotteryCategory;
use App\Models\User;
use Carbon\Carbon as Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Utils\Helper\AesHelper;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getSelectedNumbersByAgent', 'currentTotalEarning', 'getAllFutureDraw']]);
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

    /**
     * Get Categories/Game Week
     *
     * @response {
     *
     * }
     *
     * @return JsonResponse
     */
    public function getCategories()
    {
        $cat = LotteryCategory::select('id', 'title')->get();

        return response()->success(['categories' => $cat]);
    }

    public function totalTicket()
    {
        return response()->success(['count' => Lottery::query()->count()]);
    }

    private function ticketIssued($recentlyAddedLottoId)
    {
        $issueDate = new Carbon(Lottery::find($recentlyAddedLottoId)->created_at);

        return response()->success(['issueDate' => $issueDate->toDateTimeString()]);
    }

    private function getLastSerial()
    {
        $serial = DB::table('lotteries')->latest('serial')->first()->serial;

        return response()->success(['serial' => $serial]);
    }

    public function postNumberss(Request $request)
    {
        $newSerial = ($this->getLastSerial()) + 1;
        foreach ($request->get('lotteryNumbers') as $index) {
            $lotteryData = LotteryData::from([
                'serial' => $newSerial,
                'cat_id' => $index['categories'],
                'u_id' => auth('api')->id(),
                'first_number' => $index['first'],
                'second_number' => $index['second'],
                'third_number' => $index['third'],
                'fourth_number' => $index['fourth'],
                'fifth_number' => $index['fifth'],
                'sixth_number' => $index['sixth'],
            ]);
            $lott = Lottery::query()->create($lotteryData->toArray());
            if ($lott->count()) {
                $msg = [
                    'numbers' => [
                        $index,
                    ],
                    'serial_number' => $newSerial,
                    'drawDate' => $this->getDrawDate($index['categories']),
                    'totalTicket' => $this->totalTicket(),
                    'created_at' => $lott['created_at'],
                    'encrypted_key' => $this->encrypted($newSerial.''.$this->getDrawDate($index['categories']).''.$this->ticketIssued($lott->id), 'encrypt', '256'),

                ];

                return new ResponseData(data: $msg);
            }
        }
        $msg = ['response' => response()->json('failed', 501)];

        return new ResponseData(data: 'failed', code: 501);
    }

    /**
     * Create Lottery
     *
     * @bodyParam lotteryNumbers array required
     *
     * @response {
     *     "status":200
     * }
     *
     * @authenticated
     *
     * @throws Exception
     */
    public function postNumbers(Request $request): JsonResponse|ResponseData
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
                    'response' => response()->json('success', 201),
                    'numbers' => [
                        $index,
                    ],
                    'serial_number' => $newSerial,
                    'drawDate' => $this->getDrawDate($index['categories']),
                    'totalTicket' => $this->totalTicket(),
                    'created_at' => $this->ticketIssued($lott->id),
                    'encrypted_key' => $this->encrypted($newSerial.''.$this->getDrawDate($index['categories']).''.$this->ticketIssued($lott->id), 'encrypt', '256'),

                ];
            } else {
                $msg = ['response' => response()->json('failed', 501)];
            }
        }

        return response()->json($msg);
    }

    /**
     * encrypt lottery data
     *
     * @throws Exception
     */
    public function encrypted($data = null, $key = null, $blockSize = null): string
    {
        $aes = new AesHelper($data, $key, $blockSize);

        return $aes->encrypt();
    }

    /**
     * Get Username from user Id
     */
    public static function getUserName($id)
    {
        return User::find($id)->name;
    }

    /**
     * Get drawname
     */
    public static function getDraw($cat_id)
    {
        return LotteryCategory::find($cat_id)->title;
    }

    private function getDrawDate($lott_cat): string
    {
        $draw_date = LotteryCategory::find($lott_cat)->draw_date;

        return date('Y-m-d', $draw_date);
    }

    public static function getDistrictLocation($u_id)
    {
        $city_id = User::find($u_id)->location;

        return self::getDistrict($city_id);
    }

    public static function getProvinceLocation($u_id)
    {
        $city_id = User::find($u_id)->location;

        return self::getProvince($city_id);
    }

    /**
     * Get districtname from city_id
     */
    public static function getDistrict($city_id)
    {
        $district_id = City::find($city_id)->district_id;

        return District::find($district_id)->district;
    }

    // private static function getDistrictName($district_id)
    // {
    //     return \App\District::find($district_id)->district;
    // }

    public static function getProvince($city_id)
    {
        $province_id = City::find($city_id)->province_id;

        return \App\Models\Province::find($province_id)->province;
        // return self::getProvinceName($district_id);
    }

    /**
     * Get Current Draw Object
     *
     * @return false
     */
    public static function getAllFutureDraw()
    {
        $nowUnix = \Carbon\Carbon::now()->timestamp;
        $futureDraws = LotteryCategory::where('draw_date', '>', $nowUnix)->orderBy('draw_date', 'asc')->get();
        if ($futureDraws->count() > 0) {
            return $futureDraws;
        }

        return false;
    }

    public static function getCurrentDraw()
    {
        $nowUnix = \Carbon\Carbon::now()->timestamp;

        return LotteryCategory::where('draw_date', '>', $nowUnix)
            ->orderBy('draw_date', 'asc')
            ->first();
    }

    public static function currentTotalEarning()
    {
        $currentDraw = self::getCurrentDraw();
        $saleCount = null;
        if ($currentDraw != null) {
            $saleCount = Lottery::where('cat_id', $currentDraw->id)->get();

            return count($saleCount) * 100;
        }

        return $saleCount;
    }

    public static function currentTotalEarningByUser()
    {
        $currentDraw = self::getCurrentDraw();
        $user = auth('api')->user();

        return $user->id;
        $ticketSold = Lottery::where('cat_id', $currentDraw->id)
            ->where('u_id', $user->id)
            ->get();

        return count($ticketSold);
    }

    public static function totalEarning()
    {
        $saleCount = Lottery::count();

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
        $draw = [];
        foreach ($lott as $l) {
            array_push($draw, self::getDraw($l->cat_id));
        }
        $acv = array_count_values($draw);
        $na = [];
        foreach ($acv as $key => $value) {
            array_push($na, ['draw' => $key, 'ticketCount' => $value]);
        }

        return $na;
    }
}
