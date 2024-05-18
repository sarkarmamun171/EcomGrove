<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function subcategory(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.subcategory-index',[
            'categories' =>$categories,
            'subcategories'=>$subcategories,
        ]);
    }
    public function subcategory_store(Request $request){
        $request->validate([
            'category'=>'required',
            'subcategory_name'=>'required',
        ]);
        if (Subcategory::where('category_id',$request->category)->where('subcategory_name',$request->subcategory_name)->exists()) {
            return back()->with('exits','Sub category Already Exits!!');
        }
        else {
            Subcategory::insert([
                'category_id'=>$request->category,
                'subcategory_name'=>$request->subcategory_name,
            ]);
            return back()->with('success','Sub category Added!!');
        }

    }
    Public function subcategory_edit($id){
        $categories = Category::all();
        $subcategories = Subcategory::find($id);
        return view('admin.subcategory.subcategory-edit',[
            'categories' =>$categories,
            'subcategories'=>$subcategories,
        ]);
    }
    Public function subcategory_update(Request $request,$id){
        if (Subcategory::where('category_id',$request->category)->where('subcategory_name',$request->subcategory_name)->exists()) {
            return back()->with('exits','Sub category Already Exits!!');
        }
        else {
            Subcategory::find($id)->update([
                'category_id'=>$request->category,
                'subcategory_name'=>$request->subcategory_name,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('success','Sub category Updated!');
        }
        }

        public function subcategory_delete($id){
            Subcategory::find($id)->delete();
            return back()->with('delete','Subcategory Deleted !!');
        }

}
