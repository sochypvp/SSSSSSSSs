<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Customer_user;
use App\Models\Main_categories;
use App\Models\Product;
use App\Models\Sub_categories;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Resources\pdImg\imgResource;
use App\Models\Brand;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Session;

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

//================== Home Page =====================================================================================
Route::get('/home', function () {
    $totalMainCateg = Main_categories::count();
    $mainCateg = Main_categories::all();
    $totalSubCateg = Sub_categories::count();
    $subCateg = Sub_categories::all();
    $totalBrand = Brand::count();
    $brand = Brand::all();
    return view('dashboard',
        [
            'mainCateg'=>[$totalMainCateg,$mainCateg],
            'subCateg'=>[$totalSubCateg,$subCateg],
            'brand'=>[$totalBrand,$brand]
        ]);
})->name('home');

//================= Product post Management ========================================================================
Route::get('/product', function () {
    $mainCategories = Main_categories::all();
    $subCategories = Sub_categories::all();
    $brand = Brand::all();
    $data = Product::all();
    $s =  imgResource::collection($data);
    if(Session::has('productsSearched')){
        $s = Session::get('productsSearched');
    }
    return view('product',['mainCategories'=>$mainCategories,'brand'=>$brand,'subCategories'=>$subCategories,'products'=> json_decode(json_encode($s,true))]);
})->name('product');

Route::get('product/add', function(){
    $subCategories = Sub_categories::all();
    $brand = Brand::all();
    return view('productsForm.addProduct',['brand'=>$brand,'subCategories'=>$subCategories]);
})->name('addProductForm');

Route::post('login',[AuthController::class, 'login'])->name('Login');


Route::post('addProduct',[ProductController::class, 'addProduct'])->name("addProduct");
Route::post('updateProduct',[ProductController::class, 'updateData'])->name('updateProduct');

Route::get('/deleteProduct/{id}',[ProductController::class, 'deleteData'])->name('delPdt');
Route::post('/productFilter',[ProductController::class, 'productFilter'])->name('productFilter');

//========================== Categories Route =======================================================================
Route::get('categories',function(){
    $totalMainCateg = Main_categories::count();
    $mainCateg = Main_categories::all();
    $totalSubCateg = Sub_categories::count();
    $subCateg = Sub_categories::all();
    $totalBrand = Brand::count();
    $brand = Brand::all();
    return view('categories',
        [
            'mainCateg'=>[$totalMainCateg,$mainCateg],
            'subCateg'=>[$totalSubCateg,$subCateg],
            'brand'=>[$totalBrand,$brand]
        ]);
})->name('categories');

Route::get('categories/subCateg',function(){
    $totalMainCateg = Main_categories::count();
    $mainCateg = Main_categories::all();
    $totalSubCateg = Sub_categories::count();
    $subCateg = Sub_categories::all();
    $totalBrand = Brand::count();
    $brand = Brand::all();
    return view('categories',
        [
            'mainCateg'=>[$totalMainCateg,$mainCateg],
            'subCateg'=>[$totalSubCateg,$subCateg],
            'brand'=>[$totalBrand,$brand]
        ]);
})->name('subCateg');

Route::post('/getSubCategByMain',[SubCategoriesController::class, 'getSubCategByMainCateg'])->name('getSubCategByMain');
