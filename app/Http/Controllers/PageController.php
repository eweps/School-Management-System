<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        return view('pages/contact');
    }

    public function aboutUs()
    {
        return view('pages/about');
    }
}
