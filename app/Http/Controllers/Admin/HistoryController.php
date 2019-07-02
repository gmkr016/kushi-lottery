<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lottery as Lottery;

class HistoryController extends Controller
{

    public function recent($id) //parameter $id of category

    {
        $lc = Lottery::where('cat_id', '=', $id)->get(); // 9 items
        $cat = \App\LotteryCategory::findorFail($id);
        // return $draw_date;
        // return $lc;
        if (count($lc) > 0) {
            $user = \App\User::all();
            $count = array();

            // return $user;
            foreach ($lc as $l) {
                array_push($count, $l->u_id);
            }
            $lc = array_count_values($count);
            // return $user;
            // return $lc;
            return view('admin.history.history')->with(compact('lc', 'user', 'cat'));
        } else {
            return view('admin.history.history')->with('msg', 'No Data to show');
        }
    }

    public function archive($id) //parameter $id of category

    {
        $lc = Lottery::where('cat_id', '=', $id)->get(); // 9 items
        if (count($lc) > 0) {
            $user = \App\User::all();
            $count = array();

            // return $user;
            foreach ($lc as $l) {
                array_push($count, $l->u_id);
            }
            $lc = array_count_values($count);
            // return $user;
            // return $lc;
            return view('admin.history.history')->with(compact('lc', 'user'));
        } else {
            return view('admin.history.history')->with('msg', 'No Data to show');
        }

    }

    public static function getUname($id)
    {
        return \App\User::find($id)->name;
    }

    public static function getDrawdate($id)
    {
        return \App\LotteryCategory::find($id)->draw_date;
    }
}
