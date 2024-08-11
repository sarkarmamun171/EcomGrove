<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Password_reset;
use App\Notifications\PasswordRestNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PasswordResetController extends Controller
{
    public function password_reset(){
        return view('frontend.customer.password_reset');
    }
    public function passwordreset_request(Request $request){
        if (Customer::where('email',$request->email)->exists()) {
            $customer = Customer::where('email',$request->email)->first();
            Password_reset::where('customer_id',$customer->id)->delete();
            //echo $customer->id;
            $resetinfo = Password_Reset::create([
                'customer_id'=>$customer->id,
                'token'=>uniqid(),
                'created_at'=>Carbon::now()
            ]);
            Notification::send($customer, new PasswordRestNotification( $resetinfo));
            return back()->with('success',"Password send request to $request->email");
        }else{
            return back()->with('exist','email does not exist');
        }
    }
    public function passwordreset_form($token){
        return view('frontend.customer.passwordResetForm',[
            'token'=>$token,
        ]);
    }
    public function password_reset_confirm(Request $request ,$token){
        echo $token;
        print_r($request->all());
    }
}
