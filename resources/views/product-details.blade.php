@extends('layout.dashboard.main')
@section('content')

    {{-- Breadcrumb --}}
    <div class="bg-[#FFF5F8] lg:py-5 py-3 px-4 lg:px-12 border-b border-[#FF71A8]/10">
        <div class="flex items-center gap-2 lg:text-[14px] text-[12px] font-medium">
            <a href="{{ url('/') }}"
                class="text-gray-500 hover:text-[#FF71A8] transition-colors flex items-center gap-2">
                <i class="fa-solid fa-house text-[12px]"></i> Home
            </a>
            <span class="text-gray-400"><i class="fa-solid fa-chevron-right text-[10px]"></i></span>
            <a href="{{ url('products') }}" class="text-gray-500 hover:text-[#FF71A8] transition-colors">Product</a>
            <span class="text-gray-400"><i class="fa-solid fa-chevron-right text-[10px]"></i></span>
            <span class="text-[#FF71A8] truncate max-w-[150px] lg:max-w-none">{{ $product->name }}</span>
        </div>
    </div>

    <section class="lg:px-12 px-4 py-5">
        <div>
            <a href="{{ url('products') }}" class="lg:text-[14px] text-[13px] font-medium hover:text-[#FF71A8] transition">
                <i class="fa-solid fa-arrow-left mr-1"></i> Back
            </a>
        </div>

        <div class="mt-5 grid lg:grid-cols-5 grid-cols-1 lg:gap-7 gap-10">

            {{-- LEFT — Image Gallery --}}
            <div class="lg:col-span-2">
                <div id="zoomContainer"
                    class="lg:h-[550px] h-[400px] relative overflow-hidden cursor-zoom-in border rounded-md bg-gray-50">
                    <img id="mainImage"
                        class="w-full h-full object-cover rounded-md transition-transform duration-300 origin-center"
                        src="{{ $primaryImage ? url('uploads/' . $primaryImage->image_path) : 'https://via.placeholder.com/800x600' }}"
                        alt="{{ $product->name }}">
                    @if ($product->badge)
                        <span
                            class="bg-[#FF71A8] top-4 left-5 absolute text-white text-[10px] lg:text-[11px] font-medium px-4 py-1 rounded-md z-10">
                            {{ $product->badge }}
                        </span>
                    @endif
                </div>

                {{-- Thumbnails — FIX 3: onclick seedha lagaya, JS dependency nahi --}}
                <div class="flex lg:gap-5 gap-3 mt-3 lg:mt-5" id="thumbnailContainer">
                    @foreach ($product->images->where('color', $defaultColor) as $index => $image)
                        <div onclick="setMainImage('{{ url('uploads/' . $image->image_path) }}', this)"
                            class="w-[33%] thumb-box rounded-md p-1 transition-all cursor-pointer
                                    {{ $index === 0 ? 'border-2 border-[#FF71A8]' : 'border-2 border-transparent opacity-60' }}">
                            <img class="product-thumb lg:h-[160px] h-[100px] w-full rounded-md object-cover lg:object-top"
                                src="{{ url('uploads/' . $image->image_path) }}" alt="Thumbnail {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- RIGHT — Product Info --}}
            <div class="lg:col-span-3">

                {{-- Category + Name --}}
                <div>
                    <p class="text-[#FF71A8] lg:text-[14px] text-[12px] font-medium">{{ $product->category->name ?? '' }}
                    </p>
                    <h2 class="lg:text-[32px] text-[19px] font-semibold">{{ $product->name }}</h2>
                </div>

                {{-- Rating --}}
                <div class="flex gap-4 items-end">
                    <ul class="mt-1 flex gap-1 lg:text-[14px] text-[11px]">
                        @for ($i = 1; $i <= 5; $i++)
                            <li><i
                                    class="fa-solid fa-star {{ $i <= round($avgRating) ? 'text-[#FF71A8]' : 'text-[#D9D9D9]' }}"></i>
                            </li>
                        @endfor
                    </ul>
                    <p class="lg:text-[13px] text-[11px] font-medium text-[#333333]">{{ $avgRating }}
                        ({{ $reviewsCount }} reviews)</p>
                    <a href="#reviews"
                        class="font-medium lg:text-[13px] text-[11px] border-b border-dotted border-black hover:text-[#FF71A8]">Add
                        Review</a>
                </div>

                {{-- Price + Stock --}}
                <div class="lg:mt-4 mt-3 flex gap-4 items-end">
                    @if ($product->sale_price)
                        <h2 class="lg:text-[24px] text-[18px] font-medium text-[#FF71A8]">
                            ${{ number_format($product->sale_price, 2) }}</h2>
                        <h2 class="lg:text-[18px] text-[14px] font-medium line-through text-gray-400">
                            ${{ number_format($product->price, 2) }}</h2>
                    @else
                        <h2 class="lg:text-[24px] text-[18px] font-medium">${{ number_format($product->price, 2) }}</h2>
                    @endif
                    <span id="stockBadge"
                        class="text-[#08B302] bg-[#D2FFD1] font-medium lg:text-[13px] text-[10px] rounded-md px-4 py-1.5">In
                        Stock</span>
                </div>

                {{-- Description --}}
                <div class="lg:mt-4 mt-3 border-[#DEDEDE] border-b pb-5">
                    <p class="font-medium lg:text-[14px] text-[11px] text-gray-600">{{ $product->description }}</p>
                </div>

                {{-- Color Picker --}}
                <div class="mt-4">
                    <p class="lg:text-[15px] text-[13px] font-medium">Color: <span
                            id="colorLabel">{{ $defaultColor }}</span></p>
                    <ul class="mt-2 flex gap-2" id="colorPicker">
                        @foreach ($availableColors as $index => $colorData)
                            <li class="color-dot lg:w-8 w-6 lg:h-8 h-6 rounded-full cursor-pointer border-2 border-white {{ $index === 0 ? 'ring-2 ring-[#FF71A8]' : '' }}"
                                style="background-color: {{ $colorData['color_hex'] }}"
                                data-color="{{ $colorData['color'] }}" title="{{ $colorData['color'] }}">
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Size --}}
                <div class="mt-7">
                    <p class="lg:text-[15px] text-[13px] font-medium">Size:</p>
                    <ul id="sizeList" class="flex flex-wrap mt-2 gap-2">
                        @foreach (['XS', 'S', 'M', 'L', 'XL'] as $index => $size)
                            @if (isset($stockByColorSize[$defaultColor][$size]))
                                @php $stock = $stockByColorSize[$defaultColor][$size]; @endphp
                                <li onclick="{{ $stock > 0 ? 'selectSize(this, \'' . $size . '\', ' . $stock . ')' : '' }}"
                                    class="size-btn lg:text-[14px] text-[12px] border-[#FF71A8] border rounded-md lg:px-7 px-4 py-2 font-medium transition-all
                                           {{ $index === 0 && $stock > 0 ? 'active bg-[#FF71A8] text-white' : 'text-[#FF71A8] cursor-pointer' }}
                                           {{ $stock === 0 ? 'opacity-40 cursor-not-allowed line-through' : '' }}"
                                    data-size="{{ $size }}" data-stock="{{ $stock }}">
                                    {{ $size }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <p id="stockText" class="text-[12px] mt-2 text-gray-500"></p>
                </div>

                {{-- Quantity --}}
                <div class="mt-5 border-[#DEDEDE] border-b pb-6">
                    <p class="lg:text-[15px] text-[13px] font-medium">Quantity:</p>
                    <div class="mt-2 flex gap-5 items-center">
                        <button onclick="changeQty(-1)"
                            class="border-[#FF71A8] border cursor-pointer text-[#FF71A8] px-3 py-1.5 rounded-md hover:bg-[#FF71A8] hover:text-white transition">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span id="qtyValue" class="font-bold text-lg w-6 text-center">1</span>
                        <button onclick="changeQty(1)"
                            class="border-[#FF71A8] border cursor-pointer text-[#FF71A8] px-3 py-1.5 rounded-md hover:bg-[#FF71A8] hover:text-white transition">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-6 w-full md:w-[70%]">
                    <div class="flex gap-3">
                        <button onclick="addToCart()" data-product-id="{{ $product->id }}" id="addToCartBtn"
                            class="flex-1 bg-[#FF71A8] hover:bg-black text-white font-bold py-3.5 rounded-md shadow-md transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-cart-shopping text-sm"></i>
                            <span>Add to cart</span>
                        </button>

                        <button onclick="toggleWishlist({{ $product->id }})"
                            class="border border-[#FF71A8] text-[#FF71A8] hover:bg-[#FF71A8] hover:text-white transition-all w-[55px] h-[55px] rounded-md flex items-center justify-center cursor-pointer">
                            <i id="heartIcon" class="fa-regular fa-heart text-xl transition-all duration-300"></i>
                        </button>

                        <button onclick="toggleShareModal(true)"
                            class="border border-[#FF71A8] text-[#FF71A8] hover:bg-[#FF71A8] hover:text-white transition-all w-[55px] h-[55px] rounded-md flex items-center justify-center cursor-pointer">
                            <i class="fa-solid fa-share-nodes text-xl"></i>
                        </button>
                    </div>

                    {{-- Share Modal --}}
                    <div id="shareModal"
                        class="fixed inset-0 bg-black/50 z-[10000] hidden items-center justify-center px-4">
                        <div class="bg-white w-full max-w-sm rounded-2xl p-6 relative">
                            <button onclick="toggleShareModal(false)"
                                class="absolute top-4 right-4 text-gray-400 hover:text-black text-2xl cursor-pointer">&times;</button>
                            <h3 class="text-lg font-bold mb-4 text-center">Share this Product</h3>
                            <div class="grid grid-cols-4 gap-4 mb-6">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                    target="_blank" class="flex flex-col items-center gap-1 group">
                                    <div
                                        class="w-12 h-12 rounded-full bg-[#1877F2]/10 flex items-center justify-center text-[#1877F2] group-hover:bg-[#1877F2] group-hover:text-white transition-all">
                                        <i class="fa-brands fa-facebook-f text-xl"></i></div>
                                    <span class="text-[10px] font-medium">Facebook</span>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($product->name . ' - ' . request()->url()) }}"
                                    target="_blank" class="flex flex-col items-center gap-1 group">
                                    <div
                                        class="w-12 h-12 rounded-full bg-[#25D366]/10 flex items-center justify-center text-[#25D366] group-hover:bg-[#25D366] group-hover:text-white transition-all">
                                        <i class="fa-brands fa-whatsapp text-xl"></i></div>
                                    <span class="text-[10px] font-medium">WhatsApp</span>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($product->name) }}"
                                    target="_blank" class="flex flex-col items-center gap-1 group">
                                    <div
                                        class="w-12 h-12 rounded-full bg-[#1DA1F2]/10 flex items-center justify-center text-[#1DA1F2] group-hover:bg-[#1DA1F2] group-hover:text-white transition-all">
                                        <i class="fa-brands fa-twitter text-xl"></i></div>
                                    <span class="text-[10px] font-medium">Twitter</span>
                                </a>
                                <a href="mailto:?subject={{ urlencode($product->name) }}&body={{ urlencode(request()->url()) }}"
                                    class="flex flex-col items-center gap-1 group">
                                    <div
                                        class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 group-hover:bg-gray-600 group-hover:text-white transition-all">
                                        <i class="fa-solid fa-envelope text-xl"></i></div>
                                    <span class="text-[10px] font-medium">Email</span>
                                </a>
                            </div>
                            <div class="relative">
                                <input id="copyInput" type="text" readonly value="{{ request()->url() }}"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-lg py-2.5 px-3 text-[12px] outline-none">
                                <button onclick="copyToClipboard()"
                                    class="absolute right-2 top-1.5 bg-[#FF71A8] text-white px-3 py-1 rounded text-[11px] font-bold">Copy</button>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('checkout') }}"
                        class="w-full mt-3 border border-[#FF71A8] text-[#FF71A8] font-bold py-3.5 rounded-md hover:bg-[#ffe1ed] transition-all cursor-pointer inline-block text-center">
                        Buy Now
                    </a>
                </div>

                {{-- Feature Badges --}}
                <div class="flex mt-8 lg:gap-4 gap-2 w-full md:w-[70%]">
                    <div
                        class="bg-[#FF97BF] flex-1 lg:rounded-2xl rounded-xl text-center p-4 shadow-sm hover:scale-105 transition-transform">
                        <div
                            class="bg-[#FF67A2] mx-auto lg:w-12 lg:h-12 w-10 h-10 flex justify-center items-center rounded-full mb-2">
                            <img class="lg:w-6 w-5" src="{{ asset('images/van.png') }}" alt="Shipping">
                        </div>
                        <h3 class="text-white lg:text-[13px] text-[11px] font-bold leading-tight">Complimentary Shipping
                        </h3>
                        <p class="text-white lg:text-[11px] text-[9px] mt-1 opacity-90">On all orders worldwide</p>
                    </div>
                    <div
                        class="bg-[#FF97BF] flex-1 lg:rounded-2xl rounded-xl text-center p-4 shadow-sm hover:scale-105 transition-transform">
                        <div
                            class="bg-[#FF67A2] mx-auto lg:w-12 lg:h-12 w-10 h-10 flex justify-center items-center rounded-full mb-2">
                            <img class="lg:w-6 w-5" src="{{ asset('images/shopping.png') }}" alt="Secure">
                        </div>
                        <h3 class="text-white lg:text-[13px] text-[11px] font-bold leading-tight">Secure Checkout</h3>
                        <p class="text-white lg:text-[11px] text-[9px] mt-1 opacity-90">Protected payment processing</p>
                    </div>
                    <div
                        class="bg-[#FF97BF] flex-1 lg:rounded-2xl rounded-xl text-center p-4 shadow-sm hover:scale-105 transition-transform">
                        <div
                            class="bg-[#FF67A2] mx-auto lg:w-12 lg:h-12 w-10 h-10 flex justify-center items-center rounded-full mb-2">
                            <img class="lg:w-6 w-5" src="{{ asset('images/return.png') }}" alt="Returns">
                        </div>
                        <h3 class="text-white lg:text-[13px] text-[11px] font-bold leading-tight">Flexible Returns</h3>
                        <p class="text-white lg:text-[11px] text-[9px] mt-1 opacity-90">30-day return policy</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Login Required Modal — FIX 1 & 2 --}}
    <div id="loginModal" class="fixed inset-0 bg-black/50 z-[99999] hidden items-center justify-center px-4">
        <div class="bg-white w-full max-w-sm rounded-2xl p-8 relative text-center">
            <button
                onclick="document.getElementById('loginModal').classList.add('hidden');document.getElementById('loginModal').classList.remove('flex');"
                class="absolute top-4 right-4 text-gray-400 hover:text-black text-2xl cursor-pointer">&times;</button>
            <div class="w-16 h-16 bg-[#FFE1ED] rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-lock text-[#FF71A8] text-2xl"></i>
            </div>
            <h3 class="text-[20px] font-bold mb-2">Login Required</h3>
            <p class="text-gray-500 text-[14px] mb-6">Please login to continue with this action.</p>
            <div class="flex gap-3">
                <a href="{{ url('login') }}"
                    class="flex-1 bg-[#FF71A8] text-white font-bold py-3 rounded-md hover:bg-black transition text-[14px]">Login</a>
                <a href="{{ url('register') }}"
                    class="flex-1 border border-[#FF71A8] text-[#FF71A8] font-bold py-3 rounded-md hover:bg-[#ffe1ed] transition text-[14px]">Register</a>
            </div>
        </div>
    </div>

    {{-- Tab Section --}}
    <section class="py-5 lg:px-12 px-4">
        <div class="bg-[#FFE1ED] px-2 flex justify-between py-2 rounded-sm mb-6">
            <button onclick="openTab(event, 'details')"
                class="tab-btn lg:px-20 px-4 flex-1 cursor-pointer rounded-sm py-1.5 bg-white text-[#FF71A8] lg:text-[14px] text-[12px] font-bold transition-all shadow-sm">Details</button>
            <button onclick="openTab(event, 'featured')"
                class="tab-btn lg:px-20 px-4 flex-1 cursor-pointer rounded-sm py-1.5 text-[#FF71A8] lg:text-[14px] text-[12px] font-medium transition-all">Featured</button>
            <button onclick="openTab(event, 'reviews')"
                class="tab-btn lg:px-20 px-4 flex-1 cursor-pointer rounded-sm py-1.5 text-[#FF71A8] lg:text-[14px] text-[12px] font-medium transition-all">Review</button>
        </div>

        <div id="details" class="tab-content bg-[#FAFAFA] lg:px-10 px-5 py-8 rounded-2xl">
            <h2 class="font-bold lg:text-[18px] text-[15px] mb-4">Product Details</h2>
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-10">
                <div class="col-span-1">
                    <h3 class="font-bold text-[14px] mb-3">Specifications</h3>
                    <ul class="space-y-3 lg:text-[14px] text-[12px] text-[#757575] font-medium">
                        <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Status:</span><span
                                class="text-black">{{ ucfirst($product->status) }}</span></li>
                        <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Category:</span><span
                                class="text-black">{{ $product->category->name ?? '-' }}</span></li>
                        <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Badge:</span><span
                                class="text-black">{{ $product->badge ?? 'None' }}</span></li>
                        <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Available Sizes:</span><span
                                class="text-black">{{ $product->variants->pluck('size')->unique()->implode(', ') }}</span>
                        </li>
                        <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Colors:</span><span
                                class="text-black">{{ $product->variants->pluck('color')->unique()->implode(', ') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="lg:col-span-2">
                    <h3 class="font-bold text-[14px] mb-2">Description</h3>
                    <p class="text-gray-600 leading-relaxed lg:text-[14px] text-[12px]">{{ $product->description }}</p>
                </div>
            </div>
        </div>

        <div id="featured" class="tab-content hidden bg-[#FAFAFA] lg:px-10 px-5 py-8 rounded-2xl">
            <h2 class="font-bold lg:text-[18px] text-[15px] mb-6">Key Features</h2>
            <div
                class="grid lg:grid-cols-2 grid-cols-1 gap-y-4 gap-x-10 text-gray-700 lg:text-[15px] text-[13px] font-medium">
                <div class="flex items-center gap-2">• Available in
                    {{ $product->variants->pluck('size')->unique()->count() }} sizes</div>
                <div class="flex items-center gap-2">• {{ $product->variants->pluck('color')->unique()->count() }} color
                    options</div>
                <div class="flex items-center gap-2">•
                    {{ $product->in_stock ? 'In Stock — Ready to Ship' : 'Out of Stock' }}</div>
                <div class="flex items-center gap-2">• Free worldwide shipping</div>
                <div class="flex items-center gap-2">• 30-day return policy</div>
                <div class="flex items-center gap-2">• Secure payment processing</div>
            </div>
        </div>

        {{-- Reviews Tab --}}
        <div id="reviews" class="tab-content hidden bg-white lg:px-10 px-5 py-8 border border-gray-100 rounded-2xl">
            <div class="flex justify-between items-start mb-8">
                <h2 class="font-bold lg:text-[20px] text-[16px]">Customer Reviews</h2>
                @auth
                    <button onclick="toggleModal(true)"
                        class="bg-[#FF71A8] text-white px-6 py-2 rounded-md lg:text-[14px] text-[12px] font-bold hover:bg-black transition cursor-pointer">
                        Write Review
                    </button>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                        class="bg-[#FF71A8] text-white px-6 py-2 rounded-md lg:text-[14px] text-[12px] font-bold hover:bg-black transition inline-block">
                        Login to Write Review
                    </a>
                @endguest
            </div>

            <div class="flex flex-col lg:flex-row gap-10 items-center border-b pb-10">
                <div class="text-center">
                    <h1 class="text-[48px] font-bold leading-none">{{ $avgRating }}</h1>
                    <div class="flex text-[#FF71A8] gap-1 my-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa-{{ $i <= round($avgRating) ? 'solid' : 'regular' }} fa-star"></i>
                        @endfor
                    </div>
                    <p class="text-gray-400 text-[12px]">{{ $reviewsCount }} reviews</p>
                </div>
                <div class="flex-1 w-full space-y-2">
                    @foreach ([5, 4, 3, 2, 1] as $star)
                        @php
                            $count = $product->reviews->where('rating', $star)->count();
                            $pct = $reviewsCount > 0 ? round(($count / $reviewsCount) * 100) : 0;
                        @endphp
                        <div class="flex items-center gap-4 text-[12px] font-bold {{ $pct > 0 ? '' : 'text-gray-400' }}">
                            <span>{{ $star }} Star</span>
                            <div class="flex-1 bg-gray-100 h-2 rounded-full">
                                <div class="bg-[#FF71A8] h-full rounded-full {{ $pct < 100 ? 'opacity-' . ($star < 5 ? '50' : '100') : '' }}"
                                    style="width: {{ $pct }}%"></div>
                            </div>
                            <span>{{ $pct }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 space-y-6">
                @forelse($product->reviews as $review)
                    <div class="p-5 border border-gray-50 rounded-xl flex gap-4 bg-gray-50/30">
                        <div
                            class="w-12 h-12 rounded-full bg-[#FFE1ED] flex items-center justify-center text-[#FF71A8] font-bold text-[16px] flex-shrink-0">
                            {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-[14px]">{{ $review->user->name ?? 'Anonymous' }}</h4>
                            <div class="flex text-[#FF71A8] text-[10px] gap-0.5 my-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa-{{ $i <= $review->rating ? 'solid' : 'regular' }} fa-star"></i>
                                @endfor
                            </div>
                            <p class="text-gray-500 text-[12px] mt-1">{{ $review->review_text }}</p>
                            <p class="text-gray-300 text-[11px] mt-2">{{ $review->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 text-[14px] text-center py-8">No reviews yet. Be the first to review!</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Review Modal --}}
    <div id="reviewModal" class="fixed inset-0 bg-black/50 z-[9999] hidden items-center justify-center px-4">
        <div class="bg-white w-full max-w-2xl rounded-2xl p-8 relative max-h-[90vh] overflow-y-auto">
            <button onclick="toggleModal(false)"
                class="absolute top-5 right-5 text-gray-400 hover:text-black text-2xl cursor-pointer">&times;</button>
            <h2 class="text-[22px] font-bold">Write a Review</h2>
            <p class="text-gray-500 text-[14px] mb-6">Share your thoughts about {{ $product->name }}</p>
            <form class="space-y-5" action="{{ route('product.review.store', $product->id) }}" method="POST">
                @csrf
                <div>
                    <label class="block font-bold text-[14px] mb-2">Overall Rating*</label>
                    <div class="flex text-gray-300 gap-2 text-2xl cursor-pointer" id="starRating">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa-regular fa-star hover:text-[#FF71A8]" data-rating="{{ $i }}"></i>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="0">
                </div>
                <div>
                    <label class="block font-bold text-[14px] mb-1">Your Review*</label>
                    <textarea rows="4" name="review_text" placeholder="Share details about your experience..."
                        class="w-full bg-gray-50 border-none rounded-lg p-3 text-[14px] focus:ring-2 focus:ring-[#FF71A8] outline-none"></textarea>
                </div>
                <div class="flex gap-4 pt-4">
                    <button type="button" onclick="toggleModal(false)"
                        class="flex-1 border border-[#FF71A8] text-[#FF71A8] font-bold py-3 rounded-md">Cancel</button>
                    <button type="submit"
                        class="flex-1 bg-[#FF71A8] text-white font-bold py-3 rounded-md hover:bg-black transition">Submit
                        Review</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Related Products --}}
    <section class="lg:pt-10 pt-8">
        <div class="lg:pl-12 px-4 lg:pr-0">
            <h2 class="lg:text-[26px] text-[20px] font-semibold">You May Also Like</h2>
        </div>
        <div id="relatedSwiper" class="swiper relative lg:!pl-10 lg:!pr-0 !px-4 !pb-5 mt-4">
            <div class="swiper-wrapper">
                {{-- Related products same category se --}}
                @foreach ($relatedProducts ?? [] as $related)
                    @php $relThumb = $related->primaryImage; @endphp
                    <div class="swiper-slide">
                        <div class="bg-white lg:rounded-xl rounded-md shadow">
                            <div class="relative">
                                <img src="{{ $relThumb ? url('uploads/' . $relThumb->image_path) : 'https://via.placeholder.com/400x350' }}"
                                    class="lg:rounded-t-xl rounded-t-md lg:h-[350px] h-[150px] w-full object-cover object-top">
                                <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
                                    @if ($related->badge)
                                        <p
                                            class="text-white px-2 py-1 bg-[#FF71A8] text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">
                                            {{ $related->badge }}</p>
                                    @else
                                        <span></span>
                                    @endif
                                </div>
                                <div class="absolute lg:bottom-5 bottom-2 lg:px-6 px-3 w-full">
                                    <a href="{{ route('product-details', $related->slug) }}"
                                        class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">
                                        View Details
                                    </a>
                                </div>
                            </div>
                            <div class="lg:p-4 p-3">
                                <h3 class="lg:text-[15px] text-[12px] font-medium truncate">{{ $related->name }}</h3>
                                <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">
                                    ${{ number_format($related->sale_price ?? $related->price, 2) }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button id="productPrev"
                class="absolute hidden lg:block z-[99] cursor-pointer text-[#FF71A8] left-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-r-md shadow-lg transition">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button id="productNext"
                class="absolute z-[99] hidden lg:block cursor-pointer text-[#FF71A8] right-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-l-md shadow-lg transition">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </section>

    {{-- Data Bridge: PHP → JS --}}
    <script>
        const imagesByColor = @json($imagesByColor);
        const stockByColorSize = @json($stockByColorSize);
        const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
        const cartStoreUrl = "{{ route('cart.store') }}";
        const wishlistUrl = "{{ route('wishlist.toggle') }}";
        const csrfToken = "{{ csrf_token() }}";
        let selectedColor = "{{ $defaultColor }}";
        let selectedSize = null;
        let maxQty = 0;

        // FIX 3: Page load par pehle color + pehle available size auto-select karo
        document.addEventListener('DOMContentLoaded', () => {
            const firstSize = document.querySelector('.size-btn:not(.opacity-40)');
            if (firstSize) {
                selectSize(firstSize, firstSize.dataset.size, parseInt(firstSize.dataset.stock));
            }
        });
    </script>

    <script>
        // ── FIX 3: Thumbnail click — seedha kaam karta hai ──────────────────────────
        function setMainImage(src, el) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.thumb-box').forEach(b => {
                b.classList.remove('border-[#FF71A8]');
                b.classList.add('border-transparent', 'opacity-60');
            });
            el.classList.add('border-[#FF71A8]');
            el.classList.remove('border-transparent', 'opacity-60');
        }

        // ── Color Selection ──────────────────────────────────────────────────────────
        document.querySelectorAll('.color-dot').forEach(dot => {
            dot.addEventListener('click', function() {
                selectedColor = this.dataset.color;
                selectedSize = null;

                document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('ring-2',
                    'ring-[#FF71A8]'));
                this.classList.add('ring-2', 'ring-[#FF71A8]');
                document.getElementById('colorLabel').textContent = selectedColor;

                updateImages(selectedColor);
                updateSizes(selectedColor);
                updateStockBadge(0, true);
            });
        });

        // ── Update Images on Color Change ────────────────────────────────────────────
        function updateImages(color) {
            const images = imagesByColor[color] ?? [];
            if (!images.length) return;

            const primary = images.find(img => img.is_primary) ?? images[0];
            document.getElementById('mainImage').src = primary.path;

            const container = document.getElementById('thumbnailContainer');
            container.innerHTML = '';

            images.forEach((img, index) => {
                const div = document.createElement('div');
                div.className = `w-[33%] thumb-box rounded-md p-1 transition-all cursor-pointer
                    ${index === 0 ? 'border-2 border-[#FF71A8]' : 'border-2 border-transparent opacity-60'}`;
                div.setAttribute('onclick', `setMainImage('${img.path}', this)`);

                const el = document.createElement('img');
                el.className = 'product-thumb lg:h-[160px] h-[100px] w-full rounded-md object-cover lg:object-top';
                el.src = img.path;

                div.appendChild(el);
                container.appendChild(div);
            });
        }

        // ── Update Sizes on Color Change ─────────────────────────────────────────────
        function updateSizes(color) {
            const sizeList = document.getElementById('sizeList');
            const allSizes = ['XS', 'S', 'M', 'L', 'XL'];
            const sizeStock = stockByColorSize[color] ?? {};

            sizeList.innerHTML = '';
            let firstSet = false;

            allSizes.forEach((size) => {
                if (!(size in sizeStock)) return;

                const stock = sizeStock[size];
                const outStock = stock === 0;

                const li = document.createElement('li');
                li.className = `size-btn lg:text-[14px] text-[12px] border-[#FF71A8] border rounded-md lg:px-7 px-4 py-2 font-medium transition-all
                    ${!firstSet && !outStock ? 'active bg-[#FF71A8] text-white' : 'text-[#FF71A8] cursor-pointer'}
                    ${outStock ? 'opacity-40 cursor-not-allowed line-through' : ''}`;
                li.dataset.size = size;
                li.dataset.stock = stock;
                li.textContent = size;

                if (!outStock) {
                    li.setAttribute('onclick', `selectSize(this, '${size}', ${stock})`);
                    if (!firstSet) {
                        firstSet = true;
                        selectedSize = size;
                        maxQty = stock;
                        updateStockBadge(stock);
                    }
                }

                sizeList.appendChild(li);
            });
        }

        // ── Size Select ──────────────────────────────────────────────────────────────
        function selectSize(el, size, stock) {
            selectedSize = size;
            maxQty = stock;

            document.querySelectorAll('.size-btn').forEach(btn => {
                btn.classList.remove('bg-[#FF71A8]', 'text-white', 'active');
                btn.classList.add('text-[#FF71A8]');
            });
            el.classList.add('bg-[#FF71A8]', 'text-white', 'active');
            el.classList.remove('text-[#FF71A8]');

            updateStockBadge(stock);

            const qtyEl = document.getElementById('qtyValue');
            if (parseInt(qtyEl.textContent) > stock) qtyEl.textContent = 1;
        }

        // ── Stock Badge ──────────────────────────────────────────────────────────────
        function updateStockBadge(stock, reset = false) {
            const badge = document.getElementById('stockBadge');
            const stockTxt = document.getElementById('stockText');

            if (reset) {
                badge.className =
                    'text-[#08B302] bg-[#D2FFD1] font-medium lg:text-[13px] text-[10px] rounded-md px-4 py-1.5';
                badge.textContent = 'In Stock';
                if (stockTxt) stockTxt.textContent = '';
                return;
            }
            if (stock === 0) {
                badge.className = 'text-red-600 bg-red-100 font-medium lg:text-[13px] text-[10px] rounded-md px-4 py-1.5';
                badge.textContent = 'Out of Stock';
                if (stockTxt) stockTxt.textContent = '';
            } else if (stock <= 5) {
                badge.className =
                    'text-orange-600 bg-orange-100 font-medium lg:text-[13px] text-[10px] rounded-md px-4 py-1.5';
                badge.textContent = 'Low Stock';
                if (stockTxt) stockTxt.textContent = `Only ${stock} left!`;
            } else {
                badge.className =
                    'text-[#08B302] bg-[#D2FFD1] font-medium lg:text-[13px] text-[10px] rounded-md px-4 py-1.5';
                badge.textContent = 'In Stock';
                if (stockTxt) stockTxt.textContent = `${stock} pieces available`;
            }
        }

        // ── Quantity ─────────────────────────────────────────────────────────────────
        function changeQty(delta) {
            const el = document.getElementById('qtyValue');
            const qty = parseInt(el.textContent);
            const newQty = qty + delta;
            if (newQty < 1) return;
            if (maxQty > 0 && newQty > maxQty) return;
            el.textContent = newQty;
        }

        // ── FIX 1: Add to Cart — login check with modal ──────────────────────────────
        function addToCart() {
            if (!isLoggedIn) {
                showLoginModal();
                return;
            }
            if (!selectedSize) {
                showToast('Please select a size first.', 'warning');
                return;
            }
            if (maxQty === 0) {
                showToast('This variant is out of stock.', 'warning');
                return;
            }

            const productId = document.getElementById('addToCartBtn').dataset.productId;
            const qty = parseInt(document.getElementById('qtyValue').textContent);

            const btn = document.getElementById('addToCartBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-sm"></i> Adding...';

            fetch(cartStoreUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        color: selectedColor,
                        size: selectedSize,
                        quantity: qty
                    }),
                })
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa-solid fa-cart-shopping text-sm"></i> <span>Add to cart</span>';
                    if (data.success) {
                        const cartCount = document.getElementById('cartCount');
                        if (cartCount) cartCount.textContent = data.cart_count;
                        showToast('Added to cart!');
                    } else {
                        showToast(data.message ?? 'Something went wrong.', 'warning');
                    }
                })
                .catch(() => {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa-solid fa-cart-shopping text-sm"></i> <span>Add to cart</span>';
                    showToast('Network error. Please try again.', 'warning');
                });
        }

        // ── FIX 2: Wishlist — login check with modal ─────────────────────────────────
        function toggleWishlist(productId) {
            if (!isLoggedIn) {
                showLoginModal();
                return;
            }

            fetch(wishlistUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        product_id: productId
                    }),
                })
                .then(res => res.json())
                .then(data => {
                    const icon = document.getElementById('heartIcon');
                    if (data.added) {
                        icon.classList.replace('fa-regular', 'fa-solid');
                        icon.style.color = '#FF71A8';
                        showToast('Added to wishlist!');
                    } else {
                        icon.classList.replace('fa-solid', 'fa-regular');
                        icon.style.color = '';
                        showToast('Removed from wishlist.');
                    }
                })
                .catch(() => showToast('Network error.', 'warning'));
        }

        // ── Login Modal ──────────────────────────────────────────────────────────────
        function showLoginModal() {
            const modal = document.getElementById('loginModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // ── Share Modal ──────────────────────────────────────────────────────────────
        function toggleShareModal(show) {
            const modal = document.getElementById('shareModal');
            modal.classList.toggle('hidden', !show);
            modal.classList.toggle('flex', show);
        }

        function copyToClipboard() {
            const input = document.getElementById('copyInput');
            input.select();
            document.execCommand('copy');
            showToast('Link copied!');
        }

        // ── Review Modal ─────────────────────────────────────────────────────────────
        function toggleModal(show) {
            const modal = document.getElementById('reviewModal');
            modal.classList.toggle('hidden', !show);
            modal.classList.toggle('flex', show);
        }

        // ── Tab Switcher ─────────────────────────────────────────────────────────────
        function openTab(event, tabId) {
            document.querySelectorAll('.tab-content').forEach(t => t.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('bg-white', 'font-bold', 'shadow-sm');
                b.classList.add('font-medium');
            });
            document.getElementById(tabId).classList.remove('hidden');
            event.currentTarget.classList.add('bg-white', 'font-bold', 'shadow-sm');
            event.currentTarget.classList.remove('font-medium');
        }

        // ── Image Zoom ────────────────────────────────────────────────────────────────
        const zoomContainer = document.getElementById('zoomContainer');
        const mainImg = document.getElementById('mainImage');
        zoomContainer.addEventListener('mousemove', (e) => {
            const rect = zoomContainer.getBoundingClientRect();
            mainImg.style.transformOrigin =
                `${((e.clientX - rect.left) / rect.width) * 100}% ${((e.clientY - rect.top) / rect.height) * 100}%`;
            mainImg.style.transform = 'scale(2)';
        });
        zoomContainer.addEventListener('mouseleave', () => {
            mainImg.style.transform = 'scale(1)';
        });

        // ── Toast ─────────────────────────────────────────────────────────────────────
        function showToast(msg, type = 'success') {
            let toast = document.getElementById('toastMsg');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'toastMsg';
                document.body.appendChild(toast);
            }
            toast.className =
                `fixed bottom-6 right-6 px-5 py-3 rounded-xl text-[13px] font-medium z-[9999] transition-opacity duration-300 ${type === 'warning' ? 'bg-orange-500' : 'bg-[#FF71A8]'} text-white`;
            toast.textContent = msg;
            toast.style.opacity = '1';
            clearTimeout(window._toastTimer);
            window._toastTimer = setTimeout(() => {
                toast.style.opacity = '0';
            }, 2500);
        }



        document.querySelectorAll("#starRating i").forEach((star, index) => {

            star.addEventListener("click", function() {

                let rating = index + 1;

                document.getElementById("ratingInput").value = rating;

                document.querySelectorAll("#starRating i").forEach((s, i) => {

                    if (i < rating) {

                        s.classList.remove("fa-regular");

                        s.classList.add("fa-solid", "text-[#FF71A8]");

                    } else {

                        s.classList.remove("fa-solid", "text-[#FF71A8]");

                        s.classList.add("fa-regular");

                    }

                });

            });

        });
        // ── Star Rating in Modal ──────────────────────────────────────────────────────
        // document.querySelectorAll('#starRating i').forEach((star, index) => {
        //     star.addEventListener('click', () => {
        //         document.getElementById('ratingInput').value = index + 1;
        //         document.querySelectorAll('#starRating i').forEach((s, i) => {
        //             s.className = i <= index ? 'fa-solid fa-star text-[#FF71A8]' : 'fa-regular fa-star text-gray-300';
        //         });
        //     });
        // });
    </script>

@endsection
