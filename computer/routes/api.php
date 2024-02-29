<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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









































Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'loginApi'])->name('LoginApi');
Route::post('getProductJoinCateg',[ProductController::class, 'productJoinSubCateg']);
Route::post('getProductImg',[ProductController::class, 'getProductImage']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('getData',[AuthController::class, 'getData']);
    Route::post('addProduct',[ProductController::class, 'addProduct'])->name("addProduct");
    Route::post('getProduct',[ProductController::class, 'getData']);
});
