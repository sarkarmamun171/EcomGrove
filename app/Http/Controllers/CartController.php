<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function cart_store(Request $request){
        $request->validate([
            'color_id' =>'required',
            'size_id'  =>'required',
        ]);
        if (Cart::where('customer_id',Auth::guard('customer')->id())->where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->exists()) {
            Cart::where('customer_id',Auth::guard('customer')->id())->where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->increment('quantity',$request->quantity);

            return back()->with('cart_add','Cart Added Successfully');

        }
        else{
            Cart::insert([
                'customer_id'=> Auth::guard('customer')->id(),
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('cart_add','Cart Added Successfully');
        }

    }
    public function cart_remove($id){
        Cart::find($id)->delete();
        return back();
    }
    public function cart(Request $request){
        $coupon = $request->coupon;
        $mgs ='';
        $type = '';
        $discount = 0;
        if (isset($coupon)) {
            if (Coupon::where('coupon_name',$coupon)->exists()) {
                if (Carbon::now()->format('Y-m-d')<=Coupon::where('coupon_name',$coupon)->first()->coupon_validity) {
                    if (Coupon::where('coupon_name',$coupon)->first()->limit !==0) {
                        $type = Coupon::where('coupon_name',$coupon)->first()->coupon_type;
                        $discount = Coupon::where('coupon_name',$coupon)->first()->coupon_amount;
                    }
                    else{
                        $mgs = "Coupon Code limit Exceed !";
                        $discount= 0;
                    }
                }else{

                    $mgs = "Coupon Code Expired !";
                    $discount= 0;
                }
            }
            else{
                    $mgs = "Invalid Coupon Code";
                    $discount= 0;
            }
        }

        $carts = Cart::where('customer_id',Auth::guard('customer')->id())->get();
        return view('frontend.cart',[
            'carts'=>$carts,
            'mgs'=>$mgs,
            'discount'=>$discount,
            'type'=>$type,
        ]);
    }
    public function cart_update(Request $request){
        foreach ($request->quantity as $cart_id => $quantity) {
            Cart::find($cart_id)->update([
                'quantity' =>$quantity,
            ]);
        }
        return back();
    }
}
