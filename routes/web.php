<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/admin', [CategoryController::class, 'index']);

Route::view('/admin/cat-new', 'admin.cat-new');

Route::post('/admin/cat-new', [CategoryController::class, 'add']);

Route::get('/admin/cat-edit/{id}', [CategoryController::class, 'edit']);

Route::post('/admin/cat-edit/{id}', [CategoryController::class, 'update']);

Route::get('/admin/cat-delete/{id}', [CategoryController::class, 'delete']);

Route::get('/admin/book-list', [BookController::class, 'index']);

Route::get('/admin/book-new', [BookController::class, 'create']);

Route::post('/admin/book-new', [BookController::class, 'add']);

Route::get('/admin/book-edit/{id}', [BookController::class, 'edit']);

Route::post('/admin/book-edit/{id}', [BookController::class, 'update']);

Route::get('/admin/book-delete/{id}', [BookController::class, 'delete']);

Route::get('/admin/order-list', [OrderController::class, 'view']);

Route::get('/admin/deliver/{id}', [OrderController::class, 'deliver']);

Route::view('/login', 'admin.login');

Route::post('/login', [OrderController::class, 'login']);

Route::get('/logout', [OrderController::class, 'logout']);

Route::get('/shop', [ShopController::class, 'index']);

Route::get('/shop/{id}', [ShopController::class, 'relate']);

Route::get('/shop/book-detail/{id}', [ShopController::class, 'detail']);

Route::get('/cart/add/{id}', [ShopController::class, 'add']);

Route::view('/cart', 'shop.view');

Route::get('/cart/remove/{id}', [ShopController::class, 'remove']);

Route::get('/cart/delete/{id}', [ShopController::class, 'delete']);

Route::post('/order', [ShopController::class, 'order']);
