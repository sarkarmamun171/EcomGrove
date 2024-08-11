<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function password_reset(){
        return view('frontend.customer.password_reset');
    }
    public function passwordreset_request(Request $request){
        print_r($request->all());
    }
}
