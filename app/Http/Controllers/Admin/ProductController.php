<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->get();
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.all_product', compact('product', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.add_product', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $file_name = time().'_Ecom2.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/images/'.$file_name);

        $product->title = $request->title;
        $product->image = $file_name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->short_desc = $request->short_desc;
        $product->description = $request->description;
        $product->save();
        return redirect('admin/all_product')->with('success', 'Product inserted is Successfully');

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
    public function edit(string $id)
    {
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $product = Product::find($id);
        return view('admin.update_product', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if($request->image != ""){
            $old_image = $product->image;
            Storage::delete("public/images/$old_image");
            
            $file_name = time().'_Ecom2.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs("public/images/$file_name");

            $product->title = $request->title;
            $product->image = $file_name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->short_desc = $request->short_desc;
            $product->description = $request->description;
            $product->save();
            return redirect('admin/all_product')->with('success', 'Product Updated is Successfully');
        }
        else{
            $product->title = $request->title;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->short_desc = $request->short_desc;
            $product->description = $request->description;
            $product->save();
            return redirect('admin/all_product')->with('success', 'Product Updated is Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id)->delete();
        return redirect('admin/all_product')->with('success', 'Product Deleted is Successfully');
    }
    public function active($id){
        $product = Product::find($id);
        $product->status = 2;
        $name = $product->title;
        $product->save();
        return redirect('admin/all_product')->with('success', "($name) is Inactivated");
    }
    public function inactive($id){
        $product = Product::find($id);
        $product->status = 1;
        $name = $product->title;
        $product->save();
        return redirect('admin/all_product')->with('success', "($name) is Activated");
    }
}
