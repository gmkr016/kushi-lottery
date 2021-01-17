<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;

use App\LotteryCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = LotteryCategory::paginate(10);

        return view('admin.results.index')->with('lists', $lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $allFutureDraw = ApiController::getCurrentDraw();
        $allFutureDraw = ApiController::getAllFutureDraw();
        // return $allFutureDraw;
        return view('admin.results.create')->with(compact('allFutureDraw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getFormattedData($request)
    {
        $first_number = array();
        $second_number = array();
        $third_number = array();
        $fourth_number = array();
        $fifth_number = array();
        $collection = collect($request);
        foreach ($collection as $key=>$val) {
            if (Str::contains($key, '1_')) {
                array_push($first_number, $val);
            } elseif (Str::contains($key, '2_')) {
                array_push($second_number, $val);
            } elseif (Str::contains($key, '3_')) {
                array_push($third_number, $val);
            } elseif (Str::contains($key, '4_')) {
                array_push($fourth_number, $val);
            } elseif (Str::contains($key, '5_')) {
                array_push($fifth_number, $val);
            }
        }
        array_push($first_number, 'first', $request->category);
        array_push($second_number, 'second', $request->category);
        array_push($third_number, 'third', $request->category);
        array_push($fourth_number, 'fourth', $request->category);
        array_push($fifth_number, 'fifth', $request->category);
        return [$first_number, $second_number,$third_number, $fourth_number,$fifth_number ];
    }
    public function store(Request $request)
    {
        $totalData= $this->getFormattedData($request);
        if (count($totalData)>0) {
            foreach ($totalData as $data) {
                $result = new Result();
                $result->cat_id = $data[7];
                $result->winnerpos = $data[6];
                $result->first_number = $data[0];
                $result->second_number = $data[1];
                $result->third_number = $data[2];
                $result->fourth_number = $data[3];
                $result->fifth_number = $data[4];
                $result->sixth_number = $data[5];
                $result->save();
            }
        }
        return redirect()->route('admin.results.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }

    public function drawWiseResult($draw_id=null)
    {
        if ($draw_id !=null) {
            $results = LotteryCategory::find($draw_id)->results;
            // dump($results);
            return view('admin.results.drawwiseresult')->with(['results'=>$results, "draw_id"=>$draw_id]);
        }
        return null;
    }
}
