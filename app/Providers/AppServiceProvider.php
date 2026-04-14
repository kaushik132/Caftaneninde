<?php

namespace App\Providers;
use App\Models\CartItem;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            view()->composer('*', function ($view) {
        if (Auth::check()) {
            $cartCount    = CartItem::where('user_id', Auth::id())->sum('quantity');
            $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        } else {
            $cartCount    = 0;
            $wishlistCount = 0;
        }

        $view->with(compact('cartCount', 'wishlistCount'));
    });
    }
}
