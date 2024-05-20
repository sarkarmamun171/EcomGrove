<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
  public function product_index(){
    $categories = Category::all();
    $subcategories = Subcategory::all();
    $brands = Brand::all();
    return view('admin.product.product-index',[
        'categories'=>$categories,
        'subcategories'=>$subcategories,
        'brands'=>$brands,
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
  public function product_store(ProductRequest $request){
            $tag_implode = implode(',',$request->tags);

            $preview_image = $request->preview_image;
            $extension = $preview_image->extension();
            $file_name = Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(100,1000).'.'.$extension;

            Image::make($preview_image)->resize(300, 200)->save(public_path('uploads/product/previewimage/'.$file_name));


    $product_id = Product::insertGetId([
        'category_id'=>$request->category,
        'subcategory_id'=>$request->subcategory,
        'brand_id'=>$request->brand,
        'product_name'=>$request->product_name,
        'price'=>$request->price,
        'discount'=>$request->discount,
        'after_discount'=>$request->price-($request->price*$request->discount/100),
        'tags'=>$tag_implode,
        'short_description'=>$request->short_description,
        'long_description'=>$request->long_description,
        'additional_information'=>$request->additional_information,
        'slug'=>Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(10000,100000000),
        'preview_image'=>$file_name,
        'created_at'=>Carbon::now(),
    ]);
        foreach ($request->gallery_image as $gallery) {
            $extension = $gallery->extension();
            $file_name = Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(100,1000).'.'.$extension;
            Image::make($gallery)->resize(300, 200)->save(public_path('uploads/product/galleryImage/'.$file_name));

            ProductGallery::insert([
                'product_id'=>$product_id,
                'gallery_image'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);
        }
    return back()->with('success','Product Added!!');
  }
}
