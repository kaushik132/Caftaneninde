@extends('layout.dashboard.main')
@section('content')




<div class="bg-[#FFDEEB] lg:py-8 py-5 lg:px-12 px-4 shadow-sm">
  <div class="flex flex-wrap items-center gap-2 lg:text-[15px] text-[12px] text-[#FF9BC1] font-semibold tracking-wide">

    <a href="index.php" class="hover:text-[#FF71A8] transition-colors duration-300 flex items-center gap-1 group">
      <i class="fa-solid fa-house text-[12px] group-hover:scale-110 transition-transform"></i>
      Home
    </a>

    <span class="text-[10px] opacity-60"><i class="fa-solid fa-chevron-right"></i></span>

    <a href="{{url('blogs')}}" class="hover:text-[#FF71A8] transition-colors duration-300">
      Blog
    </a>

    <span class="text-[10px] opacity-60"><i class="fa-solid fa-chevron-right"></i></span>

    <span class="text-[#FF71A8] font-bold">Evening Gown Trends for Spring 2026</span>

  </div>
</div>

<div class="lg:px-10 px-4 py-6">
  <div>
    <a href="{{url('blogs')}}" class="lg:text-[14px] text-[13px] font-medium"><i class="fa-solid fa-arrow-left mr-1"></i> Back</a>
  </div>

</div>

<section class="lg:px-12 px-4 pt-4 lg:pb-14  pb-8">
  <div>
    <span class=" bg-[#FF71A8] inline-block px-3 rounded-md py-1 text-[10px] lg:text-[12px] font-medium text-white">Bride Tips</span>

    <h2 class="lg:text-[42px] text-[20px] font-medium mt-1">The Ultimate Guide to Choosing Your Wedding Gown</h2>
    <div class="flex mt-3 lg:gap-6 justify-between lg:justify-start">
      <div class="text-[#525252]  font-medium flex gap-1.5 items-start">
        <i class="fa-solid fa-user lg:text-[14px] mt-0.5 lg:mt-0 text-[12px]"></i>
        <p class="lg:text-[14px] text-[12px]">Sarah Mitchell</p>
      </div>

      <div class="text-[#525252]  font-medium flex gap-1.5 items-start">
        <i class="fa-solid fa-calendar-days lg:text-[14px] mt-0.5 lg:mt-0 text-[12px]"></i>
        <p class="lg:text-[14px] text-[12px]">March 15, 2025</p>
      </div>

      <div class="text-[#525252]  font-medium flex gap-1.5 items-start">
        <i class="fa-regular fa-clock lg:text-[14px] mt-0.5 lg:mt-0 text-[12px]"></i>
        <p class="lg:text-[14px] text-[12px]">8 min read</p>
      </div>
    </div>

    <div class="mt-4">
      <img class="lg:h-[550px] h-[250px] w-full rounded-md lg:rounded-3xl object-cover" src="./images/video.jpg" alt="">
    </div>

    <div class="mt-4">
      <p class="font-medium text-[12px] lg:text-[15px]">Finding the perfect wedding gown is one of the most exciting parts of wedding planning. It's a journey that should be enjoyable, personal, and ultimately lead you to a dress that makes you feel absolutely stunning on your special day.</p>

      <div class="mt-6">
        <h2 class="lg:text-[28px] text-[18px] font-medium">Start Early, But Not Too Early</h2>
        <p class="font-medium text-[12px] lg:text-[15px] mt-2">Begin your search 8-12 months before your wedding date. This gives you enough time to browse different styles, order your dress, and schedule necessary alterations. Starting too early might mean falling in love with a style that's no longer available, while starting too late can add unnecessary stress.</p>
      </div>

      <div class="mt-6">
        <h2 class="lg:text-[28px] text-[18px] font-medium">Know Your Budget</h2>
        <p class="font-medium text-[12px] lg:text-[15px] mt-2">Set a realistic budget before you start shopping, and remember to account for alterations, accessories, and preservation. A good rule of thumb is to allocate about 10-15% of your total wedding budget to your dress. Don't forget about undergarments, shoes, and jewelry when planning your bridal look budget.</p>
      </div>

      <div class="mt-6">
        <h2 class="lg:text-[28px] text-[18px] font-medium">Understanding Silhouettes</h2>
        <p class="font-medium text-[12px] lg:text-[15px] mt-2">Different body types are complemented by different dress silhouettes:</p>

        <ul class="mt-3 font-medium text-[12px] lg:text-[15px] list-disc pl-6 space-y-2">
          <li>A-Line: Universally flattering, fitted at the waist and flowing to the ground</li>
          <li>Ball Gown: Classic princess style with a fitted bodice and full skirt</li>
          <li>Mermaid: Fitted through the body and flares at the knee</li>
          <li>Sheath: Straight silhouette that skims the body</li>
          <li>Empire: High waistline just below the bust</li>
        </ul>
      </div>

      <div class="mt-6">
        <h2 class="lg:text-[28px] text-[18px] font-medium">The Shopping Experience</h2>
        <p class="font-medium text-[12px] lg:text-[15px] mt-2">Create a mood board with dresses you love. Pay attention to common elements—is it the neckline, the silhouette, or the fabric that catches your eye? Understanding what draws you to certain styles will help you communicate your vision to bridal consultants.</p>
      </div>

      <div class="mt-6">
        <h2 class="lg:text-[22px] text-[18px] font-medium">The Shopping Experience</h2>

        <div class="mt-3 space-x-1">
          <span class="border-[#B5B5B5] border inline-block px-3 rounded-md py-1 text-[10px] lg:text-[12px] font-medium ">WeddingBridal</span>

          <span class="border-[#B5B5B5] border inline-block px-3 rounded-md py-1 text-[10px] lg:text-[12px] font-medium ">TipsDress </span>

          <span class="border-[#B5B5B5] border inline-block px-3 rounded-md py-1 text-[10px] lg:text-[12px] font-medium ">ShoppingWedding</span>

          <span class="border-[#B5B5B5] border inline-block px-3 rounded-md py-1 text-[10px] lg:text-[12px] font-medium ">Planning</span>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="lg:px-12 px-4 pt-8 lg:pt-10 lg:pb-14 pb-10 border-[#E2E2E2] border-t">

  <div>
    <h2 class="lg:text-[28px] text-[20px] font-medium"><i class="fa-regular fa-comment"></i> Comment(2)</h2>

    <form class="bg-[#FFE1ED] rounded-lg lg:px-7 px-4 lg:py-5 py-4 mt-3">
      <h3 class="lg:text-[22px] text-[18px] font-medium">Leave a Comment</h3>

      <div class="flex lg:gap-5 gap-2 mt-3">
        <div class="flex-1">
          <input type="text" placeholder="Your Name" class="rounded-md bg-[#FFFFFF] lg:px-5 px-3 py-2 text-[13px] lg:text-[14px] w-full">
        </div>
        <div class="flex-1">
          <input type="text" placeholder="Your Email" class="rounded-md bg-[#FFFFFF] lg:px-5 px-3 py-2 text-[13px] lg:text-[14px] w-full">
        </div>
      </div>
      <div class="mt-3">
        <textarea rows="4" placeholder="Message..." name="" id="" class="rounded-md bg-[#FFFFFF] lg:px-5 px-3 py-2 text-[13px] lg:text-[14px] w-full"></textarea>
      </div>

      <div class="lg:mt-4 mt-2">
        <button type="submit" class="lg:text-[14px] text-[12px] cursor-pointer font-medium bg-[#FF71A8] text-white rounded-md px-6 py-2 ">Post Comment</button>
      </div>
    </form>

    <!-- comments -->

    <div class="mt-8 space-y-4">
      <div class="border-[#CCCCCC] flex gap-3 border rounded-md px-4 py-4">
        <img class="lg:min-w-[45px] min-w-[40px] lg:w-[45px] w-[40px] object-cover rounded-full lg:h-[45px] h-[40px]" src="./images/user-1.jpg" alt="">
        <div class="mt-1 flex-1">
          <div class="flex justify-between">
            <p class="lg:text-[15px] text-[13px] font-medium">Emily Johnson</p>
            <p class="lg:text-[14px] text-[12px]">March 16, 2025</p>
          </div>
          <p class="text-[#676767] text-[12px] lg:text-[15px]">This article was so helpful! I'm starting my dress search next month and these tips have given me so much confidence. Thank you!</p>
        </div>
      </div>

      <div class="border-[#CCCCCC] flex gap-3 border rounded-md px-4 py-4">
        <img class="lg:min-w-[45px] min-w-[40px] lg:w-[45px] w-[40px] object-cover rounded-full lg:h-[45px] h-[40px]" src="./images/user-1.jpg" alt="">
        <div class="mt-1 flex-1">
          <div class="flex justify-between">
            <p class="lg:text-[15px] text-[13px] font-medium">Emily Johnson</p>
            <p class="lg:text-[14px] text-[12px]">March 16, 2025</p>
          </div>
          <p class="text-[#676767] text-[12px] lg:text-[15px]">This article was so helpful! I'm starting my dress search next month and these tips have given me so much confidence. Thank you!</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="lg:px-10 px-4">
  <div>
    <h2 class="lg:text-[22px] text-[20px] font-semibold ">Related Articles</h2>
  </div>

  <div class="grid lg:grid-cols-3 grid-cols-2 lg:gap-8 gap-3 mt-3">
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

        <a href="#" class="lg:text-[14px] text-[12px] inline-block lg:mt-4 mt-3 font-medium text-[#FF71A8]">Read More <i class="fa-solid fa-arrow-right text-[13px] ml-1"></i></a>
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

        <a href="#" class="lg:text-[14px] text-[12px] inline-block lg:mt-4 mt-3 font-medium text-[#FF71A8]">Read More <i class="fa-solid fa-arrow-right text-[13px] ml-1"></i></a>
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

        <a href="#" class="lg:text-[14px] text-[12px] inline-block lg:mt-4 mt-3 font-medium text-[#FF71A8]">Read More <i class="fa-solid fa-arrow-right text-[13px] ml-1"></i></a>
      </div>
    </div>





  </div>
</section>





@endsection
