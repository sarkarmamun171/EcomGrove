<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Barryvdh\DomPDF\Facade\Pdf;
class CustomerController extends Controller
{
    public function customer_profile()
    {
        return view('frontend.customer.profile');
    }
    public function customer_logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
    public function customer_profile_update(Request $request)
    {
        if ($request->password == '') {
            if ($request->photo == '') {
                Customer::find(Auth::guard('customer')->id())->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'country' => $request->country,
                    'zip' => $request->zip,
                ]);
                return back()->with('success', 'Profile Update Successfully');
            } else {
                if (Auth::guard('customer')->user()->photo !== null) {
                    $delete_form = public_path('uploads/customer/' . Auth::guard('customer')->user()->photo);
                    unlink($delete_form);
                }
                $image = $request->photo;
                $extension = $image->extension();
                $file_name = Auth::guard('customer')->id() . '.' . $extension;
                Image::make($image)->resize(300, 200)->save(public_path('uploads/customer/' . $file_name));
                Customer::find(Auth::guard('customer')->id())->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'country' => $request->country,
                    'photo' => $file_name,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->with('success', 'Profile Update Successfully');
            }
        } else {
            if ($request->photo == '') {
                Customer::find(Auth::guard('customer')->id())->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'country' => $request->country,
                    'zip' => $request->zip,
                ]);
                return back()->with('success', 'Profile Update Successfully');
            } else {
                if (Auth::guard('customer')->user()->photo !== null) {
                    $delete_form = public_path('uploads/customer/' . Auth::guard('customer')->user()->photo);
                    unlink($delete_form);
                }
                $image = $request->photo;
                $extension = $image->extension();
                $file_name = Auth::guard('customer')->id() . '.' . $extension;
                Image::make($image)->resize(300, 200)->save(public_path('uploads/customer/' . $file_name));
                Customer::find(Auth::guard('customer')->id())->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'country' => $request->country,
                    'zip' => $request->zip,
                    'photo' => $file_name,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->with('success', 'Profile Update Successfully');
            }
        }
    }
    public function customer_order(){
        $myorders =Order::where('customer_id',Auth::guard('customer')->id())->latest()->paginate(5);
        return view('frontend.customer.order',[
            'myorders'=>$myorders,
        ]);
    }
    public function order_invoice_downlaod($id){
        $order_info = Order::find($id);
        $pdf = PDF::loadView('frontend.invoice.invoice', [
            'order_id'=>$order_info->order_id,
        ]);
        return $pdf->download('invoice.pdf');
    }
    public function cancel_myorder($id){
        Order::find($id)->update([
            'order_cancel'=>1,
        ]);
        return back();
    }

}
