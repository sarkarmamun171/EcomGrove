<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function product_index(){
    $categories = Category::all();
    $subcategories = Subcategory::all();
    return view('admin.product.product-index',[
        'categories'=>$categories,
        'subcategories'=>$subcategories,
    ]);
  }
  public function getsubcategory(Request $request){
    $str = '<option value="">Select Category</option>';
    $subcategories  = Subcategory::where('category_id',$request->category_id)->get();
    foreach ($subcategories as $subcategory) {
         $str .='<option value="'.$subcategory->id.'">'.$subcategory->subcategory_name.'</option>';
    }
    echo $str;
  }
}
