<?php

namespace App\Http\Controllers\Echo365;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Admin;
use App\Models\HomeAd;
use App\Models\Photo;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Ticker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        ->get(['id','title','updated_at','detail','image','subcategory_id']);
        //dd($latest_post);

        $featured_post = Post::with('rSubCategory:id,subcategory_name')
            ->where('is_featured', 1)
            ->latest()
            ->get(['id','title','updated_at','image','subcategory_id']);
        //dd($featured_post);


        // $subcategoris = SubCategory::with(['rPost'=> function($query){
        //     $query->latest()->get(['id','title','image','subcategory_id']);
        // }])
        // ->where('subcategory_show', 'show')
        // ->get(['id','subcategory_name']);

        $subcategoris = SubCategory::with('rPost:id,title,image,subcategory_id')
        ->where('subcategory_show', 'show')
        ->get(['id','subcategory_name']);
        //dd($subcategoris);

        return view('echo365.pages.home', compact('home_ad_data', 'tickers', 'posts', 'featured_post','latest_post','subcategoris'));
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

    public function postBySubCategory($id){
        $posts = Post::with('rSubCategory:id,subcategory_name')->where('subcategory_id',$id)->latest()->paginate(6);
        //dd($posts);
        return view('echo365.pages.category', compact('posts'));
    }

    public function photos(){
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
    public function contact_store(Request $request){
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
     
        if ($validator->fails()) {
            
            return response()->json([
                'code'=> 0,
                'error_message'=>$validator->errors()->toArray(),
            ]);
     
            // Also handy: get the array with the errors
            //$validator->errors();
     
            // or, for APIs:
            //$validator->errors()->toJson();
        }
     
        // Input is valid, continue...
        $admin = Admin::findOrFail(1);
        $subject = 'Contact Form';
        
        $message = 'Name of the user : '. $request->name .'<br>';
        $message .= 'Email : ' . $request->email .'<br>';
        $message .= 'Message  : ' . $request->message;
        //dd($message);


        Mail::to($admin->email)->send(new ContactMail($subject, $message));
        return response()->json([
            'code'=> 1,
            'success_message'=>'Email is send succesfully !',
            
        ]);
        
    }
}
