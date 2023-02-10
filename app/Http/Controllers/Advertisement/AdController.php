<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\HomeAd;
use App\Models\SidebarAd;
use App\Models\TopAd;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function home_ad()
    {
        $home_ad_data = HomeAd::findOrFail(1);
        return view('admin.pages.home-ad', compact('home_ad_data'));
    }
    public function home_ad_update(Request $request)
    {
        if ($request->isMethod('post')) {
            $home_ad_data = HomeAd::findOrFail(1);

            // check if above search ad image is submtted or not
            if ($request->hasFile('above_search_ad')) {
                $request->validate([
                    'above_search_ad' => 'image|mimes:jpg,png,jpeg|max:512'
                ], [
                    // custom error message in specific situation
                    'above_search_ad.image' => 'File must be an image',
                    'above_search_ad.mimes' => 'Image must be jpg, png & jpeg type',
                    'above_search_ad.max' => 'Image must be lower than 512 kilobytes',
                ], []);

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $home_ad_data->above_search_ad);
                if (file_exists($image_path) && !empty($home_ad_data->above_search_ad)) {
                    unlink($image_path);
                };


                $ext_name = $request->file('above_search_ad')->extension();
                $img_name = date('YmdHis') . '.' . $ext_name;

                $request->file('above_search_ad')->move(public_path('uploads/'), $img_name);

                $home_ad_data->above_search_ad = $img_name;
            }

            $home_ad_data->above_search_ad_url = $request->above_search_ad_url;
            $home_ad_data->above_search_ad_status = $request->above_search_ad_status;

            // check if above footer ad image is submtted or not
            if ($request->hasFile('above_footer_ad')) {
                $request->validate([
                    'above_footer_ad' => 'image|mimes:jpg,png,jpeg|max:512'
                ], [
                    // custom error message in specific situation
                    'above_footer_ad.image' => 'File must be an image',
                    'above_footer_ad.mimes' => 'Image must be jpg, png & jpeg type',
                    'above_footer_ad.max' => 'Image must be lower than 512 kilobytes',
                ], []);

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $home_ad_data->above_footer_ad);
                if (file_exists($image_path) && !empty($home_ad_data->above_footer_ad)) {
                    unlink($image_path);
                };


                $ext_name = $request->file('above_footer_ad')->extension();
                $img_name = date('YmdHis') . '.' . $ext_name;

                $request->file('above_footer_ad')->move(public_path('uploads/'), $img_name);

                $home_ad_data->above_footer_ad = $img_name;
            }

            $home_ad_data->above_footer_ad_url = $request->above_footer_ad_url;
            $home_ad_data->above_footer_ad_status = $request->above_footer_ad_status;

            $home_ad_data->update();

            return redirect()->route('admin.home.ad')->with('success', 'Data updated successfully !');
        }
    }
    public function top_ad()
    {
        $top_ad_data = TopAd::findOrFail(1);
        return view('admin.pages.top-ad', compact('top_ad_data'));
    }
    public function top_ad_update(Request $request)
    {

        $top_ad_data = TopAd::findOrFail(1);
        //dd($top_ad_data);
        if ($request->isMethod('post')) {
            // check if top ad image is submtted or not
            if ($request->hasFile('top_ad')) {
                $request->validate([
                    'top_ad' => 'image|mimes:jpg,png,jpeg|max:512'
                ], [
                    // custom error message in specific situation
                    'top_ad.image' => 'File must be an image',
                    'top_ad.mimes' => 'Image must be jpg, png & jpeg type',
                    'top_ad.max' => 'Image must be lower than 512 kilobytes',
                ], []);

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $top_ad_data->top_ad);
                if (file_exists($image_path) && !empty($top_ad_data->top_ad)) {
                    unlink($image_path);
                };


                $ext_name = $request->file('top_ad')->extension();
                $img_name = date('YmdHis') . '.' . $ext_name;

                $request->file('top_ad')->move(public_path('uploads/'), $img_name);

                $top_ad_data->top_ad = $img_name;
            }

            $top_ad_data->top_ad_url = $request->top_ad_url;
            $top_ad_data->top_ad_status = $request->top_ad_status;
            $top_ad_data->update();

            return redirect()->route('admin.top.ad')->with('success', 'Data updated successfully !');
        }
    }

    public function sidebar_ad()
    {
        $sidebar_ad_data = SidebarAd::get();
        return view('admin.pages.sidebar-ad', compact('sidebar_ad_data'));
    }
    public function sidebar_ad_create()
    {
        return view('admin.pages.sidebar-ad-create');
    }
    public function sidebar_ad_store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                // validation rules
                'sidebar_ad' => 'required|image|mimes:jpg,png,jpeg|max:512',
                'sidebar_ad_url' => 'required|url',
                'sidebar_ad_status' => 'required',
                'sidebar_ad_loaction' => 'required'
            ], [
                // custom error message in specific situation
                'sidebar_ad.required' => 'Image is required',
                'sidebar_ad.image' => 'File must be an image',
                'sidebar_ad.mimes' => 'Image must be jpg, png & jpeg type',
                'sidebar_ad.max' => 'Image must be lower than 512 kilobytes',
            ], [
                // custom name for specific attribute
                'sidebar_ad_url' => 'URL',
            ]);


            $ext_name = $request->file('sidebar_ad')->extension();

            $img_name = 'sidebar_ad' . time() . '.' . $ext_name;
            $request->file('sidebar_ad')->move(public_path('uploads/'), $img_name);

            $ad_data = new SidebarAd();
            $ad_data->sidebar_ad = $img_name;
            $ad_data->sidebar_ad_url = $request->sidebar_ad_url;
            $ad_data->sidebar_ad_status = $request->sidebar_ad_status;
            $ad_data->sidebar_ad_loaction = $request->sidebar_ad_loaction;
            $ad_data->save();
            return redirect()->route('admin.sidebar.ad')->with('success', 'Ad created successfully !');
        }
    }
}
