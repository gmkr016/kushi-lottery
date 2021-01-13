<?php

namespace App\Http\Controllers;

use App\LotteryCategory as Lcat;

class HomeController extends Controller
{
    public function index()
    {
        $lcat = Lcat::all();
        $title = "home";
        return view('frontend.index')->with(compact('title', 'lcat'));
    }

    public function about()
    {
        $title = "about";
        return view('frontend.about')->with('title', $title);
    }

    public function blog()
    {
        $title = "blog";
        return view('frontend.blog')->with('title', $title);
    }

    public function contact()
    {
        $title = "contact";
        return view('frontend.contact')->with('title', $title);
    }
    public function resultpage()
    {
        $title = 'results';
        return view('frontend.result')->with('title', $title);
    }

    public function faq()
    {
        $title = 'faq';
        return view('frontend.faq')->with('title', $title);
    }
}
