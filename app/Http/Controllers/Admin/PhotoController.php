<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::get();
        //dd($photos);
        return view('admin.pages.photo.photo', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.photo.photo-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,webp|max:512',
                'caption' => 'required| max:255'
            ]);

            //dd($request->file('photo')->getClientOriginalExtension());

            $photo_ext = $request->file('photo')->extension();
            $photo_name = 'photo'. time() . '.' . $photo_ext;
            $request->file('photo')->move(public_path('uploads/'), $photo_name);
            $photo = new Photo();
            $photo->photo = $photo_name;
            $photo->caption = $request->caption;
            $photo->save();

            return redirect()->route('admin.photo.home')->with('success', 'Photo uploaded successfully !');
            

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
        $photo = Photo::findOrFail($id);
        return view('admin.pages.photo.photo-update', compact('photo'));
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
    public function update(Request $request)
    {
        //dd($request->all());
        if($request->isMethod('post')){
            $photo = Photo::findOrFail($request->id);

            $request->validate([
                'caption' => 'required| max:255'
            ]);
            if($request->hasFile('photo')){
                $request->validate([
                    'photo' => 'required|image|mimes:jpg,png,jpeg,webp|max:512', 
                ]);

                $photo_path = public_path('uploads/'.$photo->photo);
                if(file_exists($photo_path) && !empty($photo->photo)){
                    unlink($photo_path);
                }

                $photo_ext = $request->file('photo')->extension();
                $photo_name = 'photo'. time() . '.' . $photo_ext;

                $request->file('photo')->move(public_path('uploads/'), $photo_name);

                $photo->photo = $photo_name;
            }

            $photo->caption = $request->caption;
            $photo->update();
            return redirect()->route('admin.photo.home')->with('success', 'Photo updated successfully !');
            
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
        $photo = Photo::findOrFail($id);
        //dd($photo);

        $photo_path = public_path('uploads/'.$photo->photo);
        if(file_exists($photo_path) && !empty($photo->photo)){
            unlink($photo_path);
        }
        $photo->delete();
        return redirect()->route('admin.photo.home')->with('success', 'Photo deleted successfully !');
    }
}
