@extends('layout.dashboard.main')
@section('content')

{{-- ── Hero ──────────────────────────────────────────────────────────────── --}}
<section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] overflow-hidden">
    <div class="text-center px-10 lg:px-0">
        <h2 class="font-semibold lg:text-[38px] text-[20px]">My Wishlist</h2>
        <p class="font-medium text-[12px] lg:-mt-1">
            {{ $itemCount }} {{ Str::plural('item', $itemCount) }} saved for later
        </p>
    </div>
    <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-0 pointer-events-none" src="{{ asset('images/left-leave.png') }}" alt="">
    <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-0 pointer-events-none" src="{{ asset('images/right-leave.png') }}" alt="">
</section>

{{-- ── Wishlist Grid ────────────────────────────────────────────────────────── --}}
<section class="lg:px-12 px-4 lg:py-10 py-6">

    @if($wishlistItems->count() > 0)

        <div class="grid lg:grid-cols-3 grid-cols-2 lg:gap-12 gap-3" id="wishlistGrid">

            @foreach($wishlistItems as $item)
                @php
                    $product = $item->product;
                    $thumb   = $product->primaryImage;
                    $price   = $product->sale_price ?? $product->price;
                    $colors  = $product->variants->unique('color')->values();
                @endphp

                <div class="wishlist-card col-span-1 group" id="wishlist-item-{{ $item->id }}" data-wishlist-id="{{ $item->id }}">
                    <div class="bg-white lg:rounded-xl rounded-md shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden">

                        {{-- Remove Button --}}
                        <div class="absolute top-3 right-3 z-30">
                            <button onclick="removeFromWishlist({{ $product->id }}, {{ $item->id }})"
                                    class="remove-item text-[14px] cursor-pointer bg-white text-gray-400 hover:text-red-500 flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px] shadow-sm transition-colors"
                                    title="Remove from wishlist">
                                <i class="fa-solid fa-xmark text-[12px] lg:text-[15px]"></i>
                            </button>
                        </div>

                        {{-- Image --}}
                        <div class="relative overflow-hidden">
                            <img src="{{ $thumb ? url('uploads/' . $thumb->image_path) : 'https://via.placeholder.com/400x350?text=No+Image' }}"
                                 alt="{{ $product->name }}"
                                 class="lg:rounded-t-xl rounded-t-md lg:h-[350px] h-[150px] !w-full object-cover object-top transition-transform duration-500 group-hover:scale-105">

                            {{-- Badge --}}
                            @if($product->badge)
                                <div class="top-3 left-3 absolute z-10">
                                    <p class="text-white px-2 py-1 bg-[#FF71A8] text-[10px] lg:text-[11px] font-medium rounded-sm shadow-sm">
                                        {{ $product->badge }}
                                    </p>
                                </div>
                            @endif

                            {{-- Out of Stock overlay --}}
                            @if(!$product->in_stock)
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                    <span class="bg-white text-red-500 font-bold text-[12px] px-3 py-1 rounded-md">Out of Stock</span>
                                </div>
                            @endif

                            {{-- View Details Button --}}
                            <div class="absolute lg:bottom-5 bottom-2 lg:px-6 px-3 w-full">
                                <a href="{{ route('product-details', $product->slug) }}"
                                   class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white hover:bg-black transition-colors shadow-lg">
                                    View Details
                                </a>
                            </div>
                        </div>

                        {{-- Info --}}
                        <div class="lg:p-4 p-3">
                            <p class="text-[11px] text-[#FF71A8] font-medium mb-0.5">{{ $product->category->name ?? '' }}</p>
                            <h3 class="lg:text-[15px] text-[12px] font-medium text-gray-800 truncate">{{ $product->name }}</h3>

                            {{-- Color dots --}}
                            @if($colors->count() > 0)
                                <ul class="flex gap-1 mt-1">
                                    @foreach($colors->take(4) as $variant)
                                        <li class="lg:h-4 lg:w-4 w-3 h-3 rounded-full border border-gray-100"
                                            style="background-color: {{ $variant->color_hex }}"
                                            title="{{ $variant->color }}">
                                        </li>
                                    @endforeach
                                    @if($colors->count() > 4)
                                        <li class="lg:text-[11px] text-[10px] text-gray-400 font-medium flex items-center">+{{ $colors->count() - 4 }}</li>
                                    @endif
                                </ul>
                            @endif

                            {{-- Price --}}
                            <div class="flex items-center gap-2 mt-1.5">
                                <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-bold" data-usd="{{ number_format($price, 2) }}">${{ number_format($price, 2) }}</h3>
                                @if($product->sale_price)
                                    <h3 class="text-gray-400 lg:text-[13px] text-[11px] line-through" data-usd="{{ number_format($product->price, 2) }}">${{ number_format($product->price, 2) }}</h3>
                                @endif
                            </div>

                            {{-- Add to Cart button --}}
                            @if($product->in_stock)
                                <button onclick="quickAddToCart({{ $product->id }}, this)"
                                        class="mt-2 w-full border border-[#FF71A8] text-[#FF71A8] hover:bg-[#FF71A8] hover:text-white transition text-[11px] lg:text-[13px] font-medium py-1.5 rounded-md">
                                    Add to Cart
                                </button>
                            @else
                                <button disabled class="mt-2 w-full border border-gray-200 text-gray-300 text-[11px] lg:text-[13px] font-medium py-1.5 rounded-md cursor-not-allowed">
                                    Out of Stock
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

    @else
        {{-- Empty State --}}
        <div class="flex flex-col items-center justify-center py-20 text-center" id="emptyState">
            <div class="w-24 h-24 bg-[#FFE1ED] rounded-full flex items-center justify-center mx-auto mb-5">
                <i class="fa-regular fa-heart text-[#FF71A8] text-4xl"></i>
            </div>
            <h3 class="text-[20px] font-semibold text-gray-700">Your wishlist is empty</h3>
            <p class="text-gray-400 text-[14px] mt-2 max-w-xs">Save your favourite products here and shop them later.</p>
            <a href="{{ route('products') }}"
               class="mt-6 bg-[#FF71A8] text-white px-8 py-3 rounded-md text-[14px] font-bold hover:bg-black transition">
                Browse Products
            </a>
        </div>
    @endif

</section>

{{-- ── Looking For More ─────────────────────────────────────────────────────── --}}
@if($wishlistItems->count() > 0)
<section class="lg:px-12 px-4 pt-3 pb-10">
    <div class="bg-[#FFE1ED] px-5 lg:px-0 lg:rounded-2xl rounded-md lg:py-10 py-7 text-center">
        <img class="lg:w-[70px] w-[50px] mx-auto" src="{{ asset('images/stars.png') }}" alt="">
        <h2 class="font-medium lg:text-[22px] text-[18px] mt-1">Looking for More?</h2>
        <p class="lg:text-[15px] text-[12px] font-medium -mt-0.5">Explore our full collection to discover more stunning gowns.</p>
        <div class="lg:mt-7 mt-5">
            <a href="{{ route('products') }}" class="bg-[#FF71A8] lg:px-10 px-6 py-2.5 text-white text-[13px] lg:text-[15px] font-medium inline-block rounded-sm hover:bg-black transition">
                Browse all products
            </a>
            {{-- <a href="{{ route('categories.index') }}" class="bg-white ml-2 lg:px-10 px-6 py-2.5 text-[#FF71A8] text-[13px] lg:text-[15px] font-medium inline-block rounded-sm hover:bg-[#FFE1ED] transition">
                View Categories
            </a> --}}
        </div>
    </div>
</section>
@endif

{{-- ── JavaScript ───────────────────────────────────────────────────────────── --}}
<script>
    const csrfToken    = "{{ csrf_token() }}";
    const wishlistUrl  = "{{ route('wishlist.toggle') }}";
    const cartStoreUrl = "{{ route('cart.store') }}";

    // ── Remove from Wishlist ──────────────────────────────────────────────────
    function removeFromWishlist(productId, wishlistItemId) {
        fetch(wishlistUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify({ product_id: productId }),
        })
        .then(res => res.json())
        .then(data => {
            // Card animate kar ke remove karo
            const card = document.getElementById('wishlist-item-' + wishlistItemId);
            if (card) {
                card.style.transition = 'all 0.3s ease';
                card.style.opacity    = '0';
                card.style.transform  = 'scale(0.9)';
                setTimeout(() => {
                    card.remove();
                    updateCount();
                }, 300);
            }
            showToast('Removed from wishlist.');
        })
        .catch(() => showToast('Something went wrong.', 'warning'));
    }

    // ── Count update after removal ────────────────────────────────────────────
    function updateCount() {
        const remaining = document.querySelectorAll('.wishlist-card').length;

        // Hero mein count update
        const countEl = document.querySelector('.wishlist-count');
        if (countEl) countEl.textContent = remaining + ' ' + (remaining === 1 ? 'item' : 'items') + ' saved for later';

        // Agar sab remove ho gaye to empty state dikho
        if (remaining === 0) {
            const grid = document.getElementById('wishlistGrid');
            if (grid) {
                grid.innerHTML = `
                    <div class="col-span-2 lg:col-span-3 flex flex-col items-center justify-center py-20 text-center">
                        <div class="w-24 h-24 bg-[#FFE1ED] rounded-full flex items-center justify-center mx-auto mb-5">
                            <i class="fa-regular fa-heart text-[#FF71A8] text-4xl"></i>
                        </div>
                        <h3 class="text-[20px] font-semibold text-gray-700">Your wishlist is empty</h3>
                        <p class="text-gray-400 text-[14px] mt-2">Save your favourite products and shop them later.</p>
                        <a href="{{ route('products') }}" class="mt-6 bg-[#FF71A8] text-white px-8 py-3 rounded-md text-[14px] font-bold hover:bg-black transition">
                            Browse Products
                        </a>
                    </div>`;
            }
        }
    }

    // ── Quick Add to Cart ─────────────────────────────────────────────────────
    // Note: Wishlist se direct cart mein add — default pehla variant use hoga
    // User product detail page par ja ke specific size/color choose kar sakta hai
    function quickAddToCart(productId, btn) {
        btn.disabled     = true;
        btn.textContent  = 'Adding...';

        fetch(cartStoreUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify({ product_id: productId, quantity: 1 }),
        })
        .then(res => res.json())
        .then(data => {
            btn.disabled    = false;
            btn.textContent = 'Add to Cart';
            if (data.success) {
                const cartCount = document.getElementById('cartCount');
                if (cartCount) cartCount.textContent = data.cart_count;
                showToast('Added to cart!');
            } else {
                // Size/color select karni hai — product page par bhejo
                showToast(data.message ?? 'Please select size from product page.', 'info');
            }
        })
        .catch(() => {
            btn.disabled    = false;
            btn.textContent = 'Add to Cart';
            showToast('Please select size from product page.', 'info');
        });
    }

    // ── Toast ─────────────────────────────────────────────────────────────────
    function showToast(msg, type = 'success') {
        let toast = document.getElementById('toastMsg');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'toastMsg';
            document.body.appendChild(toast);
        }

        const colors = {
            success: '#FF71A8',
            warning: '#ef4444',
            info: '#3b82f6'
        };

        toast.className = 'fixed bottom-6 right-6 px-5 py-3 rounded-xl text-[13px] font-medium z-[9999] text-white shadow-lg transition-all duration-300';
        toast.style.backgroundColor = colors[type] || colors.success;
        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';
        toast.style.pointerEvents = 'none';
        toast.textContent = msg;

        clearTimeout(window._toastTimer);
        window._toastTimer = setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(10px)';
        }, 2500);
    }

</script>

@endsection
