<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function getSignup(){
        return view('frontend.signup');
    }
    public function postSignup(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                'email' => 'bail|required|email',
                'name' => 'bail|required|string',
                'gender' => 'bail|required|alpha',
                'password' => 'bail|required|confirmed',
                'password_confirmation'=>'bail|required'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();

            }

            $email = DB::table('users')->where('email', $request->email)->first();
            if(!$email){
                User::create([
                    'name' => $request -> name,
                    'gender'=> $request -> gender,
                    'email'=> $request -> email,
                    'password'=> bcrypt($request->password),
                ]);
        
                return redirect()->route('login')->with('message', 'Đăng ký thành công');
            }
        }
        
    }

    public function getLogin(){
        return view('frontend.login');
    }

    public function postLogin(Request $request){
        $arr = ['email' => $request->email, 'password' => $request->password];

        if($request->remember = "remember me"){
            $remember = true;
        } else {
            $remember = false;
        }
        if(Auth::attempt($arr, $remember)){
            return redirect()->intended('/home');
        }else {
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu chưa đúng');
        }
    }

    public function getCustomer(){
        $customers = DB::table('users')->select('*');
        $customers = $customers->get();
        return view('admin.list_customer', compact('users'));
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }

    public function getCart(){
        return view('frontend.cart');
    }
}
