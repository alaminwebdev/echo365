<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::get();
        return view('admin.pages.author.author', compact('authors'));
    }

    public function create()
    {
        return view('admin.pages.author.author-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request->all());
        $author = new Author();
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required | email',
                'gender' => 'required',
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required ',
                'dob' => 'required|date',
                'image' => 'image|mimes:jpg,png,jpeg|max:512'
            ]);

        
            $ext_name = $request->file('image')->extension();
            $img_name = 'author'.time().'.'.$ext_name;

            $request->file('image')->move(public_path('uploads/'), $img_name);

            $author->name = $request->name;
            $author->email = $request->email;
            $author->gender = $request->gender;
            $author->password = Hash::make($request->password);
            $author->image = $img_name;
            $author->dob = $request->dob;
            $author->save();

            return redirect()->route('admin.author.home')->with('success', 'Author created successfully !');
        }
    }


    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.pages.author.author-update', compact('author'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $author = Author::findOrFail($request->id);
        //dd($request->all());
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required | email',
                'gender' => 'required',
                'dob' => 'required|date'
            ]);

            if ($request->password != '') {
                $request->validate([
                    'password' => 'required|min:5|confirmed',
                    'password_confirmation' => 'required ',

                ]);
                $author->password = Hash::make($request->password);
            }
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:jpg,png,jpeg|max:512'
                ]);

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $author->image);
                if (file_exists($image_path) && !empty($author->image)) {
                    unlink($image_path);
                };


                $ext_name = $request->file('image')->extension();
                $img_name = 'author'.time().'.'.$ext_name;

                $request->file('image')->move(public_path('uploads/'), $img_name);

                $author->image = $img_name;
            }
            $author->name = $request->name;
            $author->email = $request->email;
            $author->gender = $request->gender;
            $author->dob = $request->dob;
            $author->update();

            return redirect()->route('admin.author.home')->with('success', 'Profile updated successfully !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $image_path = public_path('uploads/' . $author->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $author->delete();
        return redirect()->route('admin.author.home')->with('success', 'Profile deleted successfully !');
    }
}
