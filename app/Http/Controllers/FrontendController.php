<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        // $products = Product::where('status',1)->get();
        return view('frontend.index',[
            'categories'=>$categories,
            'products'=>$products,
        ]);
    }
    public function category_product(){
        return view('frontend.category_product');
    }
}
