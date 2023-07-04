<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){
        $order = Order::orderBy('id', 'desc')->get();
        return view('admin.order', compact('order'));
    }
    public function order_details($id){
        $order_item = OrderItem::where('order_id', $id)->orderBy('id', 'desc')->get();
        $shipping = Shipping::where('order_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.order_details', compact('order_item', 'shipping'));
    }
    public function pending_order($id){
        $order = Order::find($id);
        $order->status = 2;
        $name = $order->invoice;
        $order->save();
        return back()->with('success', "($name) This Order is Completed");
    }
    public function completed_order($id){
        $order = Order::find($id);
        $order->status = 1;
        $name = $order->invoice;
        $order->save();
        return back()->with('success', "($name)This Order is Pending");
    }
    public function delete_order($id){
        $order = Order::find($id);
        $order->delete();
        return back()->with('success', "This Order is Deleted");
    }
}
