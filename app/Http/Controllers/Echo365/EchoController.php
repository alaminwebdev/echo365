<?php

namespace App\Http\Controllers\Echo365;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EchoController extends Controller
{
    public function index()
    {
        return view('echo365.pages.home');
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
