<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $category = Category::where('status', 1)->get();
        $first_category = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $category_products = Product::where('status', 1)->inRandomOrder()->paginate(4);
        return view('welcome', compact('products','category', 'category_products'));
    }
    public function shop(){
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $products = Product::where('status', 1)->inRandomOrder()->paginate(3);
        return view('shop', compact('products','category'));
    }
    public function shop_sorting(Request $request){
        $products = Product::where('status', 1)->paginate($request->page);
        if($request->orderby == 'new_date'){
             $products = Product::where('status', 1)->orderBy('id', 'desc')->paginate($request->page);
        }
        elseif($request->orderby == 'old_date'){
             $products = Product::where('status', 1)->orderBy('id', 'asc')->paginate($request->page);
        }
        elseif($request->orderby == 'low_price'){
             $products = Product::where('status', 1)->orderBy('price', 'asc')->paginate($request->page);
        }
        elseif($request->orderby == 'high_price'){
             $products = Product::where('status', 1)->orderBy('price', 'desc')->paginate($request->page);
        }
        
       
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
       
        return view('shop', compact('products','category'));
    }
    public function shop_details($id){
        $product = Product::find($id);
        $category_id = $product->category_id;
        $related_product = Product::where('category_id', $category_id)->inRandomOrder()->get();
        $popular_product = Product::where('status', 1)->inRandomOrder()->limit(5)->get();
        $review = Review::where('product_id', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('shop_details', compact('product', 'related_product', 'popular_product', 'review'));
    }
    public function search(Request $request){
        $search = $request->search;
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        
        $products = Product::where('title', 'LIKE', "%$search%")
                        ->orWhere('short_desc', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")->paginate(3);
        return view('search', compact('products', 'category', 'search'));
    }
    public function review(Request $request){
        $order = Order::where('user_id', Auth::user()->id)->exists();
        if($order){
            $item = OrderItem::where('product_id', $request->product)->get();
            if($item){
                $review = new Review();
                $review->user_id = Auth::user()->id;
                $review->product_id = $request->product_id;
                $review->rating = $request->rating;
                $review->comment = $request->comment;
                $review->save();
                return redirect()->back()->with('success','Thanks for your Review!');
            }
            else{
                return redirect()->back()->with('error','You are not pursues this product yet!');
            }
        }
        else{
            return redirect()->back()->with('error','You can not review!');
        }
    }
    public function category($id){
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $products = Product::where('category_id', $id)->get();
        $category_name = Category::find($id);
        return view('category', compact('products', 'category', 'category_name'));
    }
    public function home_category($id){
        $category = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $category_products = Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(4);
        return view('home_category', compact('products','category', 'category_products'));
    } 
}
