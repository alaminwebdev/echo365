<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\HomeAd;
use App\Models\SidebarAd;
use App\Models\TopAd;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class AdController extends Controller
{
    public function home_ad()
    {
        $home_ad_data = HomeAd::findOrFail(1);
        return view('admin.pages.ad.home-ad', compact('home_ad_data'));
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

                // Clear the cache
                clearstatcache();

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $home_ad_data->above_search_ad);
                if (is_file($image_path) && !empty($home_ad_data->above_search_ad)) {
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

                // Clear the cache
                clearstatcache();

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $home_ad_data->above_footer_ad);
                if (is_file($image_path) && !empty($home_ad_data->above_footer_ad)) {
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

            return redirect()->route('admin.ad.home')->with('success', 'Advertisement updated successfully !');
        }
    }
    public function top_ad()
    {
        $top_ad_data = TopAd::findOrFail(1);
        return view('admin.pages.ad.top-ad', compact('top_ad_data'));
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

                // Clear the cache
                clearstatcache();

                // if validation is complete then delete the old photo from local server
                $image_path = public_path('uploads/' . $top_ad_data->top_ad);
                if (is_file($image_path) && !empty($top_ad_data->top_ad)) {
                    unlink($image_path);
                    clearstatcache();
                };


                $ext_name = $request->file('top_ad')->extension();
                $img_name = date('YmdHis') . '.' . $ext_name;

                $request->file('top_ad')->move(public_path('uploads/'), $img_name);

                $top_ad_data->top_ad = $img_name;
            }

            $top_ad_data->top_ad_url = $request->top_ad_url;
            $top_ad_data->top_ad_status = $request->top_ad_status;
            $top_ad_data->update();

            return redirect()->route('admin.ad.top')->with('success', 'Data updated successfully !');
        }
    }

    public function sidebar_ad()
    {
        $sidebar_ad_data = SidebarAd::get();
        return view('admin.pages.ad.sidebar-ad', compact('sidebar_ad_data'));
    }
    public function sidebar_ad_create()
    {
        return view('admin.pages.ad.sidebar-ad-create');
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
            return redirect()->route('admin.ad.sidebar')->with('success', 'Ad created successfully !');
        }
    }

    public function sidebar_ad_show($id)
    {
        $ad_data = SidebarAd::findOrFail($id);
        return view('admin.pages.ad.sidebar-ad-update', compact('ad_data'));
    }

    public function sidebar_ad_update(Request $request)
    {
        if ($request->isMethod('post')) {
            $ad_data = SidebarAd::where('id', $request->id)->first();

            $request->validate([
                'sidebar_ad_url' => 'required|url',
                'sidebar_ad_status' => 'required',
                'sidebar_ad_loaction' => 'required'
            ], [], [
                'sidebar_ad_url' => 'URL'
            ]);

            if ($request->hasFile('sidebar_ad')) {
                $request->validate([
                    'sidebar_ad' => 'required|image|mimes:jpg,png,jpeg|max:512'
                ], [], [
                    'sidebar_ad' => 'Image'
                ]);

                // Clear the cache
                clearstatcache();
                $image_path = public_path('uploads/' . $ad_data->sidebar_ad);
                if (is_file($image_path) && !empty($ad_data->sidebar_ad)) {
                    unlink($image_path);
                }

                $ext_name = $request->file('sidebar_ad')->extension();
                $img_name = 'sidebar_ad' . time() . '.' . $ext_name;
                $request->file('sidebar_ad')->move(public_path('uploads/'), $img_name);

                $ad_data->sidebar_ad = $img_name;
            }

            $ad_data->sidebar_ad_url = $request->sidebar_ad_url;
            $ad_data->sidebar_ad_status = $request->sidebar_ad_status;
            $ad_data->sidebar_ad_loaction = $request->sidebar_ad_loaction;
            $ad_data->update();

            return redirect()->route('admin.ad.sidebar')->with('success', 'Ad updated successfully !');
        }
    }

    public function sidebar_ad_delete($id)
    {
        $ad_data = SidebarAd::findOrFail($id);
        // Clear the cache
        clearstatcache();

        $image_path = public_path('uploads/' . $ad_data->sidebar_ad);
        if (is_file($image_path)) {
            unlink($image_path);
            
        }
        $ad_data->delete();
        return redirect()->route('admin.ad.sidebar')->with('success', 'Ad deleted successfully !');
    }
}
