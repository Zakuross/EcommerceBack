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
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories/{id}', [CategoryController::class, 'update']);
    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);

    Route::post('services', [ServiceController::class, 'store']);
    Route::put('services/{id}', [ServiceController::class, 'update']);
    Route::delete('services/{id}', [ServiceController::class, 'destroy']);

    Route::post('blogs', [BlogController::class, 'store']);
    Route::put('blogs/{id}', [BlogController::class, 'update']);
    Route::delete('blogs/{id}', [BlogController::class, 'destroy']);

    Route::post('product_user', [CommentController::class, 'store']);
    Route::put('product_user/{id}', [CommentController::class, 'update']);
    Route::delete('product_user/{id}', [CommentController::class, 'destroy']);

    Route::post('orders', [OrderController::class, 'store']);
    Route::put('orders/{id}', [OrderController::class, 'update']);
    Route::delete('orders/{id}', [OrderController::class, 'destroy']);








});

// Public routes Authentication
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


// Public routes Product
Route::controller(ProductController::class)->group(function (){
    Route::get('products', 'index');
    Route::get('products/{id}', 'show');
});


// Public routes Category
Route::controller(CategoryController::class)->group(function (){
    Route::get('categories', 'index');
    Route::get('categories/{id}', 'show');
});


// Public routes User
Route::controller(UserController::class)->group(function (){
    Route::get('users', 'index');
    Route::get('users/{id}', 'show');
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
});




// Public routes Service
Route::controller(ServiceController::class)->group(function (){
    Route::get('services', 'index');
    Route::get('services/{id}', 'show');
});




// Public routes Blog
Route::controller(BlogController::class)->group(function (){
    Route::get('blogs', 'index');
    Route::get('blogs/{id}', 'show');
});




// Public routes Comment
Route::controller(CommentController::class)->group(function (){
    Route::get('product_user', 'index');
    Route::get('product_user/{id}', 'show');
});




// Public routes Order
Route::controller(OrderController::class)->group(function (){
    Route::get('orders', 'index');
    Route::get('orders/{id}','show');
});




