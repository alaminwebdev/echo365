<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('admin.pages.post.post', compact('posts'));
    }

    public function create()
    {
        $subcategoris = SubCategory::with('rCategory')->get();
        return view('admin.pages.post.post-create', compact('subcategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->isMethod('post')){
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512'
        ]);

    

        $ext_name = $request->file('image')->extension();
        $img_name = 'post'.time().'.'.$ext_name;
        
        //dd($img_name);

        $post = New Post();

        $post->title = $request->title;
        $post->image = $img_name;
        $request->file('image')->move(public_path('uploads/'), $img_name);
        $post->detail = $request->detail;
        $post->subcategory_id = $request->subcategory_id;
        $post->admin_id  = Auth::guard('admin')->user()->id;
        //$post->author_id  = 0;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->visitors = 1;
        $post->save();

        $lastinsertedId = $post->id;

        echo $lastinsertedId ;
        
       } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
