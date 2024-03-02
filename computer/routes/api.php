<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\cusUserController;
use App\Http\Controllers\FavoriteCONTROLLER;
use App\Http\Controllers\FavoriteController as ControllersFavoriteController;
use App\Http\Controllers\MainCategoriesController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoriesController;
use App\Models\Cart;
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
Route::post('insertCus',[cusUserController::class, 'userInsert']);

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

// Route of Customer_User
Route::post('/ShowCustomer', [CustomerController::class, 'ShowData']);
Route::post('/InsertCustomer', [CustomerController::class, 'InsertData']);
Route::post('/DeleteCustomer', [CustomerController::class, 'DeleteData']);
Route::post('/UpdateCustomer', [CustomerController::class, 'UpdateData']);

// Route of Brand
Route::post('/ShowBrand', [BrandController::class, 'ShowData']);
Route::post('/InsertBrand', [BrandController::class, 'InsertData']);
Route::post('/DeleteBrand', [BrandController::class, 'DeleteData']);
Route::post('/UpdateBrand', [BrandController::class, 'UpdateData']);

// Route of Products
Route::post('/ShowProduct', [ProductController::class, 'ShowData']);
Route::post('/InsertProduct', [ProductController::class, 'InsertData']);
Route::post('/DeleteProduct', [ProductController::class, 'DeleteData']);
Route::post('/UpdateProduct', [ProductController::class, 'UpdateData']);

// Route of Order history
Route::post('/ShowOrderHistory', [OrderHistoryController::class, 'ShowData']);
Route::post('/InsertOrderHistory', [OrderHistoryController::class, 'InsertData']);
Route::post('/DeleteOrderHistory', [OrderHistoryController::class, 'DeleteData']);
Route::post('/UpdateOrderHistory', [OrderHistoryController::class, 'UpdateData']);

//Route of Favorite
Route::post('/ShowFav', [FavoriteController::class, 'ShowData']);
Route::post('/InsertFav', [FavoriteController::class, 'InsertData']);
Route::post('/DeleteFav', [FavoriteController::class, 'DeleteData']);
Route::post('/UpdateFav', [FavoriteController::class, 'UpdateData']);

//Route of Carts
Route::post('/ShowCart', [CartController::class, 'ShowData']);
Route::post('/InsertCart', [CartController::class, 'InsertData']);
Route::post('/DeleteCart', [CartController::class, 'DeleteData']);
Route::post('/UpdateCart', [CartController::class, 'UpdateData']);
