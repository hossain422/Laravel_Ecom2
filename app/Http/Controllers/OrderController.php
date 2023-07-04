<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('checkout', compact('carts'));
    }
    public function place_order(Request $request){
        $order = new Order();
        $order->invoice = rand().'_Ecom2';
        $order->payment_type = $request->payment_type;
        $order->sub_total = $request->sub_total;
        $order->total = $request->total;
        $order->user_id = Auth::user()->id;
        $order->save();

        
        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->order_id = $order->invoice;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->country = $request->country;
        $shipping->zip = $request->zip;
        $shipping->city = $request->city;
        $shipping->save();

        


        $cart = Cart::where('user_id', Auth::user()->id)->get();
        foreach($cart as $cart){
            $order_item = new OrderItem();
            $order_item->order_id = $order->invoice;
            $order_item->product_id = $cart->product_id;
            $order_item->qty = $cart->qty;
            $order_item->price = $cart->product->price;
            $order_item->save();
            $product = Product::find($cart->product_id);
            $product->qty = $product->qty - $cart->qty;
            $product->save();

            $cart->delete();
        }

    

        return redirect('thank_you');
  

    }
    public function order(){
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('order', compact('order'));
    }
    public function order_details($id){
        $order_item = OrderItem::where('order_id', $id)->orderBy('id', 'desc')->get();
        $shipping = Shipping::where('order_id', $id)->orderBy('id', 'desc')->get();
        return view('order_details', compact('order_item', 'shipping'));
    }
    public function download_invoice($id){
        $shipping = Shipping::where('order_id', $id)->orderBy('id', 'desc')->get();
        $order = Order::where('invoice', $id)->orderBy('id', 'desc')->get();
        $order_item = OrderItem::where('order_id', $id)->orderBy('id', 'desc')->get();
        // return view('pdf.invoice', compact('order', 'shipping', 'order_item'));
        $pdf = FacadePdf::loadView('pdf.invoice', compact('shipping', 'order', 'order_item'));
        return $pdf->download('invoice_Ecom.pdf');
    }
}
