<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Controller;
use \App\LotteryCategory as LottCat;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.home.home')->with('title', 'This is Admin Dashboard');
    }
}
