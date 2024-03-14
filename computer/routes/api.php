<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MainCategoriesController;
use App\Http\Controllers\SubCategoriesController;
use App\Models\Customer;

use App\Http\Controllers\cusUserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route of Main Categories
Route::post('/ShowMainCate', [MainCategoriesController::class, 'ShowData']);
Route::post('/InsertMainCate', [MainCategoriesController::class, 'InsertData']);
Route::post('/DeleteMainCate', [MainCategoriesController::class, 'DeleteData']);
Route::post('/UpdateMainCate', [MainCategoriesController::class, 'UpdateData']);

// Route of Sub Categories
Route::post('/ShowSubCate', [SubCategoriesController::class, 'ShowData']);
Route::post('/InsertSubCate', [SubCategoriesController::class, 'InsertData']);
Route::post('/DeleteSubCate', [SubCategoriesController::class, 'DeleteData']);
Route::post('/UpdateSubCate', [SubCategoriesController::class, 'UpdateData']);

// Route of Customer_User
Route::post('/ShowCusUser', [cusUserController::class, 'ShowData']);
Route::post('/InsertCusUser', [cusUserController::class, 'InsertData']);
Route::post('/DeleteCusUser', [cusUserController::class, 'DeleteData']);
Route::post('/UpdateCusUser', [cusUserController::class, 'UpdateData']);

// Route of Customer
Route::post('/ShowCustomer', [CustomerController::class, 'ShowData']);
Route::post('/InsertCustomer', [CustomerController::class, 'InsertData']);
Route::post('/DeleteCustomer', [CustomerController::class, 'DeleteData']);
Route::post('/UpdateCustomer', [CustomerController::class, 'UpdateData']);



Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'loginApi'])->name('LoginApi');
Route::post('getProductJoinCateg',[ProductController::class, 'productJoinSubCateg']);
Route::post('getProductImg',[ProductController::class, 'getProductImage']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('getData',[AuthController::class, 'getData']);
    Route::post('addProduct',[ProductController::class, 'addProduct']);
    Route::post('getProduct',[ProductController::class, 'getData']);
});

// Route of Brand
Route::post('/ShowBrand', [BrandController::class, 'ShowData']);
Route::post('/InsertBrand', [BrandController::class, 'InsertData']);
Route::post('/DeleteBrand', [BrandController::class, 'DeleteData']);
Route::post('/UpdateBrand', [BrandController::class, 'UpdateData']);

