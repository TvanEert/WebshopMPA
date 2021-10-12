<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryContoller;

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
Route::get('/', [CategoryContoller::class, 'getAllCategories']);

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/


