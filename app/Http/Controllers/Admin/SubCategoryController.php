<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subcategories = SubCategory::with('rCategory')->get();
        return view('admin.pages.category.subcategory', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::get(['id', 'category_name']);
        return view('admin.pages.category.subcategory-create', compact('categories'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            //dd($request->all());
            $request->validate([
                // validation rules
                'subcategory_name' => 'required',
                'subcategory_show' => 'required',
                'subcategory_order' => 'required',
                'category_id' => 'required'
            ], [
                
            ], [
                // custom name for specific attribute
                'subcategory_name' => 'Sub Category Name',
                'subcategory_show' => 'Sub Category Status',
                'subcategory_order' => 'Sub Category Order'
            ]);

            $subcategory = new SubCategory();
            $subcategory->subcategory_name = $request->subcategory_name;
            $subcategory->subcategory_show = $request->subcategory_show;
            $subcategory->subcategory_order = $request->subcategory_order;
            $subcategory->category_id = $request->category_id;
            $subcategory->save();

            return redirect()->route('admin.subcategory.home')->with('success', 'Sub Category created successfully !');
        }
    }


    public function show($id)
    {
        $categories = Category::get(['id', 'category_name']);
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.pages.category.subcategory-update', compact('categories','subcategory'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $subcategory = SubCategory::findOrFail($request->subcategory_id);
            $request->validate([
                // validation rules
                'subcategory_name' => 'required',
                'subcategory_show' => 'required',
                'subcategory_order' => 'required',
                'category_id' => 'required'
            ], [
                
            ], [
                // custom name for specific attribute
                'subcategory_name' => 'Sub Category Name',
                'subcategory_show' => 'Sub Category Status',
                'subcategory_order' => 'Sub Category Order'
            ]);

            $subcategory->subcategory_name = $request->subcategory_name;
            $subcategory->subcategory_show = $request->subcategory_show;
            $subcategory->subcategory_order = $request->subcategory_order;
            $subcategory->category_id = $request->category_id;
            $subcategory->update();

            return redirect()->route('admin.subcategory.home')->with('success', 'Sub Category updated successfully !');
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
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->route('admin.subcategory.home')->with('success', 'Sub Category deleted successfully !');
    }
}
