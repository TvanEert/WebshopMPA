<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


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

/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [CategoryContoller::class, 'getAllCategories'])->name('home');
Route::get('/category/{category}', [CategoryContoller::class, 'getAllProductsFromCategory']);

/* 
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

Route::get('/products', [ProductController::class, 'getAllProducts'])->name('products');
Route::get('/product/{product}', [ProductController::class, 'getProduct']);

/*
|--------------------------------------------------------------------------
| Order Routes
|--------------------------------------------------------------------------
*/

Route::get('/confirmOrder', [OrderController::class, 'confirmOrder']);
Route::get('/orders', [OrderController::class, 'getCurrentUserOrders'])->name('orders');

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'getAllProductsFromCart'])->name('cart');
Route::get('/addToCart/{product}', [CartController::class, 'addProductToCart']);
Route::get('/removeFromCart/{product}', [CartController::class, 'removeProductFromCart']);
Route::get('/reduceProductByOne/{product}', [CartController::class, 'reduceProductByOneInCart']);

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Auth::routes();
