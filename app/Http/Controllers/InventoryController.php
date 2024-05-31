<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Carbon;

class InventoryController extends Controller
{
    public function inventory(){
        $colors = Color::all();
        $categories = Category::all();
        return view('admin.product.product-variation',[
            'colors'=>$colors,
            'categories'=>$categories,
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
    public function size_store(Request $request){
        Size::insert([
            'category_id'=>$request->category_id,
            'size_name'=>$request->size_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('size','Size Added Successfully !!');
    }
    public function color_remove($id){
        Color::find($id)->delete();
        return back();
    }
    public function size_remove($id){
        Size::find($id)->delete();
        return back();
    }
    public function product_inventory($id){
        $products = Product::find($id);
        $colors = Color::all();
        $inventories = Inventory::where('product_id',$id)->get();
        return view('admin.product.product-inventory',[
            'products'=>$products,
            'colors'=>$colors,
            'inventories'=>$inventories,
        ]);
    }
    public function inventory_store(Request $request,$id){
        if (Inventory::where('product_id',$id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->exists()) {
          Inventory::where('product_id',$id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->increment('quantity',$request->quantity);
          return back()->with('inventory','Inventory Added Successfully');
        }
        else{
            Inventory::insert([
                'product_id'=>$id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
            ]);
            return back()->with('inventory','Inventory Added Successfully');
        }

    }
}
