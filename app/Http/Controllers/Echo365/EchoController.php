<?php

namespace App\Http\Controllers\Echo365;

use App\Http\Controllers\Controller;
use App\Models\HomeAd;
use Illuminate\Http\Request;

class EchoController extends Controller
{
    public function index()
    {
        $home_ad_data = HomeAd::find(1);
        return view('echo365.pages.home', compact('home_ad_data'));
    }

    public function about()
    {
        return view('echo365.pages.about');
    }

    public function contact()
    {
        return view('echo365.pages.contact');
    }

}
