<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
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
        return view('frontend.product-details');
    }
}
