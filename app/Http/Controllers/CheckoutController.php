<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CheckoutController extends Controller
{
    public function getCartPayment($id){
        $categories = DB::table('categories')->select('*');
        $categories = $categories -> get();
        $customer_infor = DB::table('users')->select('*')->where('id',$id);
        $customer_infor = $customer_infor->get();
        $carts = session()->get('cart');
        return view('frontend.cart_payment', compact('carts','categories','customer_infor'));
    }
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

        return redirect()->back();   
    }
    public function save_payment_customer(Request $request, $id){
        $totalPrice = $request->totalPrice;
        $carts = session()->get('cart');
        if($carts != null){
        //inser shipping infor
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;
        $data['customer_id'] = $id;
        $shipping_id = DB::table('create_shipping_table')->insertGetId($data);
        Session()->put('shipping_id', $shipping_id);

        // print_r($carts);
        // print_r($totalPrice);
        // exit;
        $payment_data = array();
        $payment_data['payment_method'] = $request->payment_option;
        $payment_data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('payments')->insertGetId($payment_data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = $id;
        $order_data['shipping_id'] = $shipping_id;
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = $totalPrice;
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('order')->insertGetId($order_data);

        //insert order details
        // $status=$request->status;
        foreach($carts as $cart){
            if($cart['totalquantity'] > $cart['quantity']){
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $cart['id'];
            $order_details_data['product_name'] = $cart['name'];
            $order_details_data['product_price'] = $cart['price'];
            $order_details_data['product_sales_quantity'] = $cart['quantity'];
            DB::table('order_details')->insert($order_details_data);
        }}

        if($payment_data['payment_method'] == 1){
            Session()->flush('cart');
            return redirect()->route('home')->with(['sucess'=>'Đặt hàng thành công']);
        } elseif($payment_data['payment_method'] == 2){
            Session()->flush('cart');
            return redirect()->route('home')->with(['sucess'=>'Đặt hàng thành công']);
        }
        } else {
            return redirect()->route('getcart', Auth::user()->id)->with(['error' => 'Không có đơn hàng trong giỏ hàng, vui lòng thêm đơn hàng']);
        }
    }
    public function processVnpay(Request $request){
        if($request->vnp_ResponseCode == "00"){
            $arr = Session()->get('orderIf');
            // dd($arr);
            $data = array();
            $data['shipping_email'] = $arr['shipping_email'];
            $data['shipping_name'] = $arr['shipping_name'];
            $data['shipping_address'] = $arr['shipping_address'];
            $data['shipping_phone'] = $arr['shipping_phone'];
            $data['shipping_note'] = $arr['shipping_note'];
            $data['customer_id'] = Auth::user()->id;
            $shipping_id = DB::table('create_shipping_table')->insertGetId($data);
            Session()->put('shipping_id', $shipping_id);

            // print_r($carts);
            // print_r($totalPrice);
            // exit;
            $payment_data = array();
            $payment_data['payment_method'] = $arr['payment_option'];
            $payment_data['payment_status'] = 'Đang chờ xử lý';
            $payment_id = DB::table('payments')->insertGetId($payment_data);

            //insert order
            $order_data = array();
            $order_data['customer_id'] = Auth::user()->id;
            $order_data['shipping_id'] = $shipping_id;
            $order_data['payment_id'] = $payment_id;
            $order_data['order_total'] = $arr['totalPrice'];
            $order_data['order_status'] = 'Đang chờ xử lý';
            $order_id = DB::table('order')->insertGetId($order_data);
            Session()->forget('orderIf');
            //insert order details
            $carts = session()->get('cart');
            foreach($carts as $cart){
                if($cart['totalquantity'] > $cart['quantity']){
                $order_details_data['order_id'] = $order_id;
                $order_details_data['product_id'] = $cart['id'];
                $order_details_data['product_name'] = $cart['name'];
                $order_details_data['product_price'] = $cart['price'];
                $order_details_data['product_sales_quantity'] = $cart['quantity'];
                DB::table('order_details')->insert($order_details_data);
            }}
            session()->forget('cart');
            return redirect()->route('home')->with(['success' => 'Đặt hàng thành công']);
        }
        return redirect()->route('getcart')->with(['error' =>'Loi trong qua trinh giao dich']);
    }
    public function vnpay_payment(Request $request,$id){
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $arr = $request->all();
        session(['orderIf' => $arr]);
        //  dd(session()->get('orderIf'));
        // dd($arr);
        // $totalPrice = $request->totalPrice;
        // dd($totalPrice);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://freshfood.com:8000/cart/processVnpay";
        $vnp_TmnCode = "EJZHISDK";//Mã website tại VNPAY 
        $vnp_HashSecret = "UDTGABJWONBKBMFVQVXPCXGGJVGKARFF"; //Chuỗi bí mật

        $vnp_TxnRef = date('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo ='Thanh toán đơn hàng';
        $vnp_OrderType = 'vnpay_payment';
        $vnp_Amount = $arr['totalPrice'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                // header('Location: ' . $vnp_Url);
                return redirect($vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            
    }
}
