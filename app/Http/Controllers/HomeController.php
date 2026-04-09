<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function products()
    {
        return view('products');
    }

    public function productDetails()
    {
        return view('product-details');
    }

    public function blogs()
    {
        return view('blogs');
    }

    public function blogDetails()
    {
        return view('blog-details');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function wishlist()
    {
        return view('wishlist');
    }

    public function account()
    {
        return view('account');
    }

    public function accountSettings()
    {
        return view('account-settings');
    }

    public function addresses()
    {
        return view('addresses');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function myOrders()
    {
        return view('my-orders');
    }


    public function orderConfirmed()
    {
        return view('order-confirmed');
    }

    public function orderTrack()
    {
        return view('order-track');
    }
}
