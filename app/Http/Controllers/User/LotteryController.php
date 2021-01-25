<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Lottery as Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LotteryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function lott_count($cat_id)
    {
        $list = Lottery::where('cat_id', '=', $cat_id)->get();

        // return "yes";
        return $list->count();
    }

    public function index()
    {
        $numbers = config('lottery.numbers');
        $cat = \App\Models\LotteryCategory::all();

        return view('user.generatelottery', compact('numbers', 'cat'));

        // return view('lottery', compact('numbers'));
    }

    public function generate()
    {
        $data = $this->_generateThreeNumbers();

        return $data;
    }

    private function _generateThreeNumbers()
    {
        // fetch all lottery from sql
        $numbers = config('lottery.numbers');
        // 1st number
        $first = $this->_generateNumber($numbers);
        // 2nd number
        $second = $this->_generateNumber($numbers, [$first]);
        // 3rd number
        $third = $this->_generateNumber($numbers, [$first, $second]);
        //4th number
        $fourth = $this->_generateNumber($numbers, [$first, $second, $third]);
        //5th number
        $fifth = $this->_generateNumber($numbers, [$first, $second, $third, $fourth]);
        //6th number
        $sixth = $this->_generateNumber($numbers, [$first, $second, $third, $fourth, $fifth]);

        $data = compact('first', 'second', 'third', 'fourth', 'fifth', 'sixth');

        $input = [$first, $second, $third, $fourth, $fifth, $sixth];
        $result = Lottery::validateNumbers($input)->first();
        // if there's already sequence recreate from top
        if (! empty($result)) {
            $data = $this->_generateThreeNumbers();
        }

        return $data;
    }

    private function _generateNumber($limit, $comparison = [])
    {
        $generatedNumber = rand($limit['min'], $limit['max']);

        // if generated number already exists regenerate
        if (in_array($generatedNumber, $comparison)) {
            $generatedNumber = $this->_generateNumber($limit, $comparison);
        }

        return $generatedNumber;
    }

    // public function submit(ConfirmLottery $request)
    public function submit(Request $request)
    {
        $message = [];
        if (Auth::check()) {
            $lottery = new Lottery;
            $lottery->cat_id = $request->lott_cat;
            $lottery->u_id = Auth::user()->id;
            $lottery->serial = Str::uuid();
            $lottery->first_number = $request->first;
            $lottery->second_number = $request->second;
            $lottery->third_number = $request->third;
            $lottery->fourth_number = $request->fourth;
            $lottery->fifth_number = $request->fifth;
            $lottery->sixth_number = $request->sixth;

            $resdata = [
                $request->first,
                $request->second,
                $request->third,
                $request->fourth,
                $request->fifth,
                $request->sixth,
            ];
            if ($lottery->save()) {
                $currentDraw = ApiController::getCurrentDraw();
                $drawWiseSale = ApiController::getDrawWiseSale();
                var_dump($drawWiseSale);
                // if ($drawWiseSale->has($currentDraw->title)) {
                //     array_push($message, "true");
                // }
                // $message = trans('lottery.success.saved');
                $message = response()->json(['msg' => $resdata]);
            } else {
                array_push($message, 'Operation Failed');
            }
        } else {
            array_push($message, 'you are not logged in');
        }

        return compact('message');
    }

    public function lists()
    {
        $lists = Lottery::orderBy('id', 'desc')->paginate(10);

        return view('user.lotterylists', compact('lists'));
    }

    public function destroy($id)
    {
        $action = Lottery::findorFail($id)->delete();
        if ($action) {
            return $this->lists();
        }
    }

    public function pracJson()
    {
        $lotteryNumbers = '{
                                "first": {
                                    "1": "1",
                                    "2": "2",
                                    "3": "3",
                                    "4": "4",
                                    "5": "5",
                                    "6": "6"
                                },
                                "second": {
                                    "1": "6",
                                    "2": "2",
                                    "3": "3",
                                    "4": "4",
                                    "5": "5",
                                    "6": "6"
                                },
                                "third": {
                                    "1": "1",
                                    "2": "2",
                                    "3": "3",
                                    "4": "4",
                                    "5": "5",
                                    "6": "6"
                                }
                            }';
        $lott = json_decode($lotteryNumbers);

        return $lott->toArray();
    }
}
