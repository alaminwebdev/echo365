<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        return view('admin.pages.category.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.category.category-create');
    }


    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                // validation rules
                'category_name' => 'required',
                'category_show' => 'required',
                'category_order' => 'required'
            ], [
                
            ], [
                // custom name for specific attribute
                'category_name' => 'Category Name',
                'category_show' => 'Category Show',
                'category_order' => 'Category Order'
            ]);

            $category = new Category();
            $category->category_name = $request->category_name;
            $category->category_show = $request->category_show;
            $category->category_order = $request->category_order;
            $category->save();

            return redirect()->route('admin.category.home')->with('success', 'Category created successfully !');
        }
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.category.category-update', compact('category'));
    }


    public function edit($id)
    {
        //
    }

 
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $category = Category::findOrFail($request->category_id);

            $request->validate([
                // validation rules
                'category_name' => 'required',
                'category_show' => 'required',
                'category_order' => 'required'
            ], [
                
            ], [
                // custom name for specific attribute
                'category_name' => 'Category Name',
                'category_show' => 'Category Show',
                'category_order' => 'Category Order'
            ]);

            $category->category_name = $request->category_name;
            $category->category_show = $request->category_show;
            $category->category_order = $request->category_order;
            $category->update();

            return redirect()->route('admin.category.home')->with('success', 'Category updated successfully !');
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.home')->with('success', 'Category deleted successfully !');
    }
}
