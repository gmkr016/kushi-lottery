<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Lottery;

use App\Http\Requests\ConfirmLottery;

class LotteryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $numbers = config('lottery.numbers');

        return view('user.generatelottery', compact('numbers'));

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
        $fifth = $this->_generateNumber($numbers, [$first, $second, $third, $fourth ]);
        //6th number
        $sixth = $this->_generateNumber($numbers, [$first, $second, $third, $fourth, $fifth ]);



        $data = compact('first', 'second', 'third', 'fourth', 'fifth', 'sixth');

        $input = [ $first, $second, $third, $fourth, $fifth, $sixth ];
        $result = Lottery::validateNumbers($input)->first();
        // if there's already sequence recreate from top
        if (!empty($result)) {
            $data = $this->_generateThreeNumbers();
        }

        return $data;
    }

    private function _generateNumber($limit, $comparison = [])
    {
        $generatedNumber = rand($limit['min'], $limit['max']);
        ;

        // if generated number already exists regenerate
        if (in_array($generatedNumber, $comparison)) {
            $generatedNumber = $this->_generateNumber($limit, $comparison);
        }

        return $generatedNumber;
    }

    public function submit(ConfirmLottery $request)
    {
        $lottery = new Lottery;
        $lottery->first_number = $request->first;
        $lottery->second_number = $request->second;
        $lottery->third_number = $request->third;
        $lottery->fourth_number = $request->fourth;
        $lottery->fifth_number = $request->fifth;
        $lottery->sixth_number = $request->sixth;

        $lottery->save();

        $message = trans('lottery.success.saved');
        return compact('message');
    }
}
