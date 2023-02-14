<?php

namespace App\Http\Controllers\Echo365;

use App\Http\Controllers\Controller;
use App\Models\HomeAd;
use App\Models\Post;
use App\Models\Ticker;
use Illuminate\Http\Request;

class EchoController extends Controller
{
    public function index()
    {
        $home_ad_data = HomeAd::find(1);
        $tickers = Ticker::findOrFail(1);
        $posts = Post::latest()->take($tickers->ticker_count)->get(['id', 'title',]);
        
        //dd($posts);
        return view('echo365.pages.home', compact('home_ad_data', 'tickers' , 'posts'));
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
