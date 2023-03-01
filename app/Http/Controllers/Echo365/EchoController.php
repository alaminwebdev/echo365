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
        $posts = Post::latest()->take($tickers->ticker_count)->get(['id', 'title']);
        $featured_post = Post::latest()->take(3)->get(['id','title','image','detail']);
        //dd($featured_post);
        return view('echo365.pages.home', compact('home_ad_data', 'tickers', 'posts','featured_post'));
    }

    public function post($id)
    {
        $post = Post::with(
            'rSubCategory:id,subcategory_name',
            'rAdmin:id,name',
            'rAuthor:id,name',
            'rTag:id,tag,post_id'
        )->findOrFail($id);

        //dd($post);

        // increments views by 1
        $post->increment('visitors');
        $post->update();

        return view('echo365.pages.post', compact('post'));
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
