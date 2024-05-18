<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function user_list(){
        $users = User::where('id','!=',Auth::id())->get();
        return view('admin.user.user-list',compact('users'));
    }
    public function user_remove($user_id){
        User::find($user_id)->delete();
        return back();
    }
}
