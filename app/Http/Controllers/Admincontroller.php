<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admincontroller extends Controller
{
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return $credentials;
    }

    public function statics (){
        $adminUser= Auth::guard('admin')->user();
        return view('admin.statics', ['user'=>$adminUser]);
    }

    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard');
        } else {
            return redirect('admin/login');
        }
    }

    public function getOrder(){
        $order_infor = DB::table('order')->select('*');
        $order_infor = $order_infor->paginate(10);
        // $order_details = DB::table('create_shipping_table')->select('*');
        // $order_details =$order_details->get();
        return view('admin.order', compact('order_infor'));
    }

    public function getOrderDetails($order_id){
        $order_details = DB::table('order_details')->select('*')->where('order_id', $order_id);
        $order_details = $order_details->get();
        return view('admin.order_details', compact('order_details'));
    }
}
