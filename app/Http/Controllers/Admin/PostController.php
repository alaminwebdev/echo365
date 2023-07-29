<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('rSubCategory')->latest()->paginate(10);
        //dd($posts);
        return view('admin.pages.post.post', compact('posts'));
    }

    public function create()
    {
        $subcategoris = SubCategory::with('rCategory')->get();
        return view('admin.pages.post.post-create', compact('subcategoris'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title'             => 'required',
                'detail'            => 'required',
                'image'             => 'required|image|mimes:jpg,png,jpeg,webp|max:512'
            ]);
            $ext_name               = $request->file('image')->extension();
            $img_name               = 'post' . time() . '.' . $ext_name;

            DB::beginTransaction();
            try {
                
                $post                   = new Post();
    
                $post->title            = $request->title;
                $post->image            = $img_name;
                $request->file('image')->move(public_path('uploads/'), $img_name);
                $post->detail           = $request->detail;
                $post->subcategory_id   = $request->subcategory_id;
                $post->admin_id         = Auth::guard('admin')->user()->id;
                //$post->author_id      = 0;
                $post->is_share         = $request->is_share;
                $post->is_comment       = $request->is_comment;
                $post->is_featured      = $request->is_featured;
                $post->visitors         = 1;
                $post->save();
    
                $lastinsertedId = $post->id;
    
                // create an array for tags
                $tags = explode(',', $request->tags);
    
                // create an empty array 
                $tags_array = [];
    
                // trim each tag and insert this empty array
                foreach ($tags as $tag) {
                    $tags_array[] = trim($tag);
                }
                // avoid duplicate tag and rearrange index number
                $new_tags_array = array_values(array_unique($tags_array));
    
                // insert each tag into database 
                foreach ($new_tags_array as $tag) {
                    $tag_data = new Tag();
                    $tag_data->tag = $tag;
                    $tag_data->post_id = $lastinsertedId;
                    $tag_data->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
                dd($th->getMessage());
            }


            return redirect()->route('admin.post.home')->with('success', 'Post created Successfully !');
        }
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        $subcategoris = SubCategory::with('rCategory')->get();
        $tags = Tag::where('post_id', $id)->get();
        return view('admin.pages.post.post-update', compact('post', 'subcategoris', 'tags'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);
        //dd($request->all());
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required',
                'detail' => 'required'
            ]);

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:jpg,png,jpeg,webp|max:512'
                ]);

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $post->image);
                if (file_exists($image_path) && !empty($post->image)) {
                    unlink($image_path);
                };


                $ext_name = $request->file('image')->extension();
                $img_name = 'post' . time() . '.' . $ext_name;

                $request->file('image')->move(public_path('uploads/'), $img_name);

                $post->image = $img_name;
            }
            $post->title = $request->title;
            $post->detail = $request->detail;
            $post->subcategory_id = $request->subcategory_id;
            $post->admin_id  = Auth::guard('admin')->user()->id;
            //$post->author_id  = 0;
            $post->is_share = $request->is_share;
            $post->is_comment = $request->is_comment;
            $post->is_featured = $request->is_featured;
            $post->update();

            if ($request->filled('tags')) {
                $tags = explode(',', $request->tags);
                foreach ($tags as $tag) {
                    // trim tha tag data
                    $trimmed_tag = trim($tag);
                    // check the tag are already exist in database or not 
                    $tag_data = Tag::where('post_id', $request->id)
                        ->where('tag', $trimmed_tag)->count();

                    if (!$tag_data) { // if tag are not exist
                        $new_tag = new Tag();
                        $new_tag->tag = $trimmed_tag;
                        $new_tag->post_id = $request->id;
                        $new_tag->save();
                    }
                }
            }
            return redirect()->route('admin.post.home')->with('success', 'Post updated successfully !');
        }
    }


    public function destroy($id)
    {
        $post = Post::findorFail($id);
        Tag::where('post_id', $id)->delete();
        $image_path = public_path('uploads/'.$post->image);
        if(file_exists($image_path) && !empty($post->image)){
            unlink($image_path);
        }
        
        $post->delete();
        return redirect()->route('admin.post.home')->with('success', 'Post deleted Successfully !');
    }

    public function tag_destroy($tag_id, $post_id)
    {
        Tag::destroy($tag_id);
        return redirect()->route('admin.post.show', $post_id)->with('success', 'Tag deleted Successfully !');
    }
}
