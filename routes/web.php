<?php

use App\Http\Controllers\addingcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
// use App\Http\Controllers\editingconroller;
use App\Http\Controllers\editingcontroller;
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

Route::get('/', function() {
    return view('navbar/trangchu');
})->name('trangchu.');

Route::get('/cuahang', function () {
    return view('navbar/cuahang');
})->name('cuahang.');

Route::get('admin/login', function () {
    return view('admin.login');
})->name('login.');

Route::get('/danhba', function () {
    return view('navbar/danhba');
})->name('danhba.');
Route::get('/gioithieu', function () {
    return view('navbar/gioithieu');
})->name('gioithieu.');
Route::get('/kienthuc', function () {
    return view('navbar/kienthuc');
})->name('kienthuc.');
Route::get('/lienhe', function () {
    return view('navbar/lienhe');
})->name('lienhe.');



Route::get('/raucu', function () {
    return view('cuahang/cuahangraucu');
})->name('cuahangraucu.');
Route::get('/dokho', function () {
    return view('cuahang/cuahangdokho');
})->name('cuahangdokho.');
Route::get('/raucu', function () {
    return view('cuahang/cuahangraucu');
})->name('cuahangraucu.');
Route::get('/douong', function () {
    return view('cuahang/cuahangdouong');
})->name('cuahangdouong.');
Route::get('/haisan', function () {
    return view('cuahang/cuahanghaisan');
})->name('cuahanghaisan.');
Route::get('/thittrung', function () {
    return view('cuahang/cuahangthittrung');
})->name('cuahangthittrung.');
Route::get('/traicay', function () {
    return view('cuahang/cuahangtraicay');
})->name('cuahangtraicay.');
Route::get('/raucu', function () {
    return view('cuahang/cuahangraucu');
})->name('cuahangraucu.');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard.');

Route::get('/admin/qladmin', function () {
    return view('admin.qladmin');
})->name('qladmin.');

// Route::get('/home', function () {
//     return view('QuanLy.home');
// });

// Route::get('/home', [InsertDB::class, 'get']);







Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/listing/{model}', [listingcontroller::class, 'index'])->name('listing.index');
Route::post('/admin/listing/{model}', [listingcontroller::class, 'index'])->name('listing.index');
Route::get('/admin/editing/{model}', [editingcontroller::class, 'create'])->name('editing.create');
Route::post('/admin/editing/{model}', [editingcontroller::class, 'store'])->name('editing.store');

Route::get('/home', [ProductController::class, 'index'])->name('home');

Route::group(['prefix'=> 'signup'], function(){
    Route::get('/', [HomeController::class, 'getSignup'])->name('dangky');
    Route::post('/', [HomeController::class, 'postSignup'])->name('store');
});

Route::group(['prefix'=> 'login'], function(){
    Route::get('/', [HomeController::class, 'getLogin'])->name('login');
    Route::post('/', [HomeController::class, 'postLogin']);
});

Route::get('logout', [HomeController::class, 'getLogout']);

Route::get('/admin/listing/user', [HomeController::class, 'getCustomer']);

Route::get('/cart', [HomeController::class, 'getCart'])->name('getcart');