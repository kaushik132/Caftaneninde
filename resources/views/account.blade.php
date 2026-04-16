@extends('layout.dashboard.main')
@section('content')

<style>
  .switch{position:relative;display:inline-block;width:46px;height:26px;}
  .switch input{opacity:0;width:0;height:0;}
  .slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:#ccc;transition:.4s;}
  .slider:before{position:absolute;content:"";height:18px;width:18px;left:4px;bottom:4px;background-color:white;transition:.4s;}
  input:checked+.slider{background-color:#FF71A8;}
  input:checked+.slider:before{transform:translateX(20px);}
  .slider.round{border-radius:34px;}
  .slider.round:before{border-radius:50%;}
  .sidebar-link{color:#FF71A8;transition:background-color 0.2s,color 0.2s;}
  .sidebar-link:hover{background-color:#FF71A8 !important;color:#ffffff !important;}
  .sidebar-link.active{background-color:#FF71A8 !important;color:#ffffff !important;}
  .tab-section{display:none;}
  .tab-section.active{display:block;}
  .mobile-tab-bar{display:none;}
  @media(max-width:1023px){
    .mobile-tab-bar{display:flex;overflow-x:auto;-webkit-overflow-scrolling:touch;scrollbar-width:none;background:#fff;border-bottom:1.5px solid #F0F0F0;padding:0 8px;}
    .mobile-tab-bar::-webkit-scrollbar{display:none;}
    .mobile-tab-item{flex-shrink:0;display:flex;align-items:center;gap:6px;padding:12px 16px;cursor:pointer;color:#BABABA;font-size:13px;font-weight:500;text-decoration:none;border-bottom:2.5px solid transparent;white-space:nowrap;transition:color 0.2s,border-color 0.2s;}
    .mobile-tab-item.active{color:#FF71A8;border-bottom:2.5px solid #FF71A8;font-weight:600;}
    #desktop-sidebar{display:none !important;}
  }
  .modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1000;align-items:center;justify-content:center;padding:16px;}
  .modal-overlay.open{display:flex;}
  .modal-box{background:#fff;border-radius:16px;width:100%;max-width:480px;padding:28px 24px;position:relative;max-height:90vh;overflow-y:auto;}
  .modal-close{position:absolute;top:14px;right:16px;font-size:20px;cursor:pointer;color:#888;background:none;border:none;padding:0;}
  #toast{position:fixed;bottom:30px;right:20px;background:#FF71A8;color:#fff;padding:12px 22px;border-radius:10px;font-size:13px;font-weight:500;z-index:9999;opacity:0;transform:translateY(10px);transition:all 0.3s;pointer-events:none;}
  #toast.show{opacity:1;transform:translateY(0);}
  .tab-btn.active{background-color:#ffffff;font-weight:600;}
</style>

{{-- Hero --}}
<section class="overflow-hidden bg-[#FFDEEB] relative pt-[70px] pb-[40px]" style="z-index:1">
    <div class="lg:pl-32 pl-10 flex items-center gap-4">
        <div class="lg:h-[90px] lg:w-[90px] h-[55px] w-[55px] rounded-full bg-[#FF71A8] flex items-center justify-center text-white font-bold text-[28px] flex-shrink-0">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div>
            <h3 class="lg:text-[24px] text-[18px] font-medium">Welcome back, {{ explode(' ', $user->name)[0] }}!</h3>
            <p class="lg:text-[14px] text-[12px] font-medium -mt-0.5">Member since {{ $user->created_at->format('F Y') }}</p>
        </div>
    </div>
    <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px]" style="z-index:-1" src="{{ asset('images/left-leave.png') }}" alt="">
    <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px]" style="z-index:-1" src="{{ asset('images/right-leave.png') }}" alt="">
</section>

{{-- Mobile Tabs --}}
<nav class="mobile-tab-bar">
    <a href="#" data-tab="orders"    class="mobile-tab-item active"><i class="fa-solid fa-bag-shopping"></i> My Orders</a>
    <a href="#" data-tab="wishlist"  class="mobile-tab-item"><i class="fa-regular fa-heart"></i> Wishlist</a>
    <a href="#" data-tab="addresses" class="mobile-tab-item"><i class="fa-solid fa-location-dot"></i> Addresses</a>
    <a href="#" data-tab="settings"  class="mobile-tab-item"><i class="fa-solid fa-gear"></i> Settings</a>
    <a href="#" data-tab="security"  class="mobile-tab-item"><i class="fa-solid fa-lock"></i> Security</a>
    <a href="{{ route('logout') }}" class="mobile-tab-item"
       onclick="event.preventDefault();document.getElementById('mobile-logout-form').submit();">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
    <form id="mobile-logout-form" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
</nav>

<main class="py-10 px-4 lg:px-8 lg:flex items-start gap-6 relative">

    {{-- Desktop Sidebar --}}
    <aside id="desktop-sidebar" class="lg:w-[26%] bg-white border border-[#D0D0D0] lg:rounded-2xl px-5 pt-5 pb-8 lg:sticky lg:top-[90px]">
        <ul class="space-y-1.5">
            <li><a href="#" data-tab="orders"    class="sidebar-link active text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-solid fa-bag-shopping mr-2"></i>My Orders</a></li>
            <li><a href="#" data-tab="wishlist"  class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-regular fa-heart mr-2"></i>Wishlist</a></li>
            <li><a href="#" data-tab="addresses" class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-solid fa-location-dot mr-2"></i>Addresses</a></li>
            <li><a href="#" data-tab="settings"  class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-solid fa-gear mr-2"></i>Account Setting</a></li>
            <li><a href="#" data-tab="security"  class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-solid fa-lock mr-2"></i>Security</a></li>
            <li>
                <a href="{{ route('logout') }}" class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"
                   onclick="event.preventDefault();document.getElementById('sidebar-logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i>Logout
                </a>
                <form id="sidebar-logout-form" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
            </li>
        </ul>
    </aside>

    <section class="flex-1">

        {{-- MY ORDERS --}}
        <div id="tab-orders" class="tab-section active">
            <div class="bg-[#FFE1ED] px-2 flex justify-between py-1.5 rounded-sm mb-5">
                <span class="tab-btn active px-4 sm:px-10 md:px-16 inline-block cursor-pointer rounded-sm py-1.5 text-[12px] lg:text-[13px] font-medium" data-order-tab="all">All ({{ $allCount }})</span>
                <span class="tab-btn px-4 sm:px-10 md:px-16 inline-block cursor-pointer rounded-sm py-1.5 text-[12px] lg:text-[13px] font-medium" data-order-tab="active">Active ({{ $activeCount }})</span>
                <span class="tab-btn px-4 sm:px-10 md:px-16 inline-block cursor-pointer rounded-sm py-1.5 text-[12px] lg:text-[13px] font-medium" data-order-tab="complete">Complete ({{ $completeCount }})</span>
            </div>

            <div class="space-y-5" id="orders-list">
                @forelse($orders as $order)
                    @php
                        $statusColors = ['pending'=>'bg-[#FF9800]','confirmed'=>'bg-[#2196F3]','shipped'=>'bg-[#2196F3]','delivered'=>'bg-[#08A702]','cancelled'=>'bg-[#F44336]'];
                        $statusGroup  = in_array($order->status,['pending','confirmed','shipped']) ? 'active' : ($order->status==='delivered' ? 'complete' : 'cancelled');
                        $firstItem    = $order->items->first();
                    @endphp
                    <div class="order-card border border-[#E8E8E8] lg:rounded-xl rounded-md lg:px-5 px-4 lg:py-5 py-3"
                         id="order-card-{{ $order->id }}"
                         data-status="{{ $statusGroup }}">
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h3 class="font-medium lg:text-[16px] text-[13px]">{{ $order->order_number }}</h3>
                                    <span class="{{ $statusColors[$order->status] ?? 'bg-gray-400' }} text-white font-medium text-[10px] lg:text-[12px] px-3 py-0.5 rounded-sm order-status-badge">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                <p class="lg:text-[13px] text-[11px] font-medium mt-1 text-[#7D7D7D]">Placed on {{ $order->created_at->format('F d, Y') }}</p>
                            </div>
                            <div class="text-right">
                                <h3 class="lg:text-[20px] text-[15px] text-[#FF71A8] font-medium">${{ number_format($order->total_amount, 2) }}</h3>
                                <p class="text-[11px] text-[#7D7D7D] font-medium">{{ $order->items->sum('quantity') }} {{ Str::plural('Item', $order->items->sum('quantity')) }}</p>
                            </div>
                        </div>

                        @if($firstItem)
                            @php $thumb = $firstItem->product->primaryImage; $moreCount = $order->items->count() - 1; @endphp
                            <div class="mt-4 flex border-b border-[#D4D4D4] pb-4 justify-between items-start">
                                <div class="flex gap-3">
                                    <div class="relative flex-shrink-0">
                                        <img class="lg:w-[100px] w-[75px] lg:h-[110px] h-[85px] object-cover object-top rounded-md"
                                             src="{{ $thumb ? url('uploads/'.$thumb->image_path) : 'https://via.placeholder.com/100x110' }}"
                                             alt="{{ $firstItem->product->name }}">
                                        @if($moreCount > 0)
                                            <div class="absolute inset-0 bg-black/40 rounded-md flex items-center justify-center">
                                                <span class="text-white font-bold text-[13px]">+{{ $moreCount }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="font-medium lg:text-[15px] text-[13px]">{{ $firstItem->product->name }}</h3>
                                        @if($firstItem->variant)
                                            <p class="text-[#9D9D9D] text-[12px]">{{ $firstItem->variant->color }} / {{ $firstItem->variant->size }}</p>
                                        @endif
                                        <p class="text-[#898888] text-[12px]">QTY: {{ $firstItem->quantity }}</p>
                                    </div>
                                </div>
                                <span class="text-[#FF71A8] font-medium text-[14px] flex-shrink-0 ml-2">${{ number_format($firstItem->unit_price * $firstItem->quantity, 2) }}</span>
                            </div>
                        @endif

                        <div class="mt-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                            <p class="text-[12px] font-medium text-[#8B8B8B]">
                                Payment: <span class="text-black font-semibold capitalize">{{ $order->payment_method }}</span>
                                — <span class="capitalize">{{ $order->payment_status }}</span>
                            </p>
                            <div class="flex flex-wrap gap-2">
                                @if($order->status === 'delivered' && $firstItem)
                                    <button onclick="openReviewModal({{ $firstItem->product_id }}, '{{ addslashes($firstItem->product->name) }}')"
                                            class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">
                                        Write Review
                                    </button>
                                @endif
                                @if($order->status === 'shipped')
                                    <a href="{{ route('order-track') }}" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">Track Order</a>
                                @endif
                                @if(in_array($order->status, ['pending','confirmed']))
                                    <button onclick="confirmCancel({{ $order->id }})"
                                            class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#FF71A8] text-[#FF71A8] font-medium hover:bg-[#FF71A8] hover:text-white transition-colors">
                                        Cancel Order
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16 border border-[#E8E8E8] rounded-xl">
                        <i class="fa-solid fa-bag-shopping text-[#FFB3CE] text-[55px] mb-4 block"></i>
                        <p class="text-[#888] text-[15px] font-medium">No orders yet</p>
                        <a href="{{ route('products') }}" class="mt-4 inline-block bg-[#FF71A8] text-white px-6 py-2 rounded-md text-[13px] font-bold hover:bg-black transition">Start Shopping</a>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- WISHLIST --}}
        <div id="tab-wishlist" class="tab-section">
            <h3 class="lg:text-[22px] text-[17px] font-medium mb-4">My Wishlist <span class="text-[#FF71A8]">({{ $wishlistItems->count() }})</span></h3>
            @if($wishlistItems->count() > 0)
                <div class="grid lg:grid-cols-2 gap-4" id="wishlist-grid">
                    @foreach($wishlistItems as $wi)
                        @php $wp = $wi->product; $wt = $wp->primaryImage; @endphp
                        <div class="wish-item border border-[#E8E8E8] rounded-xl p-4 flex gap-4 items-start" id="wish-{{ $wi->id }}">
                            <a href="{{ route('product-details', $wp->slug) }}" class="flex-shrink-0">
                                <img class="w-[85px] h-[95px] object-cover object-top rounded-md"
                                     src="{{ $wt ? url('uploads/'.$wt->image_path) : 'https://via.placeholder.com/85x95' }}"
                                     alt="{{ $wp->name }}">
                            </a>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start gap-2">
                                    <a href="{{ route('product-details', $wp->slug) }}" class="font-medium text-[14px] hover:text-[#FF71A8] transition">{{ $wp->name }}</a>
                                    <button onclick="removeWishItem({{ $wp->id }}, {{ $wi->id }})" class="text-[#FF71A8] flex-shrink-0 hover:scale-125 transition-transform">
                                        <i class="fa-solid fa-heart text-lg"></i>
                                    </button>
                                </div>
                                <p class="text-[#9D9D9D] text-[12px] mt-0.5">{{ $wp->category->name ?? '' }}</p>
                                <p class="text-[#FF71A8] font-semibold text-[15px] mt-1">${{ number_format($wp->sale_price ?? $wp->price, 2) }}</p>
                                <a href="{{ route('product-details', $wp->slug) }}" class="mt-2 text-[12px] bg-[#FF71A8] text-white px-5 py-1.5 rounded-sm font-medium w-full block text-center hover:bg-black transition">
                                    View Product
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 border border-[#E8E8E8] rounded-xl">
                    <i class="fa-regular fa-heart text-[#FFB3CE] text-[55px] mb-4 block"></i>
                    <p class="text-[#888] text-[15px] font-medium">Your wishlist is empty</p>
                </div>
            @endif
        </div>

        {{-- ADDRESSES --}}
        <div id="tab-addresses" class="tab-section">
            <h3 class="lg:text-[22px] text-[17px] font-medium mb-4">Saved Addresses</h3>
            @if($addresses->count() > 0)
                <div class="grid lg:grid-cols-2 lg:gap-6 gap-4">
                    @foreach($addresses as $addr)
                        <div class="border border-[#E8E8E8] rounded-xl p-5">
                            <p class="font-semibold text-[14px]">{{ $addr->full_name }}</p>
                            <p class="text-[#888] text-[12px] mt-1">{{ $addr->address_line1 }}@if($addr->address_line2), {{ $addr->address_line2 }}@endif</p>
                            <p class="text-[#888] text-[12px]">{{ $addr->city }}, {{ $addr->state }} {{ $addr->zip }}</p>
                            <p class="text-[#888] text-[12px]">{{ $addr->phone }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 border border-[#E8E8E8] rounded-xl">
                    <i class="fa-solid fa-location-dot text-[#FFB3CE] text-[55px] mb-4 block"></i>
                    <p class="text-[#888] text-[15px] font-medium">No saved addresses</p>
                    <p class="text-[#BBB] text-[13px] mt-1">Addresses from your orders will appear here</p>
                </div>
            @endif
        </div>

        {{-- ACCOUNT SETTINGS --}}
        <div id="tab-settings" class="tab-section">
            <div class="border-[#BABABA] border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
                <h3 class="lg:text-[17px] text-[16px] text-[#353535] font-medium">Personal Information</h3>
                <div class="mt-5 space-y-4">
                    <div>
                        <label class="text-[13px] lg:text-[15px] font-medium">Full Name</label>
                        <input id="s-name" value="{{ $user->name }}" type="text"
                               class="w-full mt-0.5 text-[13px] lg:text-[14px] bg-[#F5F5F5] px-4 py-2.5 rounded-md outline-none focus:ring-2 focus:ring-[#FF71A8]">
                    </div>
                    <div>
                        <label class="text-[13px] lg:text-[15px] font-medium">Email Address</label>
                        <input id="s-email" value="{{ $user->email }}" type="email"
                               class="w-full mt-0.5 text-[13px] lg:text-[14px] bg-[#F5F5F5] px-4 py-2.5 rounded-md outline-none focus:ring-2 focus:ring-[#FF71A8]">
                    </div>
                    <div>
                        <label class="text-[13px] lg:text-[15px] font-medium">Phone Number</label>
                        <input id="s-phone" value="{{ $user->phone ?? '' }}" type="tel"
                               class="w-full mt-0.5 text-[13px] lg:text-[14px] bg-[#F5F5F5] px-4 py-2.5 rounded-md outline-none focus:ring-2 focus:ring-[#FF71A8]">
                    </div>
                    <div class="text-right">
                        <button onclick="savePersonalInfo()"
                                class="py-2 text-[13px] lg:text-[14px] font-medium bg-[#FF71A8] text-white rounded-sm px-8 hover:bg-black transition cursor-pointer">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-[#BABABA] mt-4 border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
                <h3 class="lg:text-[17px] text-[16px] text-[#353535] font-medium">Notification Preferences</h3>
                <div class="mt-5 space-y-5">
                    @foreach([['Order Updates','Get notified about your order status',true],['Promotions & Offers','Receive exclusive deals',true],['Newsletter','Weekly style tips',false],['SMS Notifications','Order updates via SMS',false]] as [$title,$desc,$checked])
                        <div class="flex justify-between items-center">
                            <div><h3 class="text-[15px] font-medium">{{ $title }}</h3><p class="text-[#8C8C8C] text-[12px]">{{ $desc }}</p></div>
                            <label class="switch"><input type="checkbox" {{ $checked ? 'checked' : '' }} onchange="showToast('Preference saved!')"><span class="slider round"></span></label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- SECURITY --}}
        <div id="tab-security" class="tab-section">
            <div class="border-[#BABABA] border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
                <h3 class="text-[16px] lg:text-[17px] flex items-center gap-2 text-[#353535] font-medium mb-5">
                    <i class="fa-solid fa-lock text-[#FF71A8]"></i> Change Password
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-[14px] font-medium">Current Password</label>
                        <div class="relative mt-0.5">
                            <input id="cur-pass" type="password" placeholder="Enter current password"
                                   class="w-full text-[13px] bg-[#F5F5F5] px-4 py-2.5 pr-11 rounded-md outline-none focus:ring-2 focus:ring-[#FF71A8]">
                            <button type="button" onclick="togglePass('cur-pass',this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#888]"><i class="fa-regular fa-eye"></i></button>
                        </div>
                    </div>
                    <div>
                        <label class="text-[14px] font-medium">New Password</label>
                        <div class="relative mt-0.5">
                            <input id="new-pass" type="password" placeholder="Min. 8 characters" oninput="checkStrength(this.value)"
                                   class="w-full text-[13px] bg-[#F5F5F5] px-4 py-2.5 pr-11 rounded-md outline-none focus:ring-2 focus:ring-[#FF71A8]">
                            <button type="button" onclick="togglePass('new-pass',this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#888]"><i class="fa-regular fa-eye"></i></button>
                        </div>
                        <div class="mt-2 h-1.5 bg-[#F0F0F0] rounded-full overflow-hidden">
                            <div id="strength-bar" class="h-full w-0 rounded-full transition-all duration-400"></div>
                        </div>
                        <p id="strength-text" class="text-[11px] mt-1 text-[#AAA]">Must be at least 8 characters</p>
                    </div>
                    <div>
                        <label class="text-[14px] font-medium">Confirm New Password</label>
                        <div class="relative mt-0.5">
                            <input id="conf-pass" type="password" placeholder="Re-enter new password"
                                   class="w-full text-[13px] bg-[#F5F5F5] px-4 py-2.5 pr-11 rounded-md outline-none focus:ring-2 focus:ring-[#FF71A8]">
                            <button type="button" onclick="togglePass('conf-pass',this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#888]"><i class="fa-regular fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 pt-2">
                        <button onclick="clearPassFields()" class="py-2 text-[13px] font-medium text-[#FF71A8] border border-[#FF71A8] rounded-sm px-6 cursor-pointer">Cancel</button>
                        <button onclick="doUpdatePassword()" class="py-2 text-[13px] font-medium bg-[#FF71A8] text-white rounded-sm px-6 hover:bg-black transition cursor-pointer">Update Password</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

{{-- Review Modal --}}
<div id="review-modal" class="modal-overlay" onclick="if(event.target===this)closeReviewModal()">
    <div class="modal-box">
        <button class="modal-close" onclick="closeReviewModal()"><i class="fa-solid fa-xmark"></i></button>
        <h3 class="text-[17px] font-semibold mb-1">Write a Review</h3>
        <p class="text-gray-400 text-[13px] mb-5" id="review-modal-product"></p>
        <input type="hidden" id="review-product-id">
        <div class="space-y-4">
            <div>
                <label class="text-[13px] font-medium block mb-2">Rating *</label>
                <div class="flex gap-2 text-2xl cursor-pointer" id="starRating">
                    @for($i=1;$i<=5;$i++)
                        <i class="fa-regular fa-star text-gray-300 hover:text-[#FF71A8]" onclick="setRating({{ $i }})"></i>
                    @endfor
                </div>
                <input type="hidden" id="review-rating" value="0">
            </div>
            <div>
                <label class="text-[13px] font-medium">Your Review *</label>
                <textarea id="review-text" rows="4" placeholder="Share your experience (min. 10 characters)..."
                          class="w-full mt-0.5 text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md outline-none focus:ring-2 focus:ring-[#FF71A8]"></textarea>
            </div>
            <div class="flex gap-3 pt-1">
                <button onclick="closeReviewModal()" class="flex-1 py-2.5 text-[13px] font-medium text-[#FF71A8] border border-[#FF71A8] rounded-sm">Cancel</button>
                <button onclick="submitReview()" class="flex-1 py-2.5 text-[13px] font-medium bg-[#FF71A8] text-white rounded-sm hover:bg-black transition">Submit</button>
            </div>
        </div>
    </div>
</div>

{{-- Cancel Confirm Modal --}}
<div id="confirm-modal" class="modal-overlay" onclick="if(event.target===this)closeConfirmModal()">
    <div class="modal-box" style="max-width:320px;text-align:center">
        <div class="text-[44px] mb-2">🗑️</div>
        <h3 class="text-[16px] font-semibold mb-1">Cancel Order?</h3>
        <p class="text-[#888] text-[13px] mb-5">This action cannot be undone.</p>
        <div class="flex gap-3">
            <button onclick="closeConfirmModal()" class="flex-1 py-2.5 text-[13px] font-medium text-[#555] border border-[#DDD] rounded-sm">Keep Order</button>
            <button id="confirm-cancel-btn" class="flex-1 py-2.5 text-[13px] font-medium bg-[#FF3E3E] text-white rounded-sm cursor-pointer">Cancel Order</button>
        </div>
    </div>
</div>

<div id="toast"></div>

{{-- All JS URLs from Laravel routes --}}
<script>
    const CSRF          = "{{ csrf_token() }}";
    const URL_WISHLIST  = "{{ route('wishlist.toggle') }}";
    const URL_PROFILE   = "{{ route('profile.update') }}";
    const URL_PASSWORD  = "{{ route('password.update') }}";
    const URL_CANCEL    = (id) => `/account/orders/${id}/cancel`;
    const URL_REVIEW    = (id) => `/product/${id}/review`;
</script>

<script>
// ── Tab Navigation ────────────────────────────────────────────────────────────
function switchTab(name) {
    document.querySelectorAll('.tab-section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('[data-tab]').forEach(l => l.classList.remove('active'));
    document.getElementById('tab-' + name)?.classList.add('active');
    document.querySelectorAll(`[data-tab="${name}"]`).forEach(l => l.classList.add('active'));
}
document.querySelectorAll('[data-tab]').forEach(el => {
    el.addEventListener('click', e => { e.preventDefault(); switchTab(el.dataset.tab); });
});

// ── Order Filter ──────────────────────────────────────────────────────────────
document.querySelectorAll('[data-order-tab]').forEach(btn => {
    btn.addEventListener('click', function () {
        document.querySelectorAll('[data-order-tab]').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const f = this.dataset.orderTab;
        document.querySelectorAll('.order-card').forEach(c => {
            c.style.display = (f === 'all' || c.dataset.status === f) ? 'block' : 'none';
        });
    });
});

// ── Wishlist Remove ───────────────────────────────────────────────────────────
function removeWishItem(productId, itemId) {
    fetch(URL_WISHLIST, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ product_id: productId }),
    })
    .then(r => r.json())
    .then(() => {
        const el = document.getElementById('wish-' + itemId);
        if (el) { el.style.transition = '.3s'; el.style.opacity = '0'; setTimeout(() => el.remove(), 300); }
        showToast('Removed from wishlist.');
    })
    .catch(() => showToast('Something went wrong.'));
}

// ── Save Profile ──────────────────────────────────────────────────────────────
function savePersonalInfo() {
    const btn = event.target;
    btn.textContent = 'Saving...';
    btn.disabled = true;

    fetch(URL_PROFILE, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({
            name:  document.getElementById('s-name').value.trim(),
            email: document.getElementById('s-email').value.trim(),
            phone: document.getElementById('s-phone').value.trim(),
        }),
    })
    .then(r => r.json())
    .then(data => {
        btn.textContent = 'Save Changes';
        btn.disabled = false;
        showToast(data.message ?? (data.success ? 'Saved!' : 'Error!'));
    })
    .catch(() => { btn.textContent = 'Save Changes'; btn.disabled = false; showToast('Network error.'); });
}

// ── Update Password ───────────────────────────────────────────────────────────
function doUpdatePassword() {
    const cur  = document.getElementById('cur-pass').value;
    const nw   = document.getElementById('new-pass').value;
    const conf = document.getElementById('conf-pass').value;

    if (!cur || !nw || !conf) { showToast('Please fill all fields.'); return; }
    if (nw !== conf)           { showToast('Passwords do not match.'); return; }
    if (nw.length < 8)         { showToast('Minimum 8 characters required.'); return; }

    fetch(URL_PASSWORD, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ current_password: cur, new_password: nw, new_password_confirmation: conf }),
    })
    .then(r => r.json())
    .then(data => {
        showToast(data.message);
        if (data.success) clearPassFields();
    })
    .catch(() => showToast('Network error.'));
}

function clearPassFields() {
    ['cur-pass','new-pass','conf-pass'].forEach(id => document.getElementById(id).value = '');
    document.getElementById('strength-bar').style.width = '0';
    document.getElementById('strength-text').textContent = 'Must be at least 8 characters';
}

function checkStrength(val) {
    const bar = document.getElementById('strength-bar');
    const txt = document.getElementById('strength-text');
    if (!val) { bar.style.width='0'; txt.textContent='Must be at least 8 characters'; return; }
    let s = 0;
    if (val.length >= 8) s++;
    if (/[A-Z]/.test(val)) s++;
    if (/[0-9]/.test(val)) s++;
    if (/[^A-Za-z0-9]/.test(val)) s++;
    const lvl = [['25%','bg-red-400','Weak'],['50%','bg-orange-400','Fair'],['75%','bg-yellow-400','Good'],['100%','bg-green-500','Strong']];
    const [w,c,t] = lvl[Math.max(s-1,0)];
    bar.style.width=w; bar.className='h-full rounded-full transition-all '+c; txt.textContent=t;
}

function togglePass(id, btn) {
    const el = document.getElementById(id);
    const show = el.type === 'password';
    el.type = show ? 'text' : 'password';
    btn.querySelector('i').className = show ? 'fa-regular fa-eye-slash' : 'fa-regular fa-eye';
}

// ── Cancel Order ──────────────────────────────────────────────────────────────
let _cancelId = null;
function confirmCancel(orderId) {
    _cancelId = orderId;
    document.getElementById('confirm-modal').classList.add('open');
}
function closeConfirmModal() {
    document.getElementById('confirm-modal').classList.remove('open');
    _cancelId = null;
}
document.getElementById('confirm-cancel-btn').addEventListener('click', function () {
    if (!_cancelId) return;
    this.textContent = 'Cancelling...';
    this.disabled = true;

    fetch(URL_CANCEL(_cancelId), {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
    })
    .then(r => r.json())
    .then(data => {
        closeConfirmModal();
        showToast(data.message ?? 'Done.');
        if (data.success) {
            // Badge update karo — page reload nahi
            const card = document.getElementById('order-card-' + _cancelId);
            if (card) {
                card.dataset.status = 'cancelled';
                const badge = card.querySelector('.order-status-badge');
                if (badge) { badge.className = 'bg-[#F44336] text-white font-medium text-[10px] lg:text-[12px] px-3 py-0.5 rounded-sm order-status-badge'; badge.textContent = 'Cancelled'; }
                const cancelBtn = card.querySelector('button[onclick^="confirmCancel"]');
                if (cancelBtn) cancelBtn.remove();
            }
        }
    })
    .catch(() => { closeConfirmModal(); showToast('Network error.'); })
    .finally(() => { this.textContent = 'Cancel Order'; this.disabled = false; });
});

// ── Review Modal ──────────────────────────────────────────────────────────────
function openReviewModal(productId, productName) {
    document.getElementById('review-product-id').value = productId;
    document.getElementById('review-modal-product').textContent = productName;
    document.getElementById('review-modal').classList.add('open');
}
function closeReviewModal() {
    document.getElementById('review-modal').classList.remove('open');
    document.getElementById('review-text').value = '';
    setRating(0);
}
function setRating(val) {
    document.getElementById('review-rating').value = val;
    document.querySelectorAll('#starRating i').forEach((s,i) => {
        s.className = i < val ? 'fa-solid fa-star text-[#FF71A8]' : 'fa-regular fa-star text-gray-300';
    });
}
function submitReview() {
    const productId = document.getElementById('review-product-id').value;
    const rating    = document.getElementById('review-rating').value;
    const text      = document.getElementById('review-text').value.trim();
    if (rating == 0)      { showToast('Please select a rating.'); return; }
    if (text.length < 10) { showToast('Review must be at least 10 characters.'); return; }

    fetch(URL_REVIEW(productId), {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ rating: parseInt(rating), review_text: text }),
    })
    .then(r => r.json())
    .then(data => { showToast(data.message); if (data.success) closeReviewModal(); })
    .catch(() => showToast('Network error.'));
}

// ── Toast ─────────────────────────────────────────────────────────────────────
function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    clearTimeout(window._toastT);
    window._toastT = setTimeout(() => t.classList.remove('show'), 2800);
}
</script>

@endsection
