<?php

use App\Http\Controllers\cusUserController;
use App\Http\Controllers\MainCategoriesController;
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
Route::post('/dataMainCate', [MainCategoriesController::class, 'ShowMainCate']);
Route::post('/AddMainCate', [MainCategoriesController::class, 'InsertData']);
Route::post('/DeleteMainCate', [MainCategoriesController::class, 'DeleteData']);
Route::post('/UpdateMainCate', [MainCategoriesController::class, 'UpdateData']);
