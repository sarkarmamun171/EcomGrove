<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Inventory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        // $products = Product::where('status',1)->get();
        return view('frontend.index', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
    public function category_product($id)
    {
        $category = Category::find($id);
        $categories = Product::where('category_id', $id)->get();
        return view('frontend.category_product', [
            'categories' => $categories,
            'category' => $category,
        ]);
    }
    public function subcategory_product($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategories = Product::where('subcategory_id', $id)->get();
        return view('frontend.subcategory_product', [
            'subcategory' => $subcategory,
            'subcategories' => $subcategories,
        ]);
    }
    public function product_details($slug)
    {
        $product_id = Product::where('slug',$slug)->first()->id;
        $product_details = Product::find($product_id);
        $availble_colors = Inventory::where('product_id',$product_id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get();
        $availble_size = Inventory::where('product_id',$product_id)->groupBy('size_id')->selectRaw('count(*) as total_size,size_id')->get();

        return view('frontend.product-details',[
            'product_details'=>$product_details,
            'availble_colors'=>$availble_colors,
            'availble_size'=>$availble_size,
        ]);
    }
    public function getSize(Request $request){
       echo $request->color_id;
    }
}
