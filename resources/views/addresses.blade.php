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
          <a href="wishlist.php" class="hover:bg-[#FF71A8] text-[15px] font-medium text-[#FF71A8] hover:text-white block px-5 py-3 rounded-md transition-all">
            <i class="fa-regular fa-heart mr-1"></i>
            Wishlist
          </a>
        </li>
        <li>
          <a href="addresses.php" class="hover:bg-[#FF71A8] text-[15px] font-medium text-[#FF71A8] hover:text-white block px-5 py-3 rounded-md transition-all">
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
      <div class="flex justify-between items-center mb-4">
        <h3 class="lg:text-[22px] text-[17px] font-medium">Saved address</h3>
        <p class="bg-[#FF71A8] text-[12px] lg:text-[14px] lg:px-5 px-4 py-2 inline-block cursor-pointer text-white rounded-sm">+ New Address</p>
      </div>
      <div class="grid lg:grid-cols-2 lg:gap-7 gap-4">

        <div class="col-span-1 border-[#FF3E88] border lg:rounded-lg rounded-md px-5 pt-4 pb-6">
          <div class="flex justify-between items-center">
            <p class="lg:text-[13px] text-[12px] font-medium flex items-end gap-0.5"><img class="w-[22px]" src="./images/home.png" alt=""> Home</p>

            <p class="text-[#FF71A8] bg-[#FFE1ED] lg:text-[12px] text-[11px] font-medium px-3 py-1 rounded-sm"> Default</p>
          </div>

          <div class="mt-5">
            <h3 class="lg:text-[18px] text-[16px] font-medium">Sarah Anderson</h3>
            <p class="text-[#7D7D7D] lg:text-[15px] text-[13px] font-medium">123 Fashion Avenue NewYork, NY 10001 <br />
              +1 (555) 123-4567</p>


            <div class="mt-5 flex gap-3">
              <a href="#" class="lg:text-[13px] text-[12px] rounded-md bg-[#F5F5F5] px-3 py-1  flex items-start font-medium gap-1 ">
                <img class="w-[16px] !mt-[1px]" src="./images/tabler_edit.png" alt="">
                Edit</a>

              <a href="#" class="lg:text-[13px] text-[12px] text-[#FF0000] rounded-md bg-[#F5F5F5] px-3 py-1  flex items-start font-medium gap-1 ">
                <img class="w-[16px] !mt-[0.5px]" src="./images/delete.png" alt="">
                Delete</a>
            </div>
          </div>
        </div>

        <div class="col-span-1 border-[#BABABA] border lg:rounded-lg rounded-md px-5 pt-4 pb-6">
          <div>
            <p class="lg:text-[13px] text-[12px]  font-medium flex items-end gap-0.5"><img class="w-[22px]" src="./images/work.png" alt=""> Work</p>
          </div>

          <div class="mt-5">
            <h3 class="lg:text-[18px] text-[16px]  font-medium">Sarah Anderson</h3>
            <p class="text-[#7D7D7D] g:text-[15px] text-[13px]  font-medium">123 Fashion Avenue NewYork, NY 10001 <br />
              +1 (555) 123-4567</p>


            <div class="mt-5 flex gap-3">
              <a href="#" class="lg:text-[13px] text-[12px] rounded-md bg-[#F5F5F5] px-3 py-1  flex items-start font-medium gap-1 ">
                Set as default</a>


              <a href="#" class="lg:text-[13px] text-[12px] rounded-md bg-[#F5F5F5] px-3 py-1  flex items-start font-medium gap-1 ">
                <img class="w-[16px] !mt-[1px]" src="./images/tabler_edit.png" alt="">
                Edit</a>


              <a href="#" class="lg:text-[13px] text-[12px] text-[#FF0000] rounded-md bg-[#F5F5F5] px-3 py-1  flex items-start font-medium gap-1 ">
                <img class="w-[16px] !mt-[0.5px]" src="./images/delete.png" alt="">
                Delete</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



@endsection
