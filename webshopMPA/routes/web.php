<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


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
Route::get('/category/{category_id}', [CategoryContoller::class, 'getAllProductsFromCategory']);

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/
Route::get('/products', [ProductController::class, 'getAllProducts'])->name('products');
Route::get('/product/{product_id}', [ProductController::class, 'getProduct']);

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/
Route::get('/cart', [CartController::class, 'getAllProductsFromCart'])->name('cart');
Route::get('/addToCart/{product}', [CartController::class, 'addProductToCart']);
Route::get('/removeFromCart/{product_id}', [CartController::class, 'removeProductFromCart']);
Route::get('/reduceProductByOne/{product}', [CartController::class, 'reduceProductByOneInCart']);
