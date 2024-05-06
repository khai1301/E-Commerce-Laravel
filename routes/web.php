<?php

use App\Http\Controllers\addingcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
// use App\Http\Controllers\editingconroller;
use App\Http\Controllers\editingcontroller;
use App\Http\Controllers\indexcontroller;
use App\Http\Controllers\InsertDB;
use App\Http\Controllers\listingcontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index']) -> name('home');


Route::get('admin/login', function () {
    return view('admin.login');
})->name('login.');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard.');

Route::get('/admin/qladmin', function () {
    return view('admin.qladmin');
})->name('qladmin.');


Route::get('/about', function () {
    return view('frontend.about');
})->name('about');


// route quan ly

Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/listing/{model}', [listingcontroller::class, 'index'])->name('listing.index');
Route::post('/admin/listing/{model}', [listingcontroller::class, 'index'])->name('listing.index');
Route::get('/admin/editing/{model}', [editingcontroller::class, 'create'])->name('editing.create');
Route::post('/admin/editing/{model}', [editingcontroller::class, 'store'])->name('editing.store');


Route::get('/home', [ProductController::class, 'index'])->name('home');
// =======
// =======

Route::get('/admin/listing/{model}/{id}', [listingcontroller::class, 'edit'])->name('listing.edit');

Route::put('/admin/listing/{model}/{id}  ', [listingcontroller::class, 'update'])->name('listing.update');

Route::DELETE('/admin/listing/{model}/{id}', [listingcontroller::class, 'destroy'])->name('listing.destroy');

Route::get('/admin/listing/product/{category_id}/{id}', [listingcontroller::class, 'show'])->name('product.show');  


Route::group(['prefix'=> 'signup'], function(){
    Route::get('/', [HomeController::class, 'getSignup'])->name('dangky');
    Route::post('/', [HomeController::class, 'postSignup'])->name('store');
});

Route::group(['prefix'=> 'login'], function(){
    Route::get('/', [HomeController::class, 'getLogin'])->name('login');
    Route::post('/', [HomeController::class, 'postLogin']);
});

Route::get('logout', [HomeController::class, 'getLogout']);

Route::get('/admin/listing/user', [HomeController::class, 'getCustomer'])->middleware('CheckLogout::class');
//show cart
Route::get('/cart-{id}', [ProductController::class, 'getCart'])->name('getcart');
Route::post('/cart-{totalPrice}-{id}', [ProductController::class, 'getTotal'])->name('getTotal');
//tat ca san pham
Route::get('/store', [ProductController::class, 'getFullProduct'])->name('storeWeb');
// lay san pham theo loai
Route::get('/products/{id}', [ProductController::class, 'getTypeProduct'])->name('laysptheoloai');

Route::get('/shop', [CategoryController::class, 'index']);
//addcart
Route::get('/Add-Cart/{id}', [ProductController::class, 'addcart'])->name('addcart');

//update cart
Route::get('/update-cart', [ProductController::class, 'updateCart'])->name('updatecart');
//delete cart
Route::get('/delete-cart', [ProductController::class, 'deleteCart'])->name('deletecart');
//infor_checkout_customer
Route::post('/cart/check-out-{id}',[CheckoutController::class, 'save_checkout_customer'])->name('saveCheckout');

Route::get('/cart/payment/{id}',[CheckoutController::class, 'getCartPayment'])->name('cart_payment');
Route::post('/cart/payment/{id}',[CheckoutController::class, 'save_payment_customer'])->name('savePayment');

Route::get('/detail/{id}-{category_id}', [ProductController::class, 'getDetails'] )->name('getDetails');
//show history order
Route::get('/cart-{id}/history', [ProductController::class, 'getHistory'])->name('getHistory');
//show all order
Route::get('/admin/listorder', [AdminController::class, 'getOrder'])->name('getOrder');
//show order details
Route::get('/admin/listorder/{order_id}', [AdminController::class, 'getOrderDetails'])->name('getOrderDetails');
//thanh toán vnpay
Route::post('/cart/vnpay_payment/{id}', [CheckoutController::class, 'vnpay_payment'])->name('vnpay_payment');

Route::get('/cart/processVnpay', [CheckoutController::class, 'processVnpay']);

