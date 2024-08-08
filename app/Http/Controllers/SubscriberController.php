<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribar_store(Request $request){
        Subscriber::insert([
            'email'=>$request->email,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('index','#subscriber')->with('subscriber','Email subscriber successfully');
    }
}
