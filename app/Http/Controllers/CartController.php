<?php

namespace App\Http\Controllers;


use App\Models\Cart;
// use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('cart', compact('carts'));
    }
    public function store_cart(Request $request){
        $check = Cart::where([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            
        ])->exists();
        // $check = Cart::where('user_id', Auth::user()->id)->get();
        if($check){

            return back()->with('error', 'This Product is  Already added to Cart!');
        }
        else{
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->product_id;
            $cart->qty = $request->qty;
            $cart->save();
            return redirect()->back()->with('success', 'Successfully added to Cart!');
        }
        
        
    }
    public function update_cart(Request $request, $id){
        $cart = Cart::find($id);
        $cart->qty = $request->qty;
        $name = $cart->product->title;
        $cart->save();
        return redirect('cart')->with('success', "( $name ) qty is Updated!");
    }
    public function delete_cart($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('cart')->with('success', "This Cart is Deleted!");
    }
}
