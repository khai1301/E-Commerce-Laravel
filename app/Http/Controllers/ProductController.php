<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;


class ProductController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->select('*');
        $categories = $categories -> get();
        $products = Product::where('featured_product','yes');
        $products = $products->get();
        return view('frontend.trangchu', compact('products', 'categories'));
    }
    public function getTypeProduct($name){
        $categories = DB::table('categories')->select('*');
        $categories = $categories -> get();
        $products_type = Product::where('category_id',$name);
        $products_type = $products_type->get();
        return view('frontend.shop', compact('products_type','categories', 'name'));
    }
    public function getFullProduct(Request $request){
        $categories = DB::table('categories')->select('*');
        $categories = $categories -> get();
        $min_price = DB::table('products')->min('price');
        $max_price = DB::table('products')->max('price');
        if( ($request->start_price != null) && ($request->end_price !=null) ){
            $products = Product::whereBetween('price',[$request->start_price, $request->end_price])->paginate(8)->withQueryString();
            return view('frontend.store', compact('products','categories','min_price', 'max_price'));
            // dd($products);
        }elseif($request->key != null){
            $products = Product::where('name','like','%'.$request->key.'%')->paginate(8)->withQueryString();
        } else 
        $products = DB::table('products')->select('*')->paginate(8);
        // $products = $products->paginate(8);
        return view('frontend.store', compact('products','categories','min_price', 'max_price'));
    }
    public function getHistory($id){
        $order_infor = DB::table('order')->select('*')->where('customer_id', $id);
        $order_infor = $order_infor->paginate(10);
        $shipping_id = DB::table('order')->select('*')->where('customer_id', $id);
        $shipping_id = $shipping_id->get();
        // dd($shipping_id->shipping_id);
        $order_details = DB::table('create_shipping_table')->select('*')->where([
            ['customer_id', $id]]);
        $order_details =$order_details->paginate(10);
        return view('frontend.history_order', compact('order_infor', 'order_details'));
    }
    public function addcart(Request $request,$id){
        
        // session()->flush('cart');
        $product = Product::find($id);
        $cart = session()->get('cart');
       
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity']+1;

        } else {
            $cart[$id] =[
                'id' => $product->id,
                'image'=>$product->image,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=> 1,
                'totalquantity'=>$product->amount,
            ];
        }

        session()->put('cart',$cart);
        // echo "<pre>";
        // print_r(session()->get('cart'));
        return response()->json([
            'code' => 200,
            'message'=>'sucess'
        ], 200);

    }

    public function getCart($id){
        $categories = DB::table('categories')->select('*');
        $categories = $categories -> get();
        $customer_infor = DB::table('users')->select('*')->where('id',$id);
        $customer_infor = $customer_infor->get();
        $carts = session()->get('cart');
        return view('frontend.cart', compact('carts','categories','customer_infor'));
     }
     public function getTotal($totalPrice){
        $totalPrices = $totalPrice;
        return view('frontend.cart', compact('totalPrices'));
     }

     public function updateCart(Request $request){
        $categories = DB::table('categories')->select('*');
        $categories = $categories -> get();
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('frontend.cart_component', compact('carts','categories'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code'=>200] , 200);
        }
     }

     public function deleteCart(Request $request){
        
        $categories = DB::table('categories')->select('*');
        $categories = $categories -> get();
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('frontend.cart_component', compact('carts','categories'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code'=>200] , 200);
        }
     }

     public function getDetails($id, $category_id){
        $categories = DB::table('categories')->select('*');
        $categories = $categories -> get();
        $p_cate = DB::table('products')->select('*')->where('category_id', $category_id);
        $p_cate = $p_cate->get();
        $products = DB::table('products')->select('*')->where('id',$id);
        $products = $products->get();
        return view('frontend.product_details', compact('products', 'categories', 'p_cate'));
     }
}
