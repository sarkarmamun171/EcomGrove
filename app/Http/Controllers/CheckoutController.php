<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Orderproduct;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $countries = Country::all();
        $cities = City::all();
        $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.customer.checkout', [
            'carts' => $carts,
            'countries' => $countries,
            'cities' => $cities,
        ]);
    }
    public function getCity(Request $request)
    {
        $str = '<option value="">Select City*</option>';

        $cities = City::where('country_id', $request->country_id)->get();
        foreach ($cities as $city) {
            $str .= '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        echo $str;
    }
    public function order_store(Request $request)
    {
        if ($request->payment_method == 1) {
            $order_id = '#' . uniqid() . '-' . Carbon::now()->format('Y-m-d');

            Order::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customer')->id(),
                'discount' => $request->discount,
                'charge' => $request->charge,
                'payment_method' => $request->payment_method,
                'sub_total' => $request->sub,
                'total' => $request->sub + $request->charge - ($request->discount),
                'created_at' => Carbon::now(),
            ]);
            Billing::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::guard('customer')->id(),
                'fname' => $request->fname,
                'lname' => $request->lname,
                'country_id' => $request->country,
                'city_id' => $request->city,
                'zip' => $request->zip,
                'company' => $request->company,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
            if ($request->ship_check == 1) {
                Shipping::insert([
                    'order_id' => $order_id,
                    'ship_fname' => $request->ship_fname,
                    'ship_lname' => $request->ship_lname,
                    'ship_country' => $request->ship_country,
                    'ship_city' => $request->ship_city,
                    'ship_zip' => $request->ship_zip,
                    'ship_company' => $request->ship_company,
                    'ship_email' => $request->ship_email,
                    'ship_phone' => $request->ship_phone,
                    'ship_address' => $request->ship_address,
                    // 'status' => 0,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                Shipping::insert([
                    'order_id' => $order_id,
                    'ship_fname' => $request->ship_fname,
                    'ship_lname' => $request->ship_lname,
                    'ship_country' => $request->ship_country,
                    'ship_city' => $request->ship_city,
                    'ship_zip' => $request->ship_zip,
                    'ship_company' => $request->ship_company,
                    'ship_email' => $request->ship_email,
                    'ship_phone' => $request->ship_phone,
                    'ship_address' => $request->ship_address,
                    // 'status' => 0,
                    'created_at' => Carbon::now(),
                ]);
            }

            $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
            foreach($carts as $cart){
                Orderproduct::insert([
                    'order_id' => $order_id,
                    'customer_id' => Auth::guard('customer')->id(),
                    'product_id' => $cart->product_id,
                    'price' => $cart->rel_to_product->after_discount,
                    'color_id' => $cart->color_id,
                    'size_id' => $cart->size_id,
                    'quantity' => $cart->quantity,
                    'created_at' => Carbon::now(),
                ]);

                Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->decrement('quantity', $cart->quantity);

                Cart::find($cart->id)->delete();
            }
            Mail::to($request->email)->send(new InvoiceMail($order_id));
            return redirect()->route('order.success');
        } elseif ($request->payment_method == 2) {
            echo 'SSL';
        } elseif ($request->payment_method == 3) {
            echo 'Stripe';
        }
    }
    public function order_success(){
        return view('frontend.order_success');
    }
}
