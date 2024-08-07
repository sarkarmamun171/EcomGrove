<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Inventory;
use App\Models\Orderproduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $product_id = Product::where('slug', $slug)->first()->id;
        $reviews = Orderproduct::where('product_id',$product_id)->whereNotNull('review')->get();
        $product_details = Product::find($product_id);
        $availble_colors = Inventory::where('product_id', $product_id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get();
        $availble_size = Inventory::where('product_id', $product_id)->groupBy('size_id')->selectRaw('count(*) as total_size,size_id')->get();

        return view('frontend.product-details', [
            'product_details' => $product_details,
            'availble_colors' => $availble_colors,
            'availble_size' => $availble_size,
            'reviews' => $reviews,
        ]);
    }
    public function getSize(Request $request)
    {
        $str = '';
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        foreach ($sizes as $size) {
            $str .= '<li class=""> <input class="size_id" id="size'.$size->size_id.'" type="radio" name="size_id" value="'.$size->size_id.'">
            <label for="size' .$size->size_id.'">'.$size->rel_to_size->size_name.'</label>
            </li>';
        }
        echo $str;
    }
    public function getQuantity(Request $request){
        $str = '';
        $quanties = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id',$request->size_id)->first()->quantity;

        if ($quanties == 0) {
            $quanties = '<button class="abc btn btn-danger" value="'.$quanties.'">Out of stock</button>';
        }
        else{
            $quanties = '<button class="btn btn-success">'.$quanties.' In stock</button>';
        }
        echo $quanties;
    }
    public function review_store(Request $request){
        Orderproduct::where('customer_id',Auth::guard('customer')->id())->where('product_id',$request->product_id)->first()->update([
            'star'=>$request->stars,
            'review'=>$request->review,
            'updated_at'=>Carbon::now(),
        ]);
        return back();
    }
}
