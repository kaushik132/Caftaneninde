@extends('layout.dashboard.main')
@section('content')


  <section class="bg-[#FFDEEB] relative pt-[70px] pb-[40px] z-[-99]">
    <div class="lg:pl-32 pl-10 flex items-center gap-4">
      <img class="lg:h-[90px] lg:w-[90px] h-[55px] w-[55px] rounded-full object-cover " src="./images/user-1.jpg" alt="">

      <div>
        <h3 class="lg:text-[24px] text-[18px] font-medium">Welcome back, Sarah!</h3>
        <p class="lg:text-[14px] text-[12px] font-medium -mt-0.5">Member since January 2024</p>
      </div>
    </div>

    <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/left-leave.png" alt="">
    <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/right-leave.png" alt="">
  </section>

  <header class="lg:hidden flex justify-between items-center px-5 py-4 border-[#D4D4D4] border-b">
    <h2 class="text-lg font-semibold">My Account</h2>
    <button id="menu-btn" class="text-2xl text-[#FF71A8]">
      <i class="fa-solid fa-bars"></i>
    </button>
  </header>

  <!-- OVERLAY (for mobile) -->
  <div id="overlay" class="hidden fixed inset-0 bg-black/40 z-40"></div>

  <!-- MAIN CONTENT -->
  <main class="py-10 px-4 lg:px-8 lg:flex items-start gap-6 relative">

    <!-- SIDEBAR -->
    <aside id="sidebar" class="fixed top-0 left-0 h-full w-[85%] sm:w-[60%] lg:static lg:h-auto lg:w-[26%] bg-white border border-[#D0D0D0] rounded-none lg:rounded-2xl px-5 pt-5 pb-32 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shadow-lg lg:shadow-none">

      <!-- CLOSE BUTTON (only mobile) -->
      <div class="flex justify-between items-center mb-5 lg:hidden">
        <h3 class="text-lg font-semibold">Menu</h3>
        <button id="close-btn" class="text-xl text-gray-500">
          <i class="fa-solid fa-xmark "></i>
        </button>
      </div>

      <ul class="space-y-1.5">
        <li>
          <a href="#" class="bg-[#FF71A8] text-white text-[15px] font-medium block px-5 py-3 rounded-md transition-all">
            <i class="fa-solid fa-bag-shopping mr-1"></i>
            My Orders
          </a>
        </li>
        <li>
          <a href="#" class="hover:bg-[#FF71A8] text-[15px] font-medium text-[#FF71A8] hover:text-white block px-5 py-3 rounded-md transition-all">
            <i class="fa-regular fa-heart mr-1"></i>
            Wishlist
          </a>
        </li>
        <li>
          <a href="#" class="hover:bg-[#FF71A8] text-[15px] font-medium text-[#FF71A8] hover:text-white block px-5 py-3 rounded-md transition-all">
            <i class="fa-solid fa-location-dot mr-1"></i>
            Addresses
          </a>
        </li>
        <li>
          <a href="#" class="hover:bg-[#FF71A8] text-[15px] font-medium text-[#FF71A8] hover:text-white block px-5 py-3 rounded-md transition-all">
            <i class="fa-solid fa-gear mr-1"></i>
            Account Setting
          </a>
        </li>
        <li>
          <a href="#" class="hover:bg-[#FF71A8] text-[15px] font-medium text-[#FF71A8] hover:text-white block px-5 py-3 rounded-md transition-all">
            <i class="fa-solid fa-lock mr-1"></i>
            Security
          </a>
        </li>
      </ul>
    </aside>

    <!-- SECTION CONTENT -->
    <section class="flex-1 mt-5 lg:mt-0">
      <!-- TABS -->
      <div class="bg-[#FFE1ED] px-2 flex flex-wrap justify-between py-1.5 rounded-sm">
        <span class="px-4 sm:px-10 md:px-20 inline-block cursor-pointer rounded-sm py-1.5 bg-[#FFFFFF] lg:text-[13px] text-[12px] font-medium">All Orders(4)</span>
        <span class="px-4 sm:px-10 md:px-20 inline-block cursor-pointer rounded-sm py-1.5 lg:text-[13px] text-[12px] font-medium">Active(2)</span>
        <span class="px-4 sm:px-10 md:px-20 inline-block cursor-pointer rounded-sm py-1.5 lg:text-[13px] text-[12px] font-medium">Complete(2)</span>
      </div>

      <!-- ORDER CARD (example) -->
      <div class="mt-5 space-y-5">
        <div class="border border-[#E8E8E8] lg:rounded-xl rounded-md lg:px-5 px-4 lg:py-5 py-3">
          <div class="flex justify-between items-center">
            <div>
              <div class="flex items-center gap-2">
                <img class="lg:w-[25px] w-[19px]" src="./images/checkmark.png" alt="">
                <h3 class="font-medium lg:text-[16px] text-[13px]">ORD-2025-001</h3>
                <p class="bg-[#08A702] text-white font-medium text-[10px] lg:text-[12px] px-4 py-1 rounded-sm">Delivered</p>
              </div>
              <p class="lg:text-[13px] text-[11px] font-medium mt-2 text-[#7D7D7D]">Placed on March 10, 2025</p>
            </div>
            <div>
              <h3 class="lg:text-[22px] text-[16px] text-[#FF71A8] font-medium">$389.99</h3>
              <p class="lg:text-[13px] text-[11px] text-right -mt-0.5 text-[#7D7D7D] font-medium">1 Item</p>
            </div>
          </div>

          <div class="mt-5 flex  border-b border-[#D4D4D4] lg:pb-8 pb-5 justify-between">
            <div class="flex gap-2">
              <img class="lg:w-[110px] w-[90px] lg:h-[120px] h-[100px] object-cover rounded-md" src="./images/product-2.jpg" alt="">
              <div>
                <h3 class="font-medium lg:text-[16px] text-[14px]">Celestial Evening Gown</h3>
                <p class="text-[#9D9D9D] lg:text-[15px] text-[13px] font-medium">Midnight Blue/M</p>
                <p class="text-[#898888] lg:text-[15px] text-[13px] font-medium">QTY: 1</p>
              </div>
            </div>
            <h3 class="lg:text-[16px] text-[14px] text-[#FF71A8] font-medium">$389.99</h3>
          </div>

          <div class="lg:mt-4 mt-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
            <p class="lg:text-[15px] text-[12px] font-medium text-[#8B8B8B]">
              Tracking Number: <span class="text-black">TRK123456789</span>
            </p>
            <ul class="flex flex-wrap lg:gap-3 gap-2">
              <li><a href="#" class="lg:text-[13px] text-[10px] lg:px-5 px-4 lg:py-2 py-1.5 rounded-sm border border-[#A7A7A7] inline-block font-medium">Write Review</a></li>
              <li><a href="#" class="lg:text-[13px] text-[10px] lg:px-5 px-4 lg:py-2 py-1.5 rounded-sm border border-[#A7A7A7] inline-block font-medium">View Details</a></li>
              <li><a href="#" class="lg:text-[13px] text-[10px] lg:px-5 px-4 lg:py-2 py-1.5 rounded-sm border border-[#A7A7A7] inline-block font-medium">Reorder</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
