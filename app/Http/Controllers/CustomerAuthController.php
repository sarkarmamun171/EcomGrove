<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function customer_login(){
        return view('frontend.customer.login');
    }
    public function customer_register(){
        return view('frontend.customer.registration');
    }
}
