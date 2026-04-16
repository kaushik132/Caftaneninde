@extends('layout.dashboard.main')
@section('content')


<style>
  /* Toggle Switch */
  .switch { position: relative; display: inline-block; width: 46px; height: 26px; }
  .switch input { opacity: 0; width: 0; height: 0; }
  .slider { position: absolute; cursor: pointer; top:0;left:0;right:0;bottom:0; background-color:#ccc; transition:.4s; }
  .slider:before { position:absolute;content:"";height:18px;width:18px;left:4px;bottom:4px;background-color:white;transition:.4s; }
  input:checked + .slider { background-color:#FF71A8; }
  input:checked + .slider:before { transform:translateX(20px); }
  .slider.round { border-radius:34px; }
  .slider.round:before { border-radius:50%; }

  /* Order filter tab */
  .tab-btn.active { background-color:#ffffff; font-weight:600; }

  /* Desktop Sidebar */
  .sidebar-link { color:#FF71A8; transition:background-color 0.2s,color 0.2s; }
  .sidebar-link:hover { background-color:#FF71A8 !important; color:#ffffff !important; }
  .sidebar-link.active { background-color:#FF71A8 !important; color:#ffffff !important; }

  /* Tab sections */
  .tab-section { display:none; }
  .tab-section.active { display:block; }

  /* Mobile Top Swipeable Tab Bar */
  .mobile-tab-bar { display:none; }
  @media (max-width:1023px) {
    .mobile-tab-bar { display:flex;overflow-x:auto;-webkit-overflow-scrolling:touch;scrollbar-width:none;background:#fff;border-bottom:1.5px solid #F0F0F0;padding:0 8px;}
    .mobile-tab-bar::-webkit-scrollbar { display:none; }
    .mobile-tab-item { flex-shrink:0;display:flex;align-items:center;gap:6px;padding:12px 16px;cursor:pointer;color:#BABABA;font-size:13px;font-weight:500;text-decoration:none;border-bottom:2.5px solid transparent;white-space:nowrap;transition:color 0.2s,border-color 0.2s; }
    .mobile-tab-item i { font-size:14px; }
    .mobile-tab-item.active { color:#FF71A8;border-bottom:2.5px solid #FF71A8;font-weight:600; }
    #desktop-sidebar { display:none !important; }
  }

  /* Modal */
  .modal-overlay { display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1000;align-items:center;justify-content:center;padding:16px; }
  .modal-overlay.open { display:flex; }
  .modal-box { background:#fff;border-radius:16px;width:100%;max-width:480px;padding:28px 24px;position:relative;max-height:90vh;overflow-y:auto; }
  .modal-close { position:absolute;top:14px;right:16px;font-size:20px;cursor:pointer;color:#888;background:none;border:none;padding:0; }

  /* Toast */
  #toast { position:fixed;bottom:30px;right:20px;background:#FF71A8;color:#fff;padding:12px 22px;border-radius:10px;font-size:13px;font-weight:500;z-index:9999;opacity:0;transform:translateY(10px);transition:all 0.3s;pointer-events:none; }
  #toast.show { opacity:1;transform:translateY(0); }

  /* Wish heart hover */
  .wish-heart { cursor:pointer;transition:transform 0.2s; }
  .wish-heart:hover { transform:scale(1.3); }
</style>

<!-- Hero Banner -->
<section class="overflow-hidden bg-[#FFDEEB] relative pt-[70px] pb-[40px]" style="z-index:1">
  <div class="lg:pl-32 pl-10 flex items-center gap-4">
    <img class="lg:h-[90px] lg:w-[90px] h-[55px] w-[55px] rounded-full object-cover" src="./images/user-1.jpg" alt="">
    <div>
      <h3 class="lg:text-[24px] text-[18px] font-medium">Welcome back, Sarah!</h3>
      <p class="lg:text-[14px] text-[12px] font-medium -mt-0.5">Member since January 2024</p>
    </div>
  </div>
  <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px]" style="z-index:-1" src="./images/left-leave.png" alt="">
  <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px]" style="z-index:-1" src="./images/right-leave.png" alt="">
</section>

<!-- Mobile Top Swipeable Tabs -->
<nav class="mobile-tab-bar">
  <a href="#" data-tab="orders" class="mobile-tab-item active"><i class="fa-solid fa-bag-shopping"></i> My Orders</a>
  <a href="#" data-tab="wishlist" class="mobile-tab-item"><i class="fa-regular fa-heart"></i> Wishlist</a>
  <a href="#" data-tab="addresses" class="mobile-tab-item"><i class="fa-solid fa-location-dot"></i> Addresses</a>
  <a href="#" data-tab="settings" class="mobile-tab-item"><i class="fa-solid fa-gear"></i> Settings</a>
  <a href="#" data-tab="security" class="mobile-tab-item"><i class="fa-solid fa-lock"></i> Security</a>
    @auth
      <a href="{{ route('logout') }}" class="mobile-tab-item"
         onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
        <i class="fa fa-sign-out"></i> Logout
      </a>
      <form id="mobile-logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
        @csrf
      </form>
    @else
      <a href="{{ route('login') }}" class="mobile-tab-item"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
    @endauth
</nav>

<!-- Main -->
<main class="py-10 px-4 lg:px-8 lg:flex items-start gap-6 relative">

  <!-- Desktop Sidebar -->
  <aside id="desktop-sidebar" class="lg:w-[26%] bg-white border border-[#D0D0D0] lg:rounded-2xl px-5 pt-5 pb-8">
    <ul class="space-y-1.5">
      <li><a href="#" data-tab="orders" class="sidebar-link active text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-solid fa-bag-shopping mr-1"></i> My Orders</a></li>
      <li><a href="#" data-tab="wishlist" class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-regular fa-heart mr-1"></i> Wishlist</a></li>
      <li><a href="#" data-tab="addresses" class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-solid fa-location-dot mr-1"></i> Addresses</a></li>
      <li><a href="#" data-tab="settings" class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-solid fa-gear mr-1"></i> Account Setting</a></li>
      <li><a href="#" data-tab="security" class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"><i class="fa-solid fa-lock mr-1"></i> Security</a></li>
      <li>
        @auth
          <a href="{{ route('logout') }}" class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md"
             onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
            <i class="fa fa-sign-out"></i> Logout
          </a>
          <form id="sidebar-logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
            @csrf
          </form>
        @else
          <a href="{{url('login')}}" class="sidebar-link text-[15px] font-medium block px-5 py-3 rounded-md">
            <i class="fa-solid fa-right-to-bracket mr-1"></i> Login
          </a>
        @endauth
      </li>
    </ul>
  </aside>

  <section class="flex-1">

    <!-- ===== MY ORDERS ===== -->
    <div id="tab-orders" class="tab-section active">
      <div class="bg-[#FFE1ED] px-2 flex justify-between py-1.5 rounded-sm mb-5">
        <span class="tab-btn active px-4 sm:px-10 md:px-16 inline-block cursor-pointer rounded-sm py-1.5 text-[12px] lg:text-[13px] font-medium" data-order-tab="all">All Orders(4)</span>
        <span class="tab-btn px-4 sm:px-10 md:px-16 inline-block cursor-pointer rounded-sm py-1.5 text-[12px] lg:text-[13px] font-medium" data-order-tab="active">Active(2)</span>
        <span class="tab-btn px-4 sm:px-10 md:px-16 inline-block cursor-pointer rounded-sm py-1.5 text-[12px] lg:text-[13px] font-medium" data-order-tab="complete">Complete(2)</span>
      </div>

      <div class="space-y-5" id="orders-list">

        <!-- Order 1 - Delivered -->
        <div class="order-card border border-[#E8E8E8] lg:rounded-xl rounded-md lg:px-5 px-4 lg:py-5 py-3" data-status="complete">
          <div class="flex justify-between items-center">
            <div>
              <div class="flex items-center gap-2 flex-wrap">
                <h3 class="font-medium lg:text-[16px] text-[13px]">ORD-2025-001</h3>
                <span class="bg-[#08A702] text-white font-medium text-[10px] lg:text-[12px] px-3 py-0.5 rounded-sm">Delivered</span>
              </div>
              <p class="lg:text-[13px] text-[11px] font-medium mt-1 text-[#7D7D7D]">Placed on March 10, 2025</p>
            </div>
            <div class="text-right">
              <h3 class="lg:text-[20px] text-[15px] text-[#FF71A8] font-medium">$389.99</h3>
              <p class="text-[11px] text-[#7D7D7D] font-medium">1 Item</p>
            </div>
          </div>
          <div class="mt-4 flex border-b border-[#D4D4D4] pb-4 justify-between items-start">
            <div class="flex gap-3">
              <img class="lg:w-[100px] w-[75px] lg:h-[110px] h-[85px] object-cover rounded-md flex-shrink-0"
                src="https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=300&q=80" alt="Evening Gown">
              <div>
                <h3 class="font-medium lg:text-[15px] text-[13px]">Celestial Evening Gown</h3>
                <p class="text-[#9D9D9D] text-[12px] font-medium">Midnight Blue / M</p>
                <p class="text-[#898888] text-[12px] font-medium">QTY: 1</p>
              </div>
            </div>
            <span class="text-[#FF71A8] font-medium text-[14px] flex-shrink-0 ml-2">$389.99</span>
          </div>
          <div class="mt-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
            <p class="text-[12px] font-medium text-[#8B8B8B]">Tracking: <span class="text-black font-semibold">TRK123456789</span></p>
            <div class="flex flex-wrap gap-2">
              <button onclick="showToast('Review submitted! Thank you.')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">Write Review</button>
              <button onclick="showToast('Loading order details...')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">View Details</button>
              <button onclick="showToast('Item added to cart again!')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">Reorder</button>
            </div>
          </div>
        </div>

        <!-- Order 2 - Processing -->
        <div class="order-card border border-[#E8E8E8] lg:rounded-xl rounded-md lg:px-5 px-4 lg:py-5 py-3" data-status="active">
          <div class="flex justify-between items-center">
            <div>
              <div class="flex items-center gap-2 flex-wrap">
                <h3 class="font-medium lg:text-[16px] text-[13px]">ORD-2025-002</h3>
                <span class="bg-[#FF9800] text-white font-medium text-[10px] lg:text-[12px] px-3 py-0.5 rounded-sm">Processing</span>
              </div>
              <p class="lg:text-[13px] text-[11px] font-medium mt-1 text-[#7D7D7D]">Placed on March 25, 2025</p>
            </div>
            <div class="text-right">
              <h3 class="lg:text-[20px] text-[15px] text-[#FF71A8] font-medium">$129.99</h3>
              <p class="text-[11px] text-[#7D7D7D] font-medium">2 Items</p>
            </div>
          </div>
          <div class="mt-4 flex border-b border-[#D4D4D4] pb-4 justify-between items-start">
            <div class="flex gap-3">
              <img class="lg:w-[100px] w-[75px] lg:h-[110px] h-[85px] object-cover rounded-md flex-shrink-0"
                src="https://images.unsplash.com/photo-1572804013427-4d7ca7268217?w=300&q=80" alt="Wrap Dress">
              <div>
                <h3 class="font-medium lg:text-[15px] text-[13px]">Floral Wrap Dress</h3>
                <p class="text-[#9D9D9D] text-[12px] font-medium">Rose Pink / S</p>
                <p class="text-[#898888] text-[12px] font-medium">QTY: 2</p>
              </div>
            </div>
            <span class="text-[#FF71A8] font-medium text-[14px] flex-shrink-0 ml-2">$129.99</span>
          </div>
          <div class="mt-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
            <p class="text-[12px] font-medium text-[#8B8B8B]">Tracking: <span class="text-black font-semibold">TRK987654321</span></p>
            <div class="flex flex-wrap gap-2">
              <button onclick="showToast('Loading order details...')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">View Details</button>
              <button onclick="confirmCancel(this)" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#FF71A8] text-[#FF71A8] font-medium hover:bg-[#FF71A8] hover:text-white transition-colors">Cancel Order</button>
            </div>
          </div>
        </div>

        <!-- Order 3 - Delivered -->
        <div class="order-card border border-[#E8E8E8] lg:rounded-xl rounded-md lg:px-5 px-4 lg:py-5 py-3" data-status="complete">
          <div class="flex justify-between items-center">
            <div>
              <div class="flex items-center gap-2 flex-wrap">
                <h3 class="font-medium lg:text-[16px] text-[13px]">ORD-2025-003</h3>
                <span class="bg-[#08A702] text-white font-medium text-[10px] lg:text-[12px] px-3 py-0.5 rounded-sm">Delivered</span>
              </div>
              <p class="lg:text-[13px] text-[11px] font-medium mt-1 text-[#7D7D7D]">Placed on Feb 14, 2025</p>
            </div>
            <div class="text-right">
              <h3 class="lg:text-[20px] text-[15px] text-[#FF71A8] font-medium">$215.00</h3>
              <p class="text-[11px] text-[#7D7D7D] font-medium">1 Item</p>
            </div>
          </div>
          <div class="mt-4 flex border-b border-[#D4D4D4] pb-4 justify-between items-start">
            <div class="flex gap-3">
              <img class="lg:w-[100px] w-[75px] lg:h-[110px] h-[85px] object-cover rounded-md flex-shrink-0"
                src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=300&q=80" alt="Blazer">
              <div>
                <h3 class="font-medium lg:text-[15px] text-[13px]">Velvet Blazer Set</h3>
                <p class="text-[#9D9D9D] text-[12px] font-medium">Black / L</p>
                <p class="text-[#898888] text-[12px] font-medium">QTY: 1</p>
              </div>
            </div>
            <span class="text-[#FF71A8] font-medium text-[14px] flex-shrink-0 ml-2">$215.00</span>
          </div>
          <div class="mt-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
            <p class="text-[12px] font-medium text-[#8B8B8B]">Tracking: <span class="text-black font-semibold">TRK112233445</span></p>
            <div class="flex flex-wrap gap-2">
              <button onclick="showToast('Review submitted! Thank you.')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">Write Review</button>
              <button onclick="showToast('Loading order details...')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">View Details</button>
              <button onclick="showToast('Item added to cart again!')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">Reorder</button>
            </div>
          </div>
        </div>

        <!-- Order 4 - Shipped -->
        <div class="order-card border border-[#E8E8E8] lg:rounded-xl rounded-md lg:px-5 px-4 lg:py-5 py-3" data-status="active">
          <div class="flex justify-between items-center">
            <div>
              <div class="flex items-center gap-2 flex-wrap">
                <h3 class="font-medium lg:text-[16px] text-[13px]">ORD-2025-004</h3>
                <span class="bg-[#2196F3] text-white font-medium text-[10px] lg:text-[12px] px-3 py-0.5 rounded-sm">Shipped</span>
              </div>
              <p class="lg:text-[13px] text-[11px] font-medium mt-1 text-[#7D7D7D]">Placed on April 1, 2025</p>
            </div>
            <div class="text-right">
              <h3 class="lg:text-[20px] text-[15px] text-[#FF71A8] font-medium">$89.50</h3>
              <p class="text-[11px] text-[#7D7D7D] font-medium">1 Item</p>
            </div>
          </div>
          <div class="mt-4 flex border-b border-[#D4D4D4] pb-4 justify-between items-start">
            <div class="flex gap-3">
              <img class="lg:w-[100px] w-[75px] lg:h-[110px] h-[85px] object-cover rounded-md flex-shrink-0"
                src="https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=300&q=80" alt="Linen Top">
              <div>
                <h3 class="font-medium lg:text-[15px] text-[13px]">Summer Linen Top</h3>
                <p class="text-[#9D9D9D] text-[12px] font-medium">White / M</p>
                <p class="text-[#898888] text-[12px] font-medium">QTY: 1</p>
              </div>
            </div>
            <span class="text-[#FF71A8] font-medium text-[14px] flex-shrink-0 ml-2">$89.50</span>
          </div>
          <div class="mt-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
            <p class="text-[12px] font-medium text-[#8B8B8B]">Tracking: <span class="text-black font-semibold">TRK556677889</span></p>
            <div class="flex flex-wrap gap-2">
              <button onclick="showToast('Opening tracking page...')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">Track Order</button>
              <button onclick="showToast('Loading order details...')" class="text-[11px] lg:text-[13px] px-4 py-1.5 rounded-sm border border-[#A7A7A7] font-medium hover:border-[#FF71A8] hover:text-[#FF71A8] transition-colors">View Details</button>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- ===== WISHLIST ===== -->
    <div id="tab-wishlist" class="tab-section">
      <div class="flex justify-between items-center mb-4">
        <h3 class="lg:text-[22px] text-[17px] font-medium">My Wishlist <span class="text-[#FF71A8]" id="wish-count">(3)</span></h3>
      </div>
      <div class="grid lg:grid-cols-2 gap-4" id="wishlist-grid">

        <div class="wish-item border border-[#E8E8E8] rounded-xl p-4 flex gap-4 items-start">
          <img class="w-[85px] h-[95px] object-cover rounded-md flex-shrink-0"
            src="https://images.unsplash.com/photo-1572804013427-4d7ca7268217?w=300&q=80" alt="Floral Wrap Dress">
          <div class="flex-1 min-w-0">
            <div class="flex justify-between items-start gap-2">
              <h3 class="font-medium text-[14px]">Floral Wrap Dress</h3>
              <i class="fa-solid fa-heart text-[#FF71A8] wish-heart flex-shrink-0" onclick="removeWishItem(this)" title="Remove from wishlist"></i>
            </div>
            <p class="text-[#9D9D9D] text-[12px] mt-0.5">Rose Pink / S</p>
            <p class="text-[#FF71A8] font-semibold text-[15px] mt-1">$129.99</p>
            <button onclick="showToast('Added to cart!')" class="mt-2 text-[12px] bg-[#FF71A8] text-white px-5 py-1.5 rounded-sm font-medium w-full">Add to Cart</button>
          </div>
        </div>

        <div class="wish-item border border-[#E8E8E8] rounded-xl p-4 flex gap-4 items-start">
          <img class="w-[85px] h-[95px] object-cover rounded-md flex-shrink-0"
            src="https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=300&q=80" alt="Evening Gown">
          <div class="flex-1 min-w-0">
            <div class="flex justify-between items-start gap-2">
              <h3 class="font-medium text-[14px]">Celestial Evening Gown</h3>
              <i class="fa-solid fa-heart text-[#FF71A8] wish-heart flex-shrink-0" onclick="removeWishItem(this)" title="Remove from wishlist"></i>
            </div>
            <p class="text-[#9D9D9D] text-[12px] mt-0.5">Midnight Blue / M</p>
            <p class="text-[#FF71A8] font-semibold text-[15px] mt-1">$389.99</p>
            <button onclick="showToast('Added to cart!')" class="mt-2 text-[12px] bg-[#FF71A8] text-white px-5 py-1.5 rounded-sm font-medium w-full">Add to Cart</button>
          </div>
        </div>

        <div class="wish-item border border-[#E8E8E8] rounded-xl p-4 flex gap-4 items-start">
          <img class="w-[85px] h-[95px] object-cover rounded-md flex-shrink-0"
            src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=300&q=80" alt="Velvet Blazer">
          <div class="flex-1 min-w-0">
            <div class="flex justify-between items-start gap-2">
              <h3 class="font-medium text-[14px]">Velvet Blazer Set</h3>
              <i class="fa-solid fa-heart text-[#FF71A8] wish-heart flex-shrink-0" onclick="removeWishItem(this)" title="Remove from wishlist"></i>
            </div>
            <p class="text-[#9D9D9D] text-[12px] mt-0.5">Black / L</p>
            <p class="text-[#FF71A8] font-semibold text-[15px] mt-1">$215.00</p>
            <button onclick="showToast('Added to cart!')" class="mt-2 text-[12px] bg-[#FF71A8] text-white px-5 py-1.5 rounded-sm font-medium w-full">Add to Cart</button>
          </div>
        </div>

      </div>
      <div id="wishlist-empty" class="hidden text-center py-16">
        <i class="fa-regular fa-heart text-[#FFB3CE] text-[55px] mb-4 block"></i>
        <p class="text-[#888] text-[15px] font-medium">Your wishlist is empty</p>
        <p class="text-[#BBB] text-[13px] mt-1">Save items you love and find them here</p>
      </div>
    </div>

    <!-- ===== ADDRESSES ===== -->
    <div id="tab-addresses" class="tab-section">
      <div class="flex justify-between items-center mb-4">
        <h3 class="lg:text-[22px] text-[17px] font-medium">Saved Addresses</h3>
        <button onclick="openAddressModal()" class="bg-[#FF71A8] text-[12px] lg:text-[14px] lg:px-5 px-4 py-2 text-white rounded-sm font-medium hover:bg-[#e05a93] transition-colors">+ New Address</button>
      </div>
      <div class="grid lg:grid-cols-2 lg:gap-6 gap-4" id="address-grid">
        <!-- Rendered by JS -->
      </div>
    </div>

    <!-- ===== ACCOUNT SETTINGS ===== -->
    <div id="tab-settings" class="tab-section">
      <!-- Profile Picture -->
      <div class="border-[#BABABA] border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
        <h3 class="lg:text-[17px] text-[16px] font-medium mb-4">Profile Picture</h3>
        <div class="flex lg:gap-8 gap-5 items-center">
          <div class="relative">
            <img id="profile-img" class="lg:w-[110px] lg:h-[110px] w-[80px] h-[80px] rounded-full object-cover" src="./images/user-1.jpg" alt="">
            <label for="photo-upload" class="absolute bottom-0 right-0 bg-[#FF71A8] text-white rounded-full w-7 h-7 flex items-center justify-center cursor-pointer shadow-md">
              <i class="fa-solid fa-camera text-[10px]"></i>
            </label>
            <input type="file" id="photo-upload" accept="image/*" class="hidden" onchange="previewPhoto(event)">
          </div>
          <div>
            <label for="photo-upload" class="bg-[#FFEFF5] text-[13px] lg:text-[15px] px-6 py-2.5 rounded-sm font-medium flex items-center gap-2 cursor-pointer w-fit hover:bg-[#FFD9EC] transition-colors">
              <i class="fa-solid fa-camera text-[#FF71A8]"></i> Change Photo
            </label>
            <p class="text-[#676767] text-[11px] mt-1.5 font-medium">JPG, GIF or PNG. Max size of 2MB.</p>
          </div>
        </div>
      </div>

      <!-- Personal Info -->
      <div class="border-[#BABABA] mt-4 border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
        <h3 class="lg:text-[17px] text-[16px] text-[#353535] font-medium">Personal Information</h3>
        <div class="mt-5 space-y-4">
          <div>
            <label class="text-[13px] lg:text-[15px] font-medium">Full Name</label>
            <input id="s-name" value="Sarah Anderson" class="w-full mt-0.5 text-[13px] lg:text-[14px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]" type="text">
          </div>
          <div>
            <label class="text-[13px] lg:text-[15px] font-medium">Email Address</label>
            <input id="s-email" value="sarah@gmail.com" class="w-full mt-0.5 text-[13px] lg:text-[14px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]" type="email">
          </div>
          <div>
            <label class="text-[13px] lg:text-[15px] font-medium">Phone Number</label>
            <input id="s-phone" value="+91 8937482465" class="w-full mt-0.5 text-[13px] lg:text-[14px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]" type="tel">
          </div>
          <div class="text-right pt-1">
            <button onclick="savePersonalInfo()" class="py-2 text-[13px] lg:text-[14px] cursor-pointer font-medium bg-[#FF71A8] text-white border-[#FF71A8] border rounded-sm px-8 hover:bg-[#e05a93] transition-colors">Save Changes</button>
          </div>
        </div>
      </div>

      <!-- Notification Preferences -->
      <div class="border-[#BABABA] mt-4 border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
        <h3 class="lg:text-[17px] text-[16px] text-[#353535] font-medium">Notification Preferences</h3>
        <div class="mt-5 space-y-5">
          <div class="flex justify-between items-center">
            <div><h3 class="text-[15px] font-medium">Order Updates</h3><p class="text-[#8C8C8C] text-[12px] font-medium">Get notified about your order status</p></div>
            <label class="switch"><input type="checkbox" checked onchange="showToast('Preference saved!')"><span class="slider round"></span></label>
          </div>
          <div class="flex justify-between items-center">
            <div><h3 class="text-[15px] font-medium">Promotions & Offers</h3><p class="text-[#8C8C8C] text-[12px] font-medium">Receive exclusive deals and discounts</p></div>
            <label class="switch"><input type="checkbox" checked onchange="showToast('Preference saved!')"><span class="slider round"></span></label>
          </div>
          <div class="flex justify-between items-center">
            <div><h3 class="text-[15px] font-medium">Newsletter</h3><p class="text-[#8C8C8C] text-[12px] font-medium">Weekly style tips and new arrivals</p></div>
            <label class="switch"><input type="checkbox" onchange="showToast('Preference saved!')"><span class="slider round"></span></label>
          </div>
          <div class="flex justify-between items-center">
            <div><h3 class="text-[15px] font-medium">SMS Notifications</h3><p class="text-[#8C8C8C] text-[12px] font-medium">Get order updates via text message</p></div>
            <label class="switch"><input type="checkbox" onchange="showToast('Preference saved!')"><span class="slider round"></span></label>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== SECURITY ===== -->
    <div id="tab-security" class="tab-section">
      <div class="border-[#BABABA] border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
        <h3 class="text-[16px] lg:text-[17px] gap-2 flex items-center text-[#353535] font-medium mb-5">
          <i class="fa-solid fa-lock text-[#FF71A8]"></i> Change Password
        </h3>
        <div class="space-y-4">
          <div>
            <label class="text-[14px] lg:text-[15px] font-medium">Current Password</label>
            <div class="relative mt-0.5">
              <input id="cur-pass" class="w-full text-[13px] bg-[#F5F5F5] px-4 py-2.5 pr-11 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]" type="password" placeholder="Enter current password">
              <button type="button" onclick="togglePass('cur-pass',this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#888]"><i class="fa-regular fa-eye"></i></button>
            </div>
          </div>
          <div>
            <label class="text-[14px] lg:text-[15px] font-medium">New Password</label>
            <div class="relative mt-0.5">
              <input id="new-pass" class="w-full text-[13px] bg-[#F5F5F5] px-4 py-2.5 pr-11 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]" type="password" placeholder="Min. 8 characters" oninput="checkStrength(this.value)">
              <button type="button" onclick="togglePass('new-pass',this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#888]"><i class="fa-regular fa-eye"></i></button>
            </div>
            <div class="mt-2 h-1.5 bg-[#F0F0F0] rounded-full overflow-hidden"><div id="strength-bar" class="h-full w-0 rounded-full transition-all duration-400"></div></div>
            <p id="strength-text" class="text-[11px] mt-1 text-[#AAA]">Must be at least 8 characters</p>
          </div>
          <div>
            <label class="text-[14px] lg:text-[15px] font-medium">Confirm New Password</label>
            <div class="relative mt-0.5">
              <input id="conf-pass" class="w-full text-[13px] bg-[#F5F5F5] px-4 py-2.5 pr-11 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]" type="password" placeholder="Re-enter new password">
              <button type="button" onclick="togglePass('conf-pass',this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#888]"><i class="fa-regular fa-eye"></i></button>
            </div>
          </div>
          <div class="flex justify-end gap-3 pt-2">
            <button onclick="clearPassFields()" class="py-2 text-[13px] cursor-pointer font-medium text-[#FF71A8] border-[#FF71A8] border rounded-sm px-6">Cancel</button>
            <button onclick="updatePassword()" class="py-2 text-[13px] cursor-pointer font-medium bg-[#FF71A8] text-white border-[#FF71A8] border rounded-sm px-6 hover:bg-[#e05a93] transition-colors">Update Password</button>
          </div>
        </div>
      </div>
    </div>

  </section>
</main>

<!-- ===== ADDRESS MODAL ===== -->
<div id="address-modal" class="modal-overlay" onclick="if(event.target===this)closeAddressModal()">
  <div class="modal-box">
    <button class="modal-close" onclick="closeAddressModal()"><i class="fa-solid fa-xmark"></i></button>
    <h3 class="text-[17px] font-semibold mb-5" id="modal-title">Add New Address</h3>
    <input type="hidden" id="modal-addr-id" value="">
    <div class="space-y-4">
      <div>
        <label class="text-[13px] font-medium block mb-1.5">Address Type</label>
        <div class="flex gap-4">
          <label class="flex items-center gap-2 cursor-pointer text-[13px]"><input type="radio" name="addr-type" value="Home" class="accent-[#FF71A8]" checked> 🏠 Home</label>
          <label class="flex items-center gap-2 cursor-pointer text-[13px]"><input type="radio" name="addr-type" value="Work" class="accent-[#FF71A8]"> 💼 Work</label>
          <label class="flex items-center gap-2 cursor-pointer text-[13px]"><input type="radio" name="addr-type" value="Other" class="accent-[#FF71A8]"> 📍 Other</label>
        </div>
      </div>
      <div>
        <label class="text-[13px] font-medium">Full Name <span class="text-red-400">*</span></label>
        <input id="addr-name" type="text" placeholder="Sarah Anderson" class="w-full mt-0.5 text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]">
      </div>
      <div>
        <label class="text-[13px] font-medium">Phone Number</label>
        <input id="addr-phone" type="tel" placeholder="+1 (555) 000-0000" class="w-full mt-0.5 text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]">
      </div>
      <div>
        <label class="text-[13px] font-medium">Street Address <span class="text-red-400">*</span></label>
        <input id="addr-street" type="text" placeholder="123 Main Street, Apt 4B" class="w-full mt-0.5 text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]">
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="text-[13px] font-medium">City <span class="text-red-400">*</span></label>
          <input id="addr-city" type="text" placeholder="New York" class="w-full mt-0.5 text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]">
        </div>
        <div>
          <label class="text-[13px] font-medium">PIN / ZIP Code</label>
          <input id="addr-pin" type="text" placeholder="10001" class="w-full mt-0.5 text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none focus:ring-2 focus:ring-[#FF71A8]">
        </div>
      </div>
      <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" id="addr-default" class="accent-[#FF71A8] w-4 h-4">
        <span class="text-[13px] font-medium">Set as default address</span>
      </label>
      <div class="flex gap-3 pt-1">
        <button onclick="closeAddressModal()" class="flex-1 py-2.5 text-[13px] font-medium text-[#FF71A8] border border-[#FF71A8] rounded-sm hover:bg-[#FFF0F6] transition-colors">Cancel</button>
        <button onclick="saveAddress()" class="flex-1 py-2.5 text-[13px] font-medium bg-[#FF71A8] text-white rounded-sm hover:bg-[#e05a93] transition-colors">Save Address</button>
      </div>
    </div>
  </div>
</div>

<!-- Confirm Modal -->
<div id="confirm-modal" class="modal-overlay" onclick="if(event.target===this)closeConfirmModal()">
  <div class="modal-box" style="max-width:320px;text-align:center">
    <div class="text-[44px] mb-2">🗑️</div>
    <h3 class="text-[16px] font-semibold mb-1" id="confirm-title">Delete Address?</h3>
    <p class="text-[#888] text-[13px] mb-5" id="confirm-msg">This action cannot be undone.</p>
    <div class="flex gap-3">
      <button onclick="closeConfirmModal()" class="flex-1 py-2.5 text-[13px] font-medium text-[#555] border border-[#DDD] rounded-sm hover:border-[#999] transition-colors">Cancel</button>
      <button id="confirm-action-btn" class="flex-1 py-2.5 text-[13px] font-medium bg-[#FF3E3E] text-white rounded-sm hover:bg-[#d93333] transition-colors">Confirm</button>
    </div>
  </div>
</div>

<!-- Toast Notification -->
<div id="toast"></div>

<script>

</script>




@endsection
