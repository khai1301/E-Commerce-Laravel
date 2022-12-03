<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products = DB::table('products')->select('*');
        $products = $products->get();
        return view('frontend.trangchu', compact('products'));
    }
}
