@extends('layout.dashboard.main')
@section('content')


  <section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] z-[-99]">
    <div class="text-center px-10 lg:px-0">
      <h2 class="font-semibold  lg:text-[38px] text-[20px] ">My Wishlist</h2>
      <p class="font-medium text-[12px] lg:-mt-1">2 item saved for later</p>
    </div>

    <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/left-leave.png" alt="">
    <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/right-leave.png" alt="">
  </section>

 <section class="lg:px-12 px-4 lg:py-10 py-6">
  <div class="grid lg:grid-cols-3 grid-cols-2 lg:gap-12 gap-3">

    <div class="wishlist-card col-span-1 group">
      <div class="bg-white lg:rounded-xl rounded-md shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden">

        <div class="absolute top-3 right-3 z-30">
           <div class="remove-item text-[14px] cursor-pointer bg-white text-gray-400 hover:text-red-500 flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px] shadow-sm transition-colors">
             <i class="fa-solid fa-xmark text-[12px] lg:text-[15px]"></i>
           </div>
        </div>

        <div class="relative overflow-hidden">
          <img src="./images/2.jpg" alt="" class="lg:rounded-t-xl rounded-t-md lg:h-[350px] h-[150px] !w-full object-cover object-top transition-transform duration-500 group-hover:scale-105" />

          <div class="top-3 left-3 absolute z-10">
            <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] text-[10px] lg:text-[11px] font-medium rounded-sm shadow-sm">New</p>
          </div>

          <div class="absolute lg:bottom-5 bottom-2 lg:px-6 px-3 w-full">
            <a href="{{url('product-details')}}" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white hover:bg-black transition-colors shadow-lg">
              View Details
            </a>
          </div>
        </div>

        <div class="lg:p-4 p-3">
          <h3 class="lg:text-[15px] text-[12px] font-medium text-gray-800">Midnight Velvet Gown</h3>
          <ul class="flex gap-1 mt-1">
            <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full border border-pink-100"></li>
            <li class="bg-[#FF71A8] lg:h-4 lg:w-4 w-2 h-2 rounded-full border border-pink-100"></li>
            <li class="bg-black lg:h-4 lg:w-4 w-2 h-2 rounded-full border border-gray-100"></li>
          </ul>
          <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-bold mt-1.5">$449.99</h3>
        </div>
      </div>
    </div>

    </div>
</section>

  <section class="lg:px-12 px-4 pt-3 pb-10">
    <div class="bg-[#FFE1ED] px-5 lg:px-0 lg:rounded-2xl rounded-md lg:py-10 py-7 text-center ">
      <img class="lg:w-[70px] w-[50px] mx-auto" src="./images/stars.png" alt="">

      <h2 class="font-medium lg:text-[22px] text-[18px] mt-1">Looking for More?</h2>
      <p class="lg:text-[15px] text-[12px] font-medium -mt-0.5">Explore our full collection to discover more stunning gowns and add them to your wishlist.</p>

      <div class="lg:mt-7 mt-5">
        <a href="#" class="bg-[#FF71A8] lg:px-10 px-6 py-2.5 text-[#ffffff] text-[13px] lg:text-[15px] font-medium inline-block  rounded-sm">Browse all product</a>

        <a href="#" class="bg-[#FFFFFF] ml-2 lg:px-10 px-6 py-2.5 text-[#FF71A8] text-[13px] lg:text-[15px] font-medium inline-block  rounded-sm">View Categories</a>
      </div>
    </div>
  </section>

@endsection

