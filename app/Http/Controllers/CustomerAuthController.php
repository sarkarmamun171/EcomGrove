<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

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
        Customer::insert([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Registration Successfull');
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
    public function customer_profile(){
        return view('frontend.customer.profile');
    }
}
