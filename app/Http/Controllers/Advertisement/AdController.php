<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\HomeAd;
use App\Models\TopAd;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function home_ad()
    {
        $home_ad_data = HomeAd::find(1);
        return view('admin.pages.home-ad', compact('home_ad_data'));
    }
    public function home_ad_update(Request $request)
    {
        if ($request->isMethod('post')) {
            $home_ad_data = HomeAd::find(1);

            // check if above search ad image is submtted or not
            if ($request->hasFile('above_search_ad')) {
                $request->validate([
                    'above_search_ad' => 'image|mimes:jpg,png,jpeg|max:512'
                ]);

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
                ]);

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
        $top_ad_data = TopAd::find(1);
        return view('admin.pages.top-ad', compact('top_ad_data'));
    }
    public function top_ad_update(Request $request)
    {

        $top_ad_data = TopAd::find(1);
        //dd($top_ad_data);
        if ($request->isMethod('post')) {
            // check if top ad image is submtted or not
            if ($request->hasFile('top_ad')) {
                $request->validate([
                    'top_ad' => 'image|mimes:jpg,png,jpeg|max:512'
                ]);

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
}
