<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Controllers\Api\ApiController as ApiController;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.profile.addprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = $request->input('address');
        $phone = $request->input('phone');
        $dob = $request->input('dob');

        if ($request->hasFile('image')) {

            //get the file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();


            //file name to store
            $fileNameToStore = Str::kebab(Auth::user()->name) . '_' . time() . '.' . $extension;

            //upload image

            $path = $request->file('image')->storeAs('public/profiles', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }

        $profile = new \App\UserDetail();
        $profile->u_id = Auth::id();
        $profile->address = $address;
        $profile->phone = $phone;
        $profile->dob = $dob;
        $profile->image = $fileNameToStore;
        if ($profile->save()) {
            return "True";
        } else {
            return "False";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Auth::User();
        $district = ApiController::getDistrictLocation($profile->location);
        $province = ApiController::getProvinceLocation($profile->location);
        return view('user.profile.showprofile',compact('profile','district','province'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
