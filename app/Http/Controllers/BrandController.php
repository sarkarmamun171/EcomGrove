<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
class BrandController extends Controller
{
    public function brand(){
        $brands = Brand::paginate(5);
        return view('admin.brand.index',[
            'brands'=>$brands,
        ]);
    }
    public function brand_store(Request $request){
        $request->validate([
            'brand_name'=>'required',
            'brand_logo'=>'required|image|file|max:512',
        ]);
        $img = $request->brand_logo;
        $extension = $img->extension();
        $file_name = Str::lower(str_replace(' ','-',$request->brand_name)).'-'.random_int(100,1000).'.'.$extension;

        Image::make($img)->resize(300, 200)->save(public_path('uploads/brand/'.$file_name));

        Brand::insert([
             'brand_name'=>$request->brand_name,
             'brand_logo'=>$file_name,
             'created_at'=>Carbon::now(),
        ]);

        return back()->with('success','Brand added Successfully');
    }
    public function brand_edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.brand-edit',[
            'brands'=>$brands,
        ]);
    }
    public function brand_update(Request $request,$id){
        $brand = Brand::find($id);
        $request->validate([
            'brand_name'=>'required',
        ]);
        if ($request->brand_logo=='') {
             Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
             ]);
             return back()->with('success','Brand Updated !!');

        }
        else{
            $request->validate([
                'brand_logo'=>'required|image',
            ]);

            $current_image =public_path('uploads/brand/'.$brand->brand_logo);
            unlink($current_image);

            $img = $request->brand_logo;
            $extension = $img->extension();
            $file_name = Str::lower(str_replace(' ','-',$request->brand_name)).'-'.random_int(100,1000).'.'.$extension;

            Image::make($img)->resize(300, 200)->save(public_path('uploads/brand/'.$file_name));

            Brand::find($id)->update([
                 'brand_name'=>$request->brand_name,
                 'brand_logo'=>$file_name,
                 'update_at'=>Carbon::now(),
            ]);

            return back()->with('success','Brand Updated !!');

        }
    }
    public function brand_delete($id){
        $brand = Brand::find($id);

        $current_image = public_path('uploads/brand/'.$brand->brand_logo);
        unlink($current_image);

        $brand->delete();

        return back()->with('delete','Brand Deleted !!');

    }
}
