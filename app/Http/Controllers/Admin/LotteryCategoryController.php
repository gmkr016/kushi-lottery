<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LotteryCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LotteryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $lists = LotteryCategory::paginate(10);

        // return $lists;
        return view('admin.categories.cat-index')->with('lists', $lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.cat-insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse|string
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
            $fileNameToStore = Str::camel($request->title).'_'.time().'.'.$extension;

            //upload image
            if (! file_exists(asset("storage/lottery_cat/$fileNameToStore"))) {
                $path = $request->file('image')
                    ->storeAs('public/lottery_cat/', $fileNameToStore);
            }
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $cat = new Cat();
        $cat->title = Str::camel($request->get('title'));
        $cat->draw_date = strtotime($request->get('draw_date'));
        $cat->image = $fileNameToStore;
        $cat->est_prize = $request->get('est_prize');

        if ($cat->save()) {
            $lists = LotteryCategory::paginate(10);

            return redirect()->route('admin.categories.index')->with('lists', $lists);
        } else {
            return 'fail';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  null  $field
     * @return Response
     */
    public static function show($id, $field = null)
    {
        if (! isset($field)) {
            return LotteryCategory::findorFail($id);
            // return "Field is not set";
        } else {
            return LotteryCategory::findorFail($id, $field)->title;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(Request $request, $id)
    {
        $cat = LotteryCategory::findorFail($id);

        return view('admin.categories.cat-edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
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
            $fileNameToStore = Str::camel($request->title).'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('image')
                ->storeAs('public/lottery_cat/', $fileNameToStore);
        }
        // return !empty($fileNameToStore) ? 'file uploaded' : 'no file';
        $cat = LotteryCategory::findorFail($id);
        $cat->title = Str::camel($request->title);
        $cat->draw_date = strtotime($request->draw_date);
        $cat->est_prize = $request->get('est_prize');
        if (! empty($fileNameToStore)) {
            $cat->image = $fileNameToStore;
        }
        if ($cat->save()) {
            $msg = 'Succeed';
        } else {
            $msg = 'Failed';
        }
        $lists = LotteryCategory::paginate(10);

        return redirect()->route('admin.categories.index', ['cat' => $cat, 'lists' => $lists]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse|void
     */
    public function destroy($id)
    {
        $action = LotteryCategory::findorFail($id);
        if ($action->delete()) {
            Storage::delete('public/lottery_cat'.'/'.$action->image);
            $lists = LotteryCategory::paginate(10);

            return redirect()->route('admin.categories.index', ['lists' => $lists]);
        }
    }
}
