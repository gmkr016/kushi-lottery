<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LotteryCategory;
use App\LotteryCategory as Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LotteryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $lists = Cat::paginate(10);
        // return $lists;
        return view('admin.categories.cat-index')->with('lists', $lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.cat-insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {

            //get the file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = Str::camel($request->title) . '_' . time() . '.' . $extension;

            //upload image
            if (!file_exists(asset("storage/lottery_cat/$fileNameToStore"))) {
                $path = $request->file('image')
                    ->storeAs('public/lottery_cat/', $fileNameToStore);
            }
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $cat = new Cat();
        $cat->title = Str::camel($request->title);
        $cat->draw_date = strtotime($request->draw_date);
        $cat->image = $fileNameToStore;

        if ($cat->save()) {
            $lists = Cat::paginate(10);
            return redirect()->route('admin.categories.index')->with('lists', $lists);
        } else {
            return "fail";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\LotteryCategory  $lotteryCategory
     * @return \Illuminate\Http\Response
     */
    public static function show($id, $field = null)
    {
        if (!isset($field)) {
            return LotteryCategory::findorFail($id);
            // return "Field is not set";
        } else {
            return LotteryCategory::findorFail($id, $field)->title;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LotteryCategory  $lotteryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $cat = Cat::findorFail($id);
        return view('admin.categories.cat-edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LotteryCategory  $lotteryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            //get the file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //file name to store
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $fileNameToStore = Str::camel($request->title) . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('image')
                ->storeAs('public/lottery_cat/', $fileNameToStore);
        }
        // return !empty($fileNameToStore) ? 'file uploaded' : 'no file';
        $cat = Cat::findorFail($id);
        $cat->title = Str::camel($request->title);
        $cat->draw_date = strtotime($request->draw_date);
        if (!empty($fileNameToStore)) {
            $cat->image = $fileNameToStore;
        }
        if ($cat->save()) {
            $msg = "Succeed";
        } else {
            $msg = "Failed";
        }
        $lists = Cat::paginate(10);
        return redirect()->route('admin.categories.index', ['cat' => $cat, 'lists' => $lists]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LotteryCategory  $lotteryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = Cat::findorFail($id);
        if ($action->delete()) {
            Storage::delete('public/lottery_cat' . '/' . $action->image);
            $lists = Cat::paginate(10);
            return redirect()->route('admin.categories.index', ['lists' => $lists]);
        }
    }
}
