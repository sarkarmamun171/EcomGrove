<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function user_profile()
    {
        return view('admin.user.user-profile');
    }
    public function user_profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'email' => 'email|rfc,dns',
        ]);

        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back();
    }
    public function user_password_update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            // 'password' => Password::min(8)
            //     ->letters()
            //     ->mixedCase()
            //     ->numbers()
            //     ->symbols(),
            'password_confirmation' => 'required'
        ]);

        $user = User::find(Auth::id());

        if (password_verify($request->current_password, $user->password)) {
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password)
            ]);
            return back();
        } else {
            return back()->with('update_password', 'Wrong Current Password');
        }
    }

    public function user_profile_photo(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,bmp,png,jpg,jpeg,gif,',
            'photo' => 'file|max:300',
            'photo' => 'dimensions:min_width=100,min_height=100',
        ]);
        if (Auth::user()->photo == null) {
            $photo = $request->photo;
            $extension = $photo->extension();
            $filename = Auth::id().'.'.$extension;
            $image = Image::make($photo)->resize(300, 200)->save(public_path('uploads/user/'.$filename));

            User::find(Auth::id())->update([
                  'photo' => $filename,
            ]);
            return back()->with('profile_update','Profile Photo Update');
        }else{
            $present_photo = public_path('uploads/user/'.Auth::user()->photo);
            unlink($present_photo);

            $photo = $request->photo;
            $extension = $photo->extension();
            $filename = Auth::id().'.'.$extension;
            $image = Image::make($photo)->resize(300, 200)->save(public_path('uploads/user/'.$filename));

            User::find(Auth::id())->update([
                  'photo' => $filename,
            ]);
            return back()->with('profile_update','Profile Photo Update');
         }
    }
}
