<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
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
        $reviews = Orderproduct::where('product_id', $product_id)->whereNotNull('review')->get();
        $total_star = Orderproduct::where('product_id', $product_id)->whereNotNull('review')->sum('star');
        $product_details = Product::find($product_id);
        $availble_colors = Inventory::where('product_id', $product_id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get();
        $availble_size = Inventory::where('product_id', $product_id)->groupBy('size_id')->selectRaw('count(*) as total_size,size_id')->get();

        return view('frontend.product-details', [
            'product_details' => $product_details,
            'availble_colors' => $availble_colors,
            'availble_size' => $availble_size,
            'reviews' => $reviews,
            'total_star' => $total_star,
        ]);
    }
    public function getSize(Request $request)
    {
        $str = '';
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        foreach ($sizes as $size) {
            $str .= '<li class=""> <input class="size_id" id="size' . $size->size_id . '" type="radio" name="size_id" value="' . $size->size_id . '">
            <label for="size' . $size->size_id . '">' . $size->rel_to_size->size_name . '</label>
            </li>';
        }
        echo $str;
    }
    public function getQuantity(Request $request)
    {
        $str = '';
        $quanties = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->first()->quantity;

        if ($quanties == 0) {
            $quanties = '<button class="abc btn btn-danger" value="' . $quanties . '">Out of stock</button>';
        } else {
            $quanties = '<button class="btn btn-success">' . $quanties . ' In stock</button>';
        }
        echo $quanties;
    }
    public function review_store(Request $request)
    {
        Orderproduct::where('customer_id', Auth::guard('customer')->id())->where('product_id', $request->product_id)->first()->update([
            'star' => $request->stars,
            'review' => $request->review,
            'updated_at' => Carbon::now(),
        ]);
        return back();
    }
    public function about(){
        return view('frontend.about');
    }
    public function faq(){
        return view('frontend.faq');
    }
    public function shop(Request $request)
    {
        $data = $request->all();

        // $min = 1;
        // $max = Products::max('after_discount');


        // if(!empty($data['min']) && $data['min'] != '' && $data['min']!='undefined'){
        //     $min = $data['min'];
        // }
        // if(!empty($data['max']) && $data['max'] != '' && $data['max']!='undefined'){
        //     $max = $data['max'];
        // }

        $sorting = 'created_at';
        $type = 'DESC';

        if(!empty($data['sorting']) && $data['sorting'] != '' && $data['sorting']!='undefined'){
            if($data['sorting'] == '1'){
                $sorting = 'after_discount';
                $type = 'ASC';
            }
            if($data['sorting'] == '2'){
                $sorting = 'after_discount';
                $type = 'DESC';
            }
            if($data['sorting'] == '3'){
                $sorting = 'product_name';
                $type = 'ASC';
            }
            if($data['sorting'] == '4'){
                $sorting = 'product_name';
                $type = 'DESC';
            }
        }

        $products = Product::where(function($q) use ($data){
            if(!empty($data['search_input']) && $data['search_input'] != '' && $data['search_input']!='undefined'){
                $q->where(function($q) use ($data){
                    $q->where('product_name', 'like', '%' .$data['search_input'].'%');
                    $q->orWhere('tags', 'like', '%' .$data['search_input'].'%');
                    $q->orWhere('long_description', 'like', '%' .$data['search_input'].'%');
                    $q->orWhere('short_description', 'like', '%' .$data['search_input'].'%');
                    $q->orWhere('additional_information', 'like', '%' .$data['search_input'].'%');
                });
            }


            $min = 1;
            $max = Product::max('after_discount');

            if(!empty($data['min']) && $data['min'] != '' && $data['min']!='undefined'){
                $min = $data['min'];
            }
            if(!empty($data['max']) && $data['max'] != '' && $data['max']!='undefined'){
                $max = $data['max'];
            }

            if(!empty($data['min']) && $data['min'] != '' && $data['min']!='undefined' || !empty($data['max']) && $data['max'] != '' && $data['max']!='undefined'){
                $q->whereBetween('after_discount', [[$min], [$max]]);
            }
            if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id']!='undefined' ){
                $q->whereHas('rel_to_inventory',function($q) use ($data){
                    if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id']!='undefined' ){
                        $q->whereHas('rel_to_color', function($q) use ($data){
                            $q->where('colors.id', $data['color_id']);
                        });
                    }
                });
            }
            if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id']!='undefined' && !empty($data['size_id']) && $data['size_id'] != '' && $data['size_id']!='undefined'){
                $q->whereHas('rel_to_inventory',function($q) use ($data){
                    if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id']!='undefined' ){
                        $q->whereHas('rel_to_color', function($q) use ($data){
                            $q->where('colors.id', $data['color_id']);
                        });
                    }
                    if(!empty($data['size_id']) && $data['size_id'] != '' && $data['size_id']!='undefined' ){
                        $q->whereHas('rel_to_size', function($q) use ($data){
                            $q->where('sizes.id', $data['size_id']);
                        });
                    }
                });
            }
            if(!empty($data['category_id']) && $data['category_id'] != '' && $data['category_id']!='undefined' ){
                $q->where(function($q) use ($data){
                    $q->where('category_id', $data['category_id']);
                });
            }
            if(!empty($data['tag_id']) && $data['tag_id'] != '' && $data['tag_id']!='undefined' ){
                $q->where(function($q) use ($data){
                    $all = '';
                    foreach(Product::all() as $pro){
                        $explode = explode(',', $pro->tags);
                        if(in_array($data['tag_id'], $explode)){
                            $all .= $pro->id.',';
                        }
                    }
                    $explode2 = explode(',',$all);
                    $q->find($explode2);
                });
            }
            if(!empty($data['top_catid']) && $data['top_catid'] != '' && $data['top_catid']!='undefined'){
                $q->where(function($q) use ($data){
                    $q->where('category_id', $data['top_catid']);
                });
            }
        })->orderBy($sorting,$type)->get();
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('frontend.shop', [
            'products' => $products,
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);
    }
}
