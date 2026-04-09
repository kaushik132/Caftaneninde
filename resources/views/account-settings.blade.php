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

    <section class="flex-1">
      <div class="border-[#BABABA] border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
        <h3 class="lg:text-[17px] text-[16px] font-medium mb-4">Profile Picture</h3>

        <div class="flex lg:gap-8 gap-5 items-center">
          <img class="lg:w-[130px] lg:h-[130px] w-[80px] h-[80px] rounded-full object-cover
           " src="./images/user-1.jpg" alt="">

          <div>
            <button class="bg-[#FFEFF5] lg:text-[16px] text-[13px] px-6 py-2.5  gap-1.5
             rounded-sm  font-medium flex items-center ">
              <img class="lg:w-[20px] w-[15px]" src=" ./images/tabler_camera.png" alt=""> Change Photo </button>
            <p class="text-[#676767] lg:text-[11px] text-[8px] mt-1.5 font-medium">JPG, GIF or PNG. Max size of 2MB.</p>
          </div>
        </div>
      </div>
      <div class="border-[#BABABA] mt-4 border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
        <h3 class="lg:text-[17px] text-[16px] text-[#353535] font-medium">Personal Information</h3>


        <form class="mt-5 space-y-4">
          <div>
            <label class="lg:text-[15px] text-[13px] font-medium">Name</label>
            <input value="Sarah Anderson" class="w-full mt-0.5 lg:text-[14px] text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none" type="text">
          </div>

          <div>
            <label class="lg:text-[15px] text-[13px]  font-medium">Email</label>
            <input value="sarah@gmail.com" class="w-full mt-0.5 lg:text-[14px] text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none" type="text">
          </div>

          <div>
            <label class="lg:text-[15px] text-[13px]  font-medium">Phone Number</label>
            <input value="+91 8937482465" class="w-full mt-0.5 lg:text-[14px] text-[13px] bg-[#F5F5F5] px-4 py-2.5 rounded-md border-0 outline-none" type="text">
          </div>
        </form>
      </div>

      <div class="border-[#BABABA] mt-4 border lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
        <h3 class="lg:text-[17px] text-[16px] text-[#353535] font-medium">Notification Preferences</h3>


        <form class="mt-5 space-y-4">
          <div class="flex justify-between items-center">
            <div>
              <h3 class="lg:text-[18px] text-[16px] font-medium">Order Updates</h3>
              <p class="text-[#8C8C8C] lg:text-[14px] text-[12px] -mt-0.5 lg:-mt-1 font-medium">Get notified about your order status</p>
            </div>

            <div>
              <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="flex justify-between items-center">
            <div>
              <h3 class="lg:text-[18px] text-[16px]  font-medium">
                Promotions & Offers</h3>
              <p class="text-[#8C8C8C] lg:text-[14px] text-[12px] -mt-0.5 lg:-mt-1 font-medium">
                Receive exclusive deals and discountsGet notified about your order status</p>
            </div>

            <div>
              <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
              </label>
            </div>
          </div>


          <div class="flex justify-between items-center">
            <div>
              <h3 class="lg:text-[18px] text-[16px]  font-medium">
                Newsletter</h3>
              <p class="text-[#8C8C8C] lg:text-[14px] text-[12px] -mt-0.5 lg:-mt-1 font-medium">
                Weekly style tips and new arrivals</p>
            </div>

            <div>
              <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>
          </div>

          <div class="flex justify-between items-center">
            <div>
              <h3 class="lg:text-[18px] text-[16px]  font-medium">
                SMS Notifications</h3>
              <p class="text-[#8C8C8C] lg:text-[14px] text-[12px] -mt-0.5 lg:-mt-1 font-medium">
                Get order updates via text message
              </p>
            </div>

            <div>
              <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>



@endsection
