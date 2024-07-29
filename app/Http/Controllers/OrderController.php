<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Order;
use App\Models\Orderproduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function admin_order(){
        $orders = Order::latest()->get();
        return view('admin.order.order',[
            'orders'=>$orders,
        ]);
    }
    public function order_status_update(Request $request){
        Order::where('order_id',$request->order_id)->update([
            'status'=>$request->status,
        ]);
        if (Order::where('order_id',$request->order_id)->where('order_cancel',1)) {
            Order::where('order_id',$request->order_id)->where('order_cancel',1)->update([
                'order_cancel'=>2,
            ]);
        }
        $products = Orderproduct::where('order_id', $request->order_id)->get();
        foreach($products as $product){
            Inventory::where('product_id', $product->product_id)->where('color_id', $product->color_id)->where('size_id', $product->size_id)->increment('quantity', $product->quantity);
        }
        return back();
    }
    public function order_cancel_request(){
        $cancel_order = Order::where('order_cancel',1)->get();
        return view('admin.order.order_cancel ',[
            'cancel_order'=>$cancel_order,
            ]);
    }
}

