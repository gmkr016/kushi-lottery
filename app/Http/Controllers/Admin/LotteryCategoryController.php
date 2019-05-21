<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LotteryCategory;
use Illuminate\Http\Request;
use App\LotteryCategory as Cat;

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
        if($request->hasFile('image'))
        {

            //get the file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get just file name
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();


          //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

           //upload image

            $path = $request->file('image')
                ->storeAs('public/lottery_cat/', $fileNameToStore);
        } else {
            $fileNameToStore ="noimage.jpg";
        }
        $cat = new Cat();
        $cat->title = $request->title;
        $cat->draw_date = $request->draw_date;
        $cat->image = $fileNameToStore;

        if($cat->save()) {
            $lists = Cat::paginate(10);
            return redirect()->route('admin.categories.index')->with('lists',$lists);
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
    public function show(LotteryCategory $lotteryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LotteryCategory  $lotteryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $id )
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
        if ($request->hasFile('image') ) {
            //get the file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();


            //file name to store
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $fileNameToStore = time().'.'.$extension;


            //upload image
            $path = $request->file('image')
                ->storeAs('public/lottery_cat/', $fileNameToStore);

        }
        // return !empty($fileNameToStore) ? 'file uploaded' : 'no file';
        $cat = Cat::findorFail($id);
        $cat->title = $request->title;
        $cat->draw_date = $request->draw_date;
        if (!empty($fileNameToStore)) {
            $cat->image = $fileNameToStore ;
        }
        if ($cat->save()) {
            $msg = "Succeed";
        } else {
            $msg = "Failed";
        }
        $lists = Cat::paginate(10);
        return redirect()->route('admin.categories.index', ['cat'=>$cat, 'lists'=>$lists]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LotteryCategory  $lotteryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = Cat::findorFail($id)->delete();
        if ($action) {
            $lists = Cat::paginate(10);
            return redirect()->route('admin.categories.index', ['lists'=>$lists]);
        }
    }
}
