<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.all_category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return redirect('admin/all_category')->with('success', 'Category Inserted is successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function view(string $id)
    {
        $view_category = Category::find($id);
        return view('admin.view_category', compact('view_category'));
    }
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.update_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
        return redirect('admin/all_category')->with('success', 'Category Updated is successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/all_category')->with('success', 'Category Deleted is successfully!');
    }
    public function active($id){
        $category = Category::find($id);
        $category->status  = 2;
        $category->save();
        $name = $category->cat_name;
        return back()->with('success', "$name Category is Inactivated");
    }
    public function inactive($id){
        $category = Category::find($id);
        $category->status  = 1;
        $category->save();
        $name = $category->cat_name;
        return back()->with('success', "$name Category is Activated");
    }
}
