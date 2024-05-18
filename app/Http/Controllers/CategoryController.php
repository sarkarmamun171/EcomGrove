<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function category(){
        $categories = Category::paginate(5);
        return view('admin.category.category',[
            'categories'=>$categories,
        ]);
    }
    public function category_store(Request $request){
       $request->validate([
            'category_name'=>'required|unique:categories',
            'category_image'=>'required',
            'category_image'=>'image',
            'category_image'=>'file|max:512',
            // 'category_image'=>'dimensions:min_width=50,height=50'
       ]);
       $img = $request->category_image;
       $extension = $img->extension();
       $file_name = Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(100,1000).'.'.$extension;
    //    echo $file_name;
    //    die();
       Image::make($img)->resize(300, 200)->save(public_path('uploads/category/'.$file_name));

       Category::insert([
            'category_name'=>$request->category_name,
            'category_image'=>$file_name,
            'created_at'=>Carbon::now(),
       ]);

       return back()->with('success','Category added Successfully');

    }

    public function category_edit($id){
        $category_edit = Category::find($id);
        return view('admin.category.category-edit',[
            'category_edit'=>$category_edit,
        ]);
    }

    public function category_update(Request $request){
        $category = Category::find($request->category_id);

        if ($request->category_image =='') {
           Category::find($request->category_id)->update([
                'category_name'=>$request->category_name,
                'updated_at'=>Carbon::now(),
           ]);
           return redirect('/category');
        }
        else{
            $current_image = public_path('uploads/category/'.$category->category_image);
            unlink($current_image);

            $img = $request->category_image;
            $extension = $img->extension();
            $file_name = Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(100,1000).'.'.$extension;

            Image::make($img)->resize(300, 200)->save(public_path('uploads/category/'.$file_name));

            Category::find($request->category_id)->update([
                'category_name'=>$request->category_name,
                'category_image'=>$file_name,
                'updated_at'=>Carbon::now(),
           ]);
           return redirect('/category');
        }
    }

    public function category_softdelete($id){
        Category::find($id)->delete();
        return back();
    }

    public function category_trash(){
        $categories_trash = Category::onlyTrashed()->get();
        return view('admin.category.category-trash',[
            'categories_trash'=>$categories_trash,
        ]);
    }

    public function category_restore($id){
        Category::onlyTrashed()->find($id)->restore();
        return back();
    }

    public function category_hard_delete($id){
        $category = Category::onlyTrashed()->find($id);
        $image = public_path('uploads/category/'.$category->category_image);
        unlink($image);

        $subcategory = Subcategory::where('category_id',$id)->get();
        foreach ($subcategory as $sub) {
            Subcategory::find($sub->id)->update([
                'category_id'=>19
            ]);
        }

        Category::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
    public function category_delete_checked(Request $request){
       foreach ($request->category_id as $category) {
        Category::find($category)->delete();
       }
       return back();
    }
    public function category_trash_restore(Request $request){
        foreach ($request->category_id as $category) {
            Category::onlyTrashed()->find($category)->restore();
        }
        return back();
     }
    
}
