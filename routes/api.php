<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ServiceController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//
//
//});

Route::get('login', [AuthController::class, 'login']);


Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('products', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);


Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::get('services', [ServiceController::class, 'index']);
Route::get('services/{id}', [ServiceController::class, 'show']);
Route::post('services', [ServiceController::class, 'store']);
Route::put('services/{id}', [ServiceController::class, 'update']);
Route::delete('services/{id}', [ServiceController::class, 'destroy']);

Route::get('blogs', [BlogController::class, 'index']);
Route::get('blogs/{id}', [BlogController::class, 'show']);
Route::post('blogs', [BlogController::class, 'store']);
Route::put('blogs/{id}', [BlogController::class, 'update']);
Route::delete('blogs/{id}', [BlogController::class, 'destroy']);

Route::get('product_user', [CommentController::class, 'index']);
Route::get('product_user/{id}', [CommentController::class, 'show']);
Route::post('product_user', [CommentController::class, 'store']);
Route::put('product_user/{id}', [CommentController::class, 'update']);
Route::delete('product_user/{id}', [CommentController::class, 'destroy']);

Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{id}', [OrderController::class, 'show']);
Route::post('orders', [OrderController::class, 'store']);
Route::put('orders/{id}', [OrderController::class, 'update']);
Route::delete('orders/{id}', [OrderController::class, 'destroy']);


