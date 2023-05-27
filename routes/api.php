<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserCommentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/products', ProductController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::resource('/category', CategoryController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::get('/product-category/{category_id}', [ProductController::class, 'categoryID']);
Route::get('/product/search', [ProductController::class, 'search']);
Route::resource('/orders', OrderController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::resource('/user_comment', UserCommentController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::post('/order-status/{id}', [OrderController::class, 'updateStatus']);
//auth
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});