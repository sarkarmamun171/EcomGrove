<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
class CustomerAuthController extends Controller
{
    public function customer_login(){
        return view('frontend.customer.login');
    }
    public function customer_register(){
        return view('frontend.customer.registration');
    }
    public function customer_store(Request $request){
        $request->validate([
            'fname'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
            'password' => Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols(),
            'passwors_confirmation'=>'required',
        ]);
        Customer::insert([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Registration Successfull');
    }
}
