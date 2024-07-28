<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        return back();
    }
}
