<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CheckoutController extends Controller
{
    public function save_checkout_customer(Request $request, $id){
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;
        $data['customer_id'] = $id;
        $shipping_id = DB::table('create_shipping_table')->insertGetId($data);
        Session()->put('shipping_id', $shipping_id);
        return redirect('/cart/payment');
    }
    public function payment(){

    }
}
