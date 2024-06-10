<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    public function customer_profile(){
        return view('frontend.customer.profile');
    }
    public function customer_logout(){
        Auth::guard('customer')->logout();
        return redirect('/');
    }
    public function customer_profile_update(Request $request){

    }
}
