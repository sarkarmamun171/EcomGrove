<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist_store(){
        return view('frontend.wishlist');
    }
}
