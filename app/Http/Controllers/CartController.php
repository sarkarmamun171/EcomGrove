<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart_store(Request $request){
        $request->validate([
            'color_id' =>'required',
            'size_id'  =>'required',
        ]);
    }
}
