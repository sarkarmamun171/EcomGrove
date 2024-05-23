<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Carbon;

class InventoryController extends Controller
{
    public function inventory(){
        $colors = Color::all();
        return view('admin.product.product-inventory',[
            'colors'=>$colors,
        ]);
    }
    public function color_store(Request $request){
        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Color Added Successfully !!');
    }
}
