<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'checkLogin'])->name('checkLogin');
Route::post('/register', [App\Http\Controllers\Api\LoginController::class, 'checkregister'])->name('checkregister');

Route::post('product',[App\Http\Controllers\Api\ProductController::class,'store'])->name('product.store');
Route::get('product',[App\Http\Controllers\Api\ProductController::class,'index'])->name('product.index');

Route::get('/viewdetails/{id?}',[App\Http\Controllers\Api\ProductController::class,'productDetails']);


