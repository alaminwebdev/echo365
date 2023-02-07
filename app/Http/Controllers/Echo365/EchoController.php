<?php

namespace App\Http\Controllers\Echo365;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EchoController extends Controller
{
    public function index()
    {
        return view('echo365.index');
    }
}
