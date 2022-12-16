<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class indexcontroller extends Controller
{
    public function index()
    {
       $category= Category::all();
       $featured_product = DB::table('products')->where('featured_product', 'like', '%yes%')->get();

       return view('navbar.trangchu', [
        'categories'=>$category,

       ],compact('featured_product'));
    }
}
