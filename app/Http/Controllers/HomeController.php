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
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
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
            'totalHomeReviews'
        ));
    }

    public function products(Request $request)
    {
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

        return view('products', compact('products', 'categories', 'colors'));
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
        ));
    }

    public function blogs($slug = null)
    {
        if ($slug) {
            $category = BlogCategory::where('slug', $slug)->firstOrFail();
            $blogs = Blog::with('category')
                ->where('blog_category_id', $category->id)
                ->where('is_published', true)
                ->latest()
                ->paginate(6);
        } else {
            $blogs = Blog::with('category')
                ->where('is_published', true)
                ->latest()
                ->paginate(6);
        }
        return view('blogs', compact('blogs'));
    }

    public function blogDetails($slug = null)
    {
        $blog = Blog::latest()->limit(3)->get();
        $blogData = Blog::with('category')->where('slug', $slug)->first();
        //          $seo_data['seo_title'] =$blogData->seo_title;
        //     $seo_data['seo_description'] =$blogData->seo_description;
        //    $seo_data['keywords'] =$blogData->seo_keyword;
        //    $canocial ='https://codepin.org/blog-details/'.$slug;
        return view('blog-details', compact('blogData', 'blog'));
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function wishlist()
    {
        // Login check — guest hai to login page par bhejo
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

        return view('wishlist', compact('wishlistItems', 'itemCount'));
    }
    public function account()
    {
        return view('account');
    }



    public function cart()
    {
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
            'itemCount'
        ));
    }

    public function checkout()
    {
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
        ));
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
}
