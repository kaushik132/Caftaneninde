<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\ProductVariant;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Seo;
use App\Models\ContactMessage;

class HomeController extends Controller
{
    public function index()
    {
        $homepage = Seo::select('seo_title_home', 'seo_des_home', 'seo_key_home')->first();
        $seo_data['seo_title'] = $homepage->seo_title_home;
        $seo_data['seo_description'] = $homepage->seo_des_home;
        $seo_data['keywords'] = $homepage->seo_key_home;
        $canocial = 'https://caftaneninde.com/';
        $homecategories = Category::where('is_active', true)
            ->with(['products' => fn($q) => $q->where('status', 'active')->with('primaryImage')->limit(8)])
            ->get();

        $products = Product::with(['category', 'primaryImage'])
            ->where('status', 'active')
            ->latest()
            ->limit(12)
            ->get();

        $swiperProducts = Product::with(['category', 'primaryImage'])
            ->where('status', 'active')
            ->where('is_featured', true)
            ->inRandomOrder()
            ->limit(10)
            ->get();



        $homeReviews = Review::with(['user', 'product'])
            ->where('is_approved', true)
            ->latest()
            ->limit(10)
            ->get();


        $avgHomeRating = round(Review::where('is_approved', true)->avg('rating'), 1);

        $totalHomeReviews = Review::where('is_approved', true)->count();


        return view('index', compact(
            'homecategories',
            'products',
            'swiperProducts',
            'homeReviews',
            'avgHomeRating',
            'totalHomeReviews',
            'seo_data',
            'canocial',
        ));
    }

    public function products(Request $request)
    {

        $homepage = Seo::select('seo_title_product', 'seo_des_product', 'seo_key_product')->first();
        $seo_data['seo_description'] = $homepage->seo_des_product;
        $seo_data['keywords'] = $homepage->seo_key_product;
        $seo_data['seo_title'] = $homepage->seo_title_product;
        $canocial = 'https://caftaneninde.com/products';
        // Categories — sidebar filter ke liye
        $categories = Category::where('is_active', true)->get();

        // Unique colors — sidebar color filter ke liye
        $colors = ProductVariant::select('color', 'color_hex')
            ->distinct()
            ->get()
            ->unique('color')
            ->values();

        // ── Base Query ────────────────────────────────────────────────────────────
        $query = Product::with(['category', 'primaryImage', 'variants'])
            ->where('status', 'active');  // hamesha sirf active products

        // ── Filter: Category ──────────────────────────────────────────────────────
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        // ── Filter: Price Range ───────────────────────────────────────────────────
        // max_price 1500 se kam ho tabhi filter lagao (1500 = "show all")
        if ($request->filled('max_price') && $request->max_price < 1500) {
            $query->where('price', '<=', $request->max_price);
        }

        // ── Filter: Size ──────────────────────────────────────────────────────────
        if ($request->filled('sizes')) {
            $query->whereHas('variants', function ($q) use ($request) {
                $q->whereIn('size', $request->sizes)
                    ->where('stock_quantity', '>', 0);
            });
        }

        // ── Filter: Color ─────────────────────────────────────────────────────────
        if ($request->filled('color')) {
            $query->whereHas('variants', function ($q) use ($request) {
                $q->where('color', $request->color);
            });
        }

        // ── Sort ──────────────────────────────────────────────────────────────────
        // NOTE: match ke bahar sort karo — default case mein orWhere filters tod deta tha
        $sort = $request->get('sort', 'featured');

        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'newest') {
            $query->latest();
        } else {
            // featured — is_featured=1 pehle, baqi baad mein
            $query->orderBy('is_featured', 'desc')->orderBy('id', 'desc');
        }

        // ── Paginate ──────────────────────────────────────────────────────────────
        $products = $query->paginate(12)->withQueryString();

        return view('products', compact('products', 'categories', 'colors', 'seo_data', 'canocial'));
    }
    public function productDetails($slug = null)
    {
        $product = Product::with([
            'category',
            'images'   => fn($q) => $q->orderBy('sort_order'),
            'variants',
            'reviews'  => fn($q) => $q->where('is_approved', true)->with('user')->latest(),
        ])
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $seo_data['seo_title'] = $product->seo_title_home;
        $seo_data['seo_description'] = $product->seo_des_home;
        $seo_data['keywords'] = $product->seo_key_home;
        $canocial = 'https://caftaneninde.com/product/' . $product->slug;

        $primaryImage    = $product->images->firstWhere('is_primary', true) ?? $product->images->first();

        $imagesByColor   = $product->images->groupBy('color')->map(
            fn($imgs) => $imgs->map(fn($img) => [
                'path'       => url('uploads/' . $img->image_path),
                'is_primary' => (bool) $img->is_primary,
            ])
        );

        $availableColors = $product->variants->unique('color')->values()->map(fn($v) => [
            'color'     => $v->color,
            'color_hex' => $v->color_hex,
        ]);

        $defaultColor = $availableColors->first()['color'] ?? null;

        $stockByColorSize = [];
        foreach ($product->variants as $v) {
            $stockByColorSize[$v->color][$v->size] = $v->stock_quantity;
        }

        $avgRating = round(optional($product->reviews)->avg('rating') ?? 0, 1);
        $reviewsCount = $product->reviews->count();
        $currentPrice = $product->sale_price ?? $product->price;

        // Related products — same category se, current product ko chhor ke
        $relatedProducts = Product::with(['primaryImage'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->limit(6)
            ->get();

        return view('product-details', compact(
            'product',
            'primaryImage',
            'imagesByColor',
            'availableColors',
            'defaultColor',
            'stockByColorSize',
            'avgRating',
            'reviewsCount',
            'currentPrice',
            'relatedProducts',
            'seo_data',
            'canocial',
        ));
    }

    public function blogs($slug = null)
    {
        $homepage = Seo::select('seo_title_blog', 'seo_des_blog', 'seo_key_blog')->first();
        if ($slug) {
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $blogs = Blog::with('category')
                ->where('blog_category_id', $category->id)
                ->where('is_published', true)
                ->latest()
                ->paginate(6);

            $seo_data['seo_description'] = $category->seo_description;
            $seo_data['keywords'] = $category->seo_keyword;
            $seo_data['seo_title'] = $category->seo_title;

            $canocial = 'https://www.caftaneninde.com/blogs/' . $slug;
        } else {
            $blogs = Blog::with('category')
                ->where('is_published', true)
                ->latest()
                ->paginate(6);
            $seo_data['seo_title'] = $homepage->seo_title_blog;
            $seo_data['seo_description'] = $homepage->seo_des_blog;
            $seo_data['keywords'] = $homepage->seo_key_blog;
            $canocial = 'https://www.caftaneninde.com/blogs';
        }
        return view('blogs', compact('blogs', 'seo_data', 'canocial'));
    }

    public function blogDetails($slug = null)
    {
        $blog = Blog::latest()->limit(3)->get();
        $blogData = Blog::with('category')->where('slug', $slug)->first();
                 $seo_data['seo_title'] =$blogData->seo_title;
            $seo_data['seo_description'] =$blogData->seo_description;
           $seo_data['keywords'] =$blogData->seo_keyword;
           $canocial ='https://codepin.org/blog-details/'.$slug;
        return view('blog-details', compact('blogData', 'blog', 'seo_data', 'canocial'));
    }

    public function contactUs()
    {
         $homepage = Seo::select('seo_title_contact', 'seo_des_contact', 'seo_key_contact')->first();
        $seo_data['seo_title'] = $homepage->seo_title_contact;
        $seo_data['seo_description'] = $homepage->seo_des_contact;
        $seo_data['keywords'] = $homepage->seo_key_contact;

        $canocial = 'https://www.caftaneninde.com/contact-us';
        // $user = auth()->user();
        return view('contact-us', compact('seo_data', 'canocial'));
    }


    public function sendMessage(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:100',
        'last_name'  => 'required|string|max:100',
        'email'      => 'required|email|max:255',
        'phone'      => 'nullable|string|max:20',
        'subject'    => 'required|string|max:255',
        'message'    => 'required|string|min:10|max:2000',
    ], [
        'first_name.required' => 'First name is required.',
        'last_name.required'  => 'Last name is required.',
        'email.required'      => 'Email address is required.',
        'email.email'         => 'Please enter a valid email.',
        'subject.required'    => 'Subject is required.',
        'message.required'    => 'Message is required.',
        'message.min'         => 'Message must be at least 10 characters.',
    ]);

    ContactMessage::create([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'email'      => $request->email,
        'phone'      => $request->phone,
        'subject'    => $request->subject,
        'message'    => $request->message,
        'status'     => 'unread',
    ]);

    // AJAX request hai
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent! We\'ll get back to you within 24 hours.',
        ]);
    }

    return back()->with('success', 'Your message has been sent! We\'ll get back to you within 24 hours.');
}



    public function wishlist()
    {
             $homepage = Seo::select('seo_title_wishlist', 'seo_des_wishlist', 'seo_key_wishlist')->first();
        $seo_data['seo_title'] = $homepage->seo_title_wishlist;
        $seo_data['seo_description'] = $homepage->seo_des_wishlist;
        $seo_data['keywords'] = $homepage->seo_key_wishlist;

        $canocial = 'https://www.caftaneninde.com/wishlist';

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to view your wishlist.');
        }

        $wishlistItems = Wishlist::with([
            'product' => fn($q) => $q->with(['primaryImage', 'variants']),
        ])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        $itemCount = $wishlistItems->count();

        return view('wishlist', compact('wishlistItems', 'itemCount', 'seo_data', 'canocial'));
    }



    public function cart()
    {

    $homepage = Seo::select('seo_title_cart', 'seo_des_cart', 'seo_key_cart')->first();
        $seo_data['seo_title'] = $homepage->seo_title_cart;
        $seo_data['seo_description'] = $homepage->seo_des_cart;
        $seo_data['keywords'] = $homepage->seo_key_cart;

        $canocial = 'https://www.caftaneninde.com/cart';
        $cartItems = CartItem::with([
            'product.primaryImage',
            'variant',
        ])
            ->where('user_id', auth()->id())
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            $price = $item->product->sale_price ?? $item->product->price;
            return $price * $item->quantity;
        });

        $taxRate  = 0.08;
        $tax      = round($subtotal * $taxRate, 2);
        $shipping = 0; // Free shipping
        $total    = round($subtotal + $tax + $shipping, 2);
        $itemCount = $cartItems->sum('quantity');

        return view('cart', compact(
            'cartItems',
            'subtotal',
            'tax',
            'shipping',
            'total',
            'itemCount',
            'seo_data',
            'canocial',
        ));
    }

    public function checkout()
    {
        $homepage = Seo::select('seo_title_checkout', 'seo_des_checkout', 'seo_key_checkout')->first();
        $seo_data['seo_title'] = $homepage->seo_title_checkout;
        $seo_data['seo_description'] = $homepage->seo_des_checkout;
        $seo_data['keywords'] = $homepage->seo_key_checkout;

        $canocial = 'https://www.caftaneninde.com/checkout';
        // Cart empty ho to cart page par bhejo
        $cartItems = \App\Models\CartItem::with([
            'product.primaryImage',
            'variant',
        ])
            ->where('user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(
            fn($item) => ($item->product->sale_price ?? $item->product->price) * $item->quantity
        );

        $taxRate  = 0.08;
        $tax      = round($subtotal * $taxRate, 2);
        $shipping = 0;
        $total    = round($subtotal + $tax + $shipping, 2);

        // Logged in user ka data pre-fill ke liye
        $user = auth()->user();

        return view('checkout', compact(
            'cartItems',
            'subtotal',
            'tax',
            'shipping',
            'total',
            'user',
            'seo_data',
            'canocial',
        ));
    }

    // public function myOrders()
    // {
    //     return view('my-orders');
    // }


    // public function orderConfirmed()
    // {
    //     return view('order-confirmed');
    // }

    // public function orderTrack()
    // {
    //     return view('order-track');
    // }


    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|max:1000',
        ]);

        // Prevent duplicate review
        $alreadyReviewed = Review::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->exists();

        if ($alreadyReviewed) {
            return back()->with('error', 'You already reviewed this product.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
            'is_approved' => true, // agar admin approval nahi chahiye
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }


    // ── Account Page ──────────────────────────────────────────────────────────────
    public function account()
    {
        $homepage = Seo::select('seo_title_account', 'seo_des_account', 'seo_key_account')->first();
        $seo_data['seo_title'] = $homepage->seo_title_account;
        $seo_data['seo_description'] = $homepage->seo_des_account;
        $seo_data['keywords'] = $homepage->seo_key_account;

        $canocial = 'https://www.caftaneninde.com/account';
        $user = auth()->user();

        // Orders with items
        $orders = Order::with(['items.product.primaryImage', 'items.variant'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $allCount      = $orders->count();
        $activeCount   = $orders->whereIn('status', ['pending', 'confirmed', 'shipped'])->count();
        $completeCount = $orders->whereIn('status', ['delivered'])->count();

        // Wishlist
        $wishlistItems = Wishlist::with(['product.primaryImage', 'product.variants'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        // Shipping addresses
        $addresses = ShippingAddress::where('user_id', $user->id)
            ->latest()
            ->get();

        return view('account', compact(
            'user',
            'orders',
            'allCount',
            'activeCount',
            'completeCount',
            'wishlistItems',
            'addresses',
            'seo_data',
            'canocial',
        ));
    }

    // ── Update Profile (AJAX POST /account/profile) ───────────────────────────
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:20',
        ]);

        auth()->user()->update(
            $request->only(['name', 'email', 'phone'])
        );

        return response()->json(['success' => true, 'message' => 'Profile updated successfully!']);
    }
    // ── Update Password (AJAX POST /account/password) ─────────────────────────
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'          => 'required',
            'new_password'              => 'required|min:8',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect.',
            ], 422);
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json(['success' => true, 'message' => 'Password updated successfully!']);
    }

    // ── Cancel Order (AJAX POST /account/orders/{id}/cancel) ─────────────────
    public function cancelOrder($id)
    {
        $order = Order::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'confirmed'])
            ->find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order cannot be cancelled.',
            ], 422);
        }

        $order->update(['status' => 'cancelled']);

        return response()->json(['success' => true, 'message' => 'Order cancelled successfully.']);
    }
}
