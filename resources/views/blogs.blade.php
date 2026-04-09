@extends('layout.dashboard.main')
@section('content')



<section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] z-[-99]">
  <div class="text-center px-10 lg:px-0">
    <h2 class="font-semibold  lg:text-[38px] text-[20px] ">Style Journal</h2>
    <p class="font-medium text-[12px] lg:-mt-1">Tips, trends, and inspiration for your next special occasion</p>
  </div>
  <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/left-leave.png" alt="">
  <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/right-leave.png" alt="">
</section>

<section class="lg:px-12 px-4 lg:py-10 py-8">
  <div class="grid lg:grid-cols-2 items-center lg:gap-8 gap-4 border-[#D0D0D0] border lg:rounded-2xl rounded-md">
    <div class="col-span-1 h-[250px] lg:h-[400px] relative">
      <img class="h-full w-full object-cover rounded-t-md lg:rounded-l-2xl" src="./images/video.jpg" alt="">
      <span class="text-white text-[12px] bg-[#FF71A8] rounded-md px-4 py-1.5 inline-block absolute top-4 left-5">Featured</span>
    </div>

    <div class="col-span-1  px-4">
      <span class=" text-[10px] border-[#9D9D9D] border rounded-md lg:rounded-xl px-4 font-medium py-1 inline-block">Bride Tips</span>

      <h2 class="mt-2 lg:text-[32px] text-[20px] lg:pr-32 font-medium lg:leading-[44px]">The Ultimate Guide to Choosing Your Wedding Gown</h2>

      <p class="lg:text-[14px] text-[12px] font-medium mt-1">Discover expert tips and advice for finding the perfect wedding dress that makes you feel beautiful on your special day.</p>

      <ul class="mt-4 text-[#525252] flex lg:gap-10 justify-between lg:justify-start">
        <li class="flex items-start gap-1">
          <i class="fa-solid fa-user mt-[2px] lg:mt-0 text-[12px] lg:text-[14px]"></i>
          <p class="lg:text-[14px] text-[12px] font-medium">Sarah Mitchell</p>
        </li>

        <li class="flex items-start gap-1">
          <i class="fa-solid fa-calendar-days mt-[2px] lg:mt-0 text-[12px] lg:text-[14px]"></i>
          <p class="lg:text-[14px] text-[12px] font-medium">March 15, 2025</p>
        </li>

        <li class="flex gap-1 ">
          <i class="fa-regular fa-clock mt-[2px] text-[12px] lg:text-[14px]"></i>
          <p class="lg:text-[14px] text-[12px]  font-medium">8 min read</p>
        </li>

      </ul>

      <a href="{{url('blog-details')}}" class="group/btn bg-[#FF71A8] hover:bg-black mb-4 lg:mb-0 mt-5 px-6 lg:py-2.5 py-2 rounded-md inline-flex items-center gap-2 text-[13px] lg:text-[15px] text-white font-medium transition-all duration-300">
        Read More
        <i class="fa-solid fa-arrow-right lg:text-[12px] text-[10px] transition-transform duration-300 group-hover/btn:translate-x-1.5"></i>
      </a>
    </div>
  </div>
</section>

<section class="lg:px-10 px-4">
  <div>
    <h2 class="lg:text-[22px] text-[20px] font-semibold ">Latest Articles</h2>
  </div>

  <div class="grid lg:grid-cols-3 grid-cols-1 lg:gap-8 gap-3 mt-3">
    <div class="col-span-1 border-[#CCCCCC] border rounded-md lg:rounded-2xl">
      <img class="lg:h-[260px] h-[180px] object-cover rounded-t-md lg:rounded-t-2xl object-center  w-full" src="./images/product-2.jpg" alt="">

      <div class="lg:px-5 px-3 py-3">
        <p class="lg:text-[12px] text-[10px] font-medium inline-block px-4 py-1 border-[#DBDBDB] border rounded-lg">Fashion Trends</p>

        <h2 class="lg:text-[17px] text-[13px] mt-3 font-medium">Evening Gown Trends for Spring 2025</h2>

        <p class="text-[#686868] mt-1 text-[11px] lg:text-[13px] font-medium">Stay ahead of the fashion curve with our comprehensive guide to this season's most stunning evening gown styles and colors.</p>

        <div class="mt-3 lg:flex gap-6">
          <div class="text-[#525252] flex lg:gap-2 gap-1 items-center  lg:items-start">
            <i class="fa-solid fa-calendar-days lg:text-[14px] text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">March 15, 2025</p>
          </div>

          <div class="text-[#525252] flex lg:gap-2 gap-1 items-start">
            <i class="fa-regular fa-clock lg:text-[14px] mt-0.5 text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">8 min read</p>
          </div>
        </div>

<a href="{{url('blog-details')}}" class="group/read lg:text-[14px] text-[12px] inline-flex items-center lg:mt-4 mt-3 font-bold text-[#FF71A8] hover:text-black transition-colors duration-300">
  <span class="border-b border-transparent group-hover/read:border-black transition-all">Read More</span>
  <i class="fa-solid fa-arrow-right text-[13px] ml-1 transition-transform duration-300 group-hover/read:translate-x-1.5"></i>
</a>
      </div>
    </div>

    <div class="col-span-1 border-[#CCCCCC] border rounded-md lg:rounded-2xl">
      <img class="lg:h-[260px] h-[180px] object-cover rounded-t-md lg:rounded-t-2xl object-center  w-full" src="./images/product-2.jpg" alt="">

      <div class="lg:px-5 px-3 py-3">
        <p class="lg:text-[12px] text-[10px] font-medium inline-block px-4 py-1 border-[#DBDBDB] border rounded-lg">Fashion Trends</p>

        <h2 class="lg:text-[17px] text-[13px] mt-3 font-medium">Evening Gown Trends for Spring 2025</h2>

        <p class="text-[#686868] mt-1 text-[11px] lg:text-[13px] font-medium">Stay ahead of the fashion curve with our comprehensive guide to this season's most stunning evening gown styles and colors.</p>

        <div class="mt-3 lg:flex gap-6">
          <div class="text-[#525252] flex lg:gap-2 gap-1 items-center  lg:items-start">
            <i class="fa-solid fa-calendar-days lg:text-[14px] text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">March 15, 2025</p>
          </div>

          <div class="text-[#525252] flex lg:gap-2 gap-1 items-start">
            <i class="fa-regular fa-clock lg:text-[14px] mt-0.5 text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">8 min read</p>
          </div>
        </div>

<a href="{{url('blog-details')}}" class="group/read lg:text-[14px] text-[12px] inline-flex items-center lg:mt-4 mt-3 font-bold text-[#FF71A8] hover:text-black transition-colors duration-300">
  <span class="border-b border-transparent group-hover/read:border-black transition-all">Read More</span>
  <i class="fa-solid fa-arrow-right text-[13px] ml-1 transition-transform duration-300 group-hover/read:translate-x-1.5"></i>
</a>
      </div>
    </div>

    <div class="col-span-1 border-[#CCCCCC] border rounded-md lg:rounded-2xl">
      <img class="lg:h-[260px] h-[180px] object-cover rounded-t-md lg:rounded-t-2xl object-center  w-full" src="./images/product-2.jpg" alt="">

      <div class="lg:px-5 px-3 py-3">
        <p class="lg:text-[12px] text-[10px] font-medium inline-block px-4 py-1 border-[#DBDBDB] border rounded-lg">Fashion Trends</p>

        <h2 class="lg:text-[17px] text-[13px] mt-3 font-medium">Evening Gown Trends for Spring 2025</h2>

        <p class="text-[#686868] mt-1 text-[11px] lg:text-[13px] font-medium">Stay ahead of the fashion curve with our comprehensive guide to this season's most stunning evening gown styles and colors.</p>

        <div class="mt-3 lg:flex gap-6">
          <div class="text-[#525252] flex lg:gap-2 gap-1 items-center  lg:items-start">
            <i class="fa-solid fa-calendar-days lg:text-[14px] text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">March 15, 2025</p>
          </div>

          <div class="text-[#525252] flex lg:gap-2 gap-1 items-start">
            <i class="fa-regular fa-clock lg:text-[14px] mt-0.5 text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">8 min read</p>
          </div>
        </div>

<a href="{{url('blog-details')}}" class="group/read lg:text-[14px] text-[12px] inline-flex items-center lg:mt-4 mt-3 font-bold text-[#FF71A8] hover:text-black transition-colors duration-300">
  <span class="border-b border-transparent group-hover/read:border-black transition-all">Read More</span>
  <i class="fa-solid fa-arrow-right text-[13px] ml-1 transition-transform duration-300 group-hover/read:translate-x-1.5"></i>
</a>
      </div>
    </div>

    <div class="col-span-1 border-[#CCCCCC] border rounded-md lg:rounded-2xl">
      <img class="lg:h-[260px] h-[180px] object-cover rounded-t-md lg:rounded-t-2xl object-center  w-full" src="./images/product-2.jpg" alt="">

      <div class="lg:px-5 px-3 py-3">
        <p class="lg:text-[12px] text-[10px] font-medium inline-block px-4 py-1 border-[#DBDBDB] border rounded-lg">Fashion Trends</p>

        <h2 class="lg:text-[17px] text-[13px] mt-3 font-medium">Evening Gown Trends for Spring 2025</h2>

        <p class="text-[#686868] mt-1 text-[11px] lg:text-[13px] font-medium">Stay ahead of the fashion curve with our comprehensive guide to this season's most stunning evening gown styles and colors.</p>

        <div class="mt-3 lg:flex gap-6">
          <div class="text-[#525252] flex lg:gap-2 gap-1 items-center  lg:items-start">
            <i class="fa-solid fa-calendar-days lg:text-[14px] text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">March 15, 2025</p>
          </div>

          <div class="text-[#525252] flex lg:gap-2 gap-1 items-start">
            <i class="fa-regular fa-clock lg:text-[14px] mt-0.5 text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">8 min read</p>
          </div>
        </div>

<a href="{{url('blog-details')}}" class="group/read lg:text-[14px] text-[12px] inline-flex items-center lg:mt-4 mt-3 font-bold text-[#FF71A8] hover:text-black transition-colors duration-300">
  <span class="border-b border-transparent group-hover/read:border-black transition-all">Read More</span>
  <i class="fa-solid fa-arrow-right text-[13px] ml-1 transition-transform duration-300 group-hover/read:translate-x-1.5"></i>
</a>
      </div>
    </div>
    <div class="col-span-1 border-[#CCCCCC] border rounded-md lg:rounded-2xl">
      <img class="lg:h-[260px] h-[180px] object-cover rounded-t-md lg:rounded-t-2xl object-center  w-full" src="./images/product-2.jpg" alt="">

      <div class="lg:px-5 px-3 py-3">
        <p class="lg:text-[12px] text-[10px] font-medium inline-block px-4 py-1 border-[#DBDBDB] border rounded-lg">Fashion Trends</p>

        <h2 class="lg:text-[17px] text-[13px] mt-3 font-medium">Evening Gown Trends for Spring 2025</h2>

        <p class="text-[#686868] mt-1 text-[11px] lg:text-[13px] font-medium">Stay ahead of the fashion curve with our comprehensive guide to this season's most stunning evening gown styles and colors.</p>

        <div class="mt-3 lg:flex gap-6">
          <div class="text-[#525252] flex lg:gap-2 gap-1 items-center  lg:items-start">
            <i class="fa-solid fa-calendar-days lg:text-[14px] text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">March 15, 2025</p>
          </div>

          <div class="text-[#525252] flex lg:gap-2 gap-1 items-start">
            <i class="fa-regular fa-clock lg:text-[14px] mt-0.5 text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">8 min read</p>
          </div>
        </div>

<a href="{{url('blog-details')}}" class="group/read lg:text-[14px] text-[12px] inline-flex items-center lg:mt-4 mt-3 font-bold text-[#FF71A8] hover:text-black transition-colors duration-300">
  <span class="border-b border-transparent group-hover/read:border-black transition-all">Read More</span>
  <i class="fa-solid fa-arrow-right text-[13px] ml-1 transition-transform duration-300 group-hover/read:translate-x-1.5"></i>
</a>
      </div>
    </div>


    <div class="col-span-1 border-[#CCCCCC] border rounded-md lg:rounded-2xl">
      <img class="lg:h-[260px] h-[180px] object-cover rounded-t-md lg:rounded-t-2xl object-center  w-full" src="./images/product-2.jpg" alt="">

      <div class="lg:px-5 px-3 py-3">
        <p class="lg:text-[12px] text-[10px] font-medium inline-block px-4 py-1 border-[#DBDBDB] border rounded-lg">Fashion Trends</p>

        <h2 class="lg:text-[17px] text-[13px] mt-3 font-medium">Evening Gown Trends for Spring 2025</h2>

        <p class="text-[#686868] mt-1 text-[11px] lg:text-[13px] font-medium">Stay ahead of the fashion curve with our comprehensive guide to this season's most stunning evening gown styles and colors.</p>

        <div class="mt-3 lg:flex gap-6">
          <div class="text-[#525252] flex lg:gap-2 gap-1 items-center  lg:items-start">
            <i class="fa-solid fa-calendar-days lg:text-[14px] text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">March 15, 2025</p>
          </div>

          <div class="text-[#525252] flex lg:gap-2 gap-1 items-start">
            <i class="fa-regular fa-clock lg:text-[14px] mt-0.5 text-[12px]"></i>
            <p class="lg:text-[13px] text-[12px]">8 min read</p>
          </div>
        </div>

<a href="{{url('blog-details')}}" class="group/read lg:text-[14px] text-[12px] inline-flex items-center lg:mt-4 mt-3 font-bold text-[#FF71A8] hover:text-black transition-colors duration-300">
  <span class="border-b border-transparent group-hover/read:border-black transition-all">Read More</span>
  <i class="fa-solid fa-arrow-right text-[13px] ml-1 transition-transform duration-300 group-hover/read:translate-x-1.5"></i>
</a>
      </div>
    </div>

  </div>
</section>

<section class="lg:mt-12 bg-[#FF71A8] lg:py-10 mt-8 py-7">
  <div class="text-center text-white ">
    <h2 class="lg:text-[32px] text-[20px] font-semibold">Join Our Exclusive Circle</h2>
    <p class="font-medium lg:-mt-1 text-[13px] lg:text-[16px] ">Subscribe for early access to new collections, styling tips, and exclusive offers
    </p>
  </div>

  <form class="lg:mt-7 mt-4 flex gap-2 justify-center px-4 lg:px-0">
    <input type=" text" placeholder="Enter your email" class="px-4 py-2.5  rounded-sm lg:rounded-md lg:text-[14px] text-[12px] lg:w-[370px] w-full border-0 outline-none bg-white">

    <button type="submit" class="px-8 cursor-pointer py-2.5 text-[12px] lg:text-[14px] text-[#FF71A8] bg-white  rounded-sm lg:rounded-md font-medium">Subscribe</button>
  </form>

  <p class="lg:text-[14px] text-[11px] font-medium text-white text-center mt-3">By subscribing, you agree to our Privacy Policy and
    consent to receive updates</p>
</section>




@endsection
