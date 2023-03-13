<?php

namespace App\Http\Controllers\Echo365;

use App\Http\Controllers\Controller;
use App\Mail\WebMail;
use App\Models\Admin;
use App\Models\HomeAd;
use App\Models\Photo;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Ticker;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class EchoController extends Controller
{
    public function index()
    {
        $home_ad_data = HomeAd::find(1);
        $tickers = Ticker::findOrFail(1);
        $posts = Post::latest()->take($tickers->ticker_count)->get(['id', 'title']);

        $latest_post = Post::with('rSubCategory:id,subcategory_name')
            ->latest()
            ->take(5)
            ->get(['id', 'title', 'created_at', 'detail', 'image', 'subcategory_id']);
        //dd($latest_post);

        $featured_post = Post::with('rSubCategory:id,subcategory_name')
            ->where('is_featured', 1)
            ->latest()
            ->get(['id', 'title', 'created_at', 'image', 'subcategory_id']);
        //dd($featured_post);


        // $subcategoris = SubCategory::with(['rPost'=> function($query){
        //     $query->latest()->get(['id','title','image','subcategory_id']);
        // }])
        // ->where('subcategory_show', 'show')
        // ->get(['id','subcategory_name']);

        $carboonDate = new Carbon();
        $now = $carboonDate->now();
        $nowToLastThreeDays = $carboonDate->now()->subDays(3);

        $popularPost = Post::whereDate('updated_at', '<=', $now)
            ->whereDate('updated_at', '>=', $nowToLastThreeDays)
            ->orderBy('visitors', 'desc')
            ->take(5)
            ->get(['id', 'title', 'image', 'visitors', 'updated_at']);
        //dd($popularPost);

        $subcategoris = SubCategory::with('rPost:id,title,image,subcategory_id,created_at')
            ->where('subcategory_show', 'show')
            ->get(['id', 'subcategory_name']);
        //dd($subcategoris);

        // retrieve distinct month & year from posts table
        $archivedDate = DB::table('posts')
            ->distinct()
            ->orderBy('created_at')
            ->get([DB::raw(
                'YEAR(created_at) AS year,
                MONTH(created_at) AS month,
                MONTHNAME(created_at) AS month_name'
                )]);
        //dd($archivedDate);

        return view('echo365.pages.home', compact('home_ad_data', 'tickers', 'posts', 'featured_post', 'latest_post', 'subcategoris', 'popularPost', 'archivedDate'));
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

    public function postBySubCategory($name, $id)
    {
        $posts = Post::with('rSubCategory:id,subcategory_name')->where('subcategory_id', $id)->latest()->paginate(6, ['id', 'subcategory_id', 'title', 'image', 'created_at']);
        //dd($posts);
        return view('echo365.pages.category', compact('posts', 'name'));
    }
    public function postByMonth(Request $request){
        $posts = DB::table('posts')
        ->where(DB::raw('MONTH(created_at)'), $request->month )
        ->latest()
        ->get(['id', 'subcategory_id', 'title', 'image', 'created_at']);
        //dd($posts);

        // convert number to month in text format
        $dateTimeObj = DateTime::createFromFormat('!m',$request->month);
        $month = $dateTimeObj->format('F');

        return view('echo365.pages.archive', compact('posts', 'month'));
    }

    public function photos()
    {
        $photos = Photo::latest()->paginate(4);
        //dd($photos);
        return view('echo365.pages.photo', compact('photos'));
    }

    public function about()
    {
        return view('echo365.pages.about');
    }

    public function contact()
    {
        return view('echo365.pages.contact');
    }
    public function contact_store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Input is valid, continue...
        $admin = Admin::findOrFail(1);
        $subject = 'Contact Form';

        $message = 'Name of the user : ' . $request->name . '<br>';
        $message .= 'Email : ' . $request->email . '<br>';
        $message .= 'Message  : ' . $request->message;
        //dd($message);
        
        Mail::to($admin->email)->send(new WebMail($subject, $message));
        return response()->json([
            'status' => 'success',
        ]);
    }
}
