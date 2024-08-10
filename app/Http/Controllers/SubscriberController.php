<?php

namespace App\Http\Controllers;

use App\Mail\Newsletter;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function subscribar_store(Request $request){
        Subscriber::insert([
            'email'=>$request->email,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('index','#subscriber')->with('subscriber','Email subscriber successfully');
    }
    public function subscribar(){
        $subscribers = Subscriber::all();
        return view('admin.subscriber.subscriber_list',[
            'subscribers'=>$subscribers,
        ]);
    }
    public function send_newsletter($id){
        $subscriber = Subscriber::find($id);
        Mail::to($subscriber->email)->send(new Newsletter($subscriber));

        return back()->with('success',"Newsletter successfully to $subscriber->email");
    }

}

