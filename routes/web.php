<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ── Public Routes ─────────────────────────────────────────────────────────────

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product-details/{slug?}', [HomeController::class, 'productDetails'])->name('product-details');
Route::get('/blogs/{slug?}', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blog-details/{slug?}', [HomeController::class, 'blogDetails'])->name('blog-details');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');

// ── Auth Routes ───────────────────────────────────────────────────────────────

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ── Auth Required Routes ──────────────────────────────────────────────────────

Route::middleware('auth')->group(function () {

    // Pages
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
    Route::get('/account', [HomeController::class, 'account'])->name('account');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/my-orders', [HomeController::class, 'myOrders'])->name('my-orders');
    Route::get('/order-confirmed', [HomeController::class, 'orderConfirmed'])->name('order-confirmed');
    Route::get('/order-track', [HomeController::class, 'orderTrack'])->name('order-track');

    // Cart AJAX
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Wishlist AJAX
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

    // Checkout POST — Order place karo
    Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.post');

    Route::post('/product/{id}/review', [HomeController::class, 'storeReview'])->name('product.review.store');
});
