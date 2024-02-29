<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Customer_user;
use App\Models\Main_categories;
use App\Models\Product;
use App\Models\Sub_categories;
use App\Http\Controllers\ProductController;
use App\Models\ProductImages;

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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::get('/product', function () {
    $mainCategories = Main_categories::all();
    $subCategories = Sub_categories::all();
    $products = Product::all();
    $image = ProductImages::all();
    return view('product',['mainCategories'=>$mainCategories,'subCategories'=>$subCategories,'products'=>$products,'pdImage'=>$image]);
})->name('product');

Route::post('login',[AuthController::class, 'login'])->name('Login');


Route::post('addProduct',[ProductController::class, 'addProduct'])->name("addProduct");
