<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products',[HomeController::class, 'products'])->name('products');
Route::get('/product-details',[HomeController::class, 'productDetails'])->name('product-details');
Route::get('/blogs',[HomeController::class, 'blogs'])->name('blogs');
Route::get('/blog-details',[HomeController::class, 'blogDetails'])->name('blog-details');
Route::get('/contact-us',[HomeController::class, 'contactUs'])->name('contact-us');
Route::get('/wishlist',[HomeController::class, 'wishlist'])->name('wishlist');
Route::get('/account',[HomeController::class, 'account'])->name('account');
Route::get('/account-settings',[HomeController::class, 'accountSettings'])->name('account-settings');
Route::get('/addresses',[HomeController::class, 'addresses'])->name('addresses');
Route::get('/cart',[HomeController::class, 'cart'])->name('cart');
Route::get('/checkout',[HomeController::class, 'checkout'])->name('checkout');
Route::get('/my-orders',[HomeController::class, 'myOrders'])->name('my-orders');
Route::get('/order-confirmed',[HomeController::class, 'orderConfirmed'])->name('order-confirmed');
Route::get('/order-track',[HomeController::class, 'orderTrack'])->name('order-track');

