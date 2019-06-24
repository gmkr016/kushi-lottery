<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $title = "home";
        return view('frontend.index')->with('title', $title);
    }

    public function about()
    {
        $title = "about";
        return view('frontend.about')->with('title', $title);;
    }

    public function blog()
    {
        $title = "blog";
        return view('frontend.blog')->with('title', $title);;
    }

    public function contact()
    {
        $title = "contact";
        return view('frontend.contact')->with('title', $title);;
    }
}
