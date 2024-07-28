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
}
