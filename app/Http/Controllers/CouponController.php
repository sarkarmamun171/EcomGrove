<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
   public function index(){
    $coupons = Coupon::all();
     return view('admin.coupon.coupon',[
        'coupons'=>$coupons,
     ]);
   }
   public function coupon_store(Request $request){
    Coupon::insert([
        'coupon_name'=>$request->coupon_name,
        'coupon_type'=>$request->coupon_type,
        'coupon_amount'=>$request->coupon_amount,
        'coupon_limit'=>$request->coupon_limit,
        'coupon_validity'=>$request->coupon_validity,
        'created_at'=>Carbon::now(),
    ]);
    return back();
   }
   public function coupon_delete($id){
    Coupon::find($id)->delete();
    return back();
   }
}
