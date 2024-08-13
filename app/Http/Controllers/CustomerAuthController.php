<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\EmailVerify;
use App\Notifications\CustomerEmailVerifyNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Notification;

class CustomerAuthController extends Controller
{
    public function customer_login()
    {
        return view('frontend.customer.login');
    }
    public function customer_register()
    {
        return view('frontend.customer.registration');
    }
    public function customer_store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password' => Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            'password_confirmation' => 'required',
        ]);
        $customer_id=Customer::insertGetId([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);
        $customer= Customer::find($customer_id);
        EmailVerify::where('customer_id',$customer_id)->delete();
        $emailVerifyInfo =EmailVerify::create([
            'customer_id'=>$customer_id,
            'token'=>uniqid(),
            'created_at'=>Carbon::now()
        ]);

        Notification::send($customer, new CustomerEmailVerifyNotification($emailVerifyInfo));
        return back()->with('success',"Registered ! A verification link sent to $request->email Please Verify to Login");
    }
    public function customer_confirmation_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Customer::where('email', $request->email)->exists()) {
            if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password])) {
                return redirect()->route('index');
            } else
            {
                return back()->with('pass', 'Password Invalid');
            }
        } else {
            return back()->with('exists', 'Email or Password Invalid');
        }
    }
    public function email_verification($token){
        $customer_id = EmailVerify::find('token',$token)->first()->customer_id;
        Customer::find($customer_id)->update([
            'email_verified_at'=>Carbon::now(),
        ]);
       // EmailVerify::find('token',$token)->delete();
        return redirect()->route('customer.register')->with('verified','Congratulation Your Email has been verified');
    }

}
