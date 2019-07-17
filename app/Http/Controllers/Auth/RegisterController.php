<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return $data;
        return Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'pan' => 'required|numeric|min:10|',
                'cname' => 'required',
                'location' => 'required',
                'contact' => 'required|numeric|min:10',
                'photo' => 'required|image'
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return $data;
        return User::create(
            [
                'pan' => $data['pan'],
                'cname' => $data['cname'],
                'location' => $data['location'],
                'contact' => $data['contact'],
                'wallet' => $data['wallet'],
                'photo' => $data['photo'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );
    }

    public function register(Request $request)
    {
        // return $request->all();
        $this->validator(
            [
                '_token' => $request->_token,
                'pan' => $request->pan,
                'cname' => $request->cname,
                'location' => $request->location,
                'contact' => $request->contact,
                'wallet' => $request->wallet,
                'photo' => $request->photo,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ]
        )->validate();
        if ($request->hasFile('photo')) {

            //get the file name with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();


            //file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //upload photo

            $path = $request->file('photo')->storeAs('public/profiles', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        event(
            new Registered(
                $user = $this
                    ->create(
                        [
                            'pan' => $request->pan,
                            'cname' => $request->cname,
                            'location' => $request->location,
                            'contact' => $request->contact,
                            'wallet' => $request->wallet,
                            'photo' => $fileNameToStore,
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => $request->password
                        ]
                    )
            )
        );

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
