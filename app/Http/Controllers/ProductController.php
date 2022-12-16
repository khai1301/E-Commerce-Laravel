<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

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
        return view('frontend.shop', compact('products_type','categories'));
    }

    public function addcart(Request $request,$id){
        // $product = DB::table('products')->where('id', $id)->first();
        // if($product != null){
        //     $oldCart = Session('Cart') ? Session('Cart') : null;
        //     $newCart = new Cart($oldCart);
        //     $newCart->AddCart($product, $id);
        //     $request->session()->put('Cart', $newCart);
        //     dd(Session('Cart'));
        // }
        // session()->flush('cart');
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity']+1;

        } else {
            $cart[$id] =[
                'image'=>$product->image,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=> 1,
                
            ];
        }

        session()->put('cart',$cart);
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
}
