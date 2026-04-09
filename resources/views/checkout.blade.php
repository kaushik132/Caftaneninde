@extends('layout.dashboard.main')
@section('content')


<section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] z-[-99]">
  <div class="lg:pl-32 pl-10">
    <a href="cart.php" class="text-[#767676] lg:text-[14px] text-[12px]">
      <i class="fa-solid fa-chevron-left lg:text-[13px] text-[11px]"></i> Back to cart</a>
    <h2 class="font-semibold  lg:text-[42px] text-[24px] ">Checkout</h2>
  </div>
  <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/left-leave.png" alt="">
  <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/right-leave.png" alt="">
</section>

<section class="lg:px-12 px-4 py-10">
  <div class="grid lg:grid-cols-3 items-start gap-6">
    <div class="lg:col-span-2">
      <div class="bg-[#F8F8F8] rounded-md lg:rounded-2xl px-6 pt-5 pb-6">
        <h3 class="text-[#4B4B4B] lg:text-[16px] text-[14px] font-medium">Contact Information</h3>

        <div class="mt-5">
          <label class="lg:text-[15px] text-[13px] font-medium">Email</label>
          <input type="text" class="placeholder:text-[#858585]  bg-white px-5 mt-1 py-2.5 lg:text-[14px] text-[13px] rounded-md w-full " placeholder="you@examplegmail.com">
        </div>
        <p class="mt-1 lg:text-[12px] text-[10px] ml-2">Email me with news and offers</p>
      </div>

      <div class="bg-[#F8F8F8] lg:mt-6 mt-4 lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
        <h3 class="text-[#4B4B4B]  lg:text-[16px] text-[14px] font-medium">Shipping Address</h3>

        <div class="mt-5 flex gap-5">
          <div class="flex-1 "> <label class="lg:text-[15px] text-[13px]  font-medium">First Name</label>
            <input type="text" class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
          </div>

          <div class="flex-1 "> <label class="lg:text-[15px] text-[13px]  font-medium">Last Name</label>
            <input type="text" class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
          </div>
        </div>

        <div class="mt-5">
          <label class="lg:text-[15px] text-[13px] font-medium">Address</label>
          <input placeholder="Street Address" type="text" class="placeholder:text-[#858585]  bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
        </div>

        <div class="mt-5">
          <label class="lg:text-[15px] text-[13px]  font-medium">Apartment, Suite, etc</label>
          <input type="text" class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
        </div>

        <div class="mt-5 flex gap-5">
          <div class="flex-1 "> <label class="lg:text-[15px] text-[13px]  font-medium">City</label>
            <input type="text" class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
          </div>

          <div class="flex-1 "> <label class="lg:text-[15px] text-[13px]  font-medium">State</label>
            <input type="text" class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
          </div>

          <div class="flex-1 "> <label class="lg:text-[15px] text-[13px]  font-medium">PIN code</label>
            <input type="text" class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
          </div>
        </div>

        <div class="mt-5">
          <label class="lg:text-[15px] text-[13px]  font-medium">Phone Number</label>
          <input type="text" class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
        </div>
      </div>

      <div class="bg-[#F8F8F8] lg:mt-6 mt-4 rounded-md lg:rounded-2xl px-6 pt-5 pb-6">
        <h3 class="text-[#4B4B4B] font-medium  lg:text-[16px] text-[14px]"><i class="fa-solid fa-lock"></i> Payment </h3>

        <div class="mt-5">
          <label class="lg:text-[15px] text-[13px]  font-medium">Card Number</label>
          <input placeholder="1234 567 8901 5647" type="text" class="placeholder:text-[#858585]  bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
        </div>

        <div class="mt-5 flex gap-5">
          <div class="flex-1 "> <label class="lg:text-[15px] text-[13px]  font-medium">Expiry Date </label>
            <input placeholder="MM/YY" type="text" class="bg-white placeholder:text-[#858585]  px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
          </div>

          <div class="flex-1 "> <label class="lg:text-[15px] text-[13px]  font-medium">CVC</label>
            <input placeholder="123" type="text" class="bg-white placeholder:text-[#858585] px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
          </div>
        </div>

        <div class="mt-5">
          <label class="lg:text-[15px] text-[13px]  font-medium">Name of card</label>
          <input type="text" class="placeholder:text-[#858585]  bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full ">
        </div>
      </div>
    </div>

    <div class="col-span-1 border-[#E6E6E6] border rounded-md lg:rounded-2xl px-6 pt-5  pb-6">
      <h2 class="lg:text-[19px] text-[16px] font-medium">Order Summary</h2>

      <div class="mt-4 space-y-1 border-[#B0B0B0] border-b pb-5 flex gap-4">
        <div>
          <img class="h-[100px] rounded-md object-cover w-[90px]" src="./images/product-2.jpg" alt="">
        </div>

        <div>
          <h3 class="lg:text-[15px] text-[14px] font-medium">Celestial Evening Gown</h3>
          <p class="text-[#9D9D9D] text-[13px] lg:text-[14px] font-medium">Midnight Blue/M</p>
          <p class="text-[#9D9D9D] text-[13px] lg:text-[14px] font-medium">QTY: 1</p>
          <p class="text-[#FF71A8] text-[14px] lg:text-[16px] font-medium mt-4 lg:mt-2">$389.99</p>
        </div>
      </div>

      <div class="mt-4 space-y-1 lg:text-[16px] text-[14px] border-[#B0B0B0] border-b pb-5">
        <div class="flex justify-between ">
          <p class="text-[#737373] ">Subtotal:</p>
          <p>$389.99</p>
        </div>

        <div class="flex justify-between ">
          <p class="text-[#737373]  ">Shipping:</p>
          <p class=" text-[#389528]">Free</p>
        </div>

        <div class="flex justify-between ">
          <p class="text-[#737373] ">Tax (8%)</p>
          <p>$31.20</p>
        </div>
      </div>

      <div class="flex justify-between lg:text-[18px] text-[15px] mt-3">
        <p>Total:</p>
        <p>$421.19</p>
      </div>

      <div class="mt-4">
        <a href="order-confirmed.php" class="text-white bg-[#FF71A8] lg:text-[14px] text-[13px] font-medium text-center py-2.5 block w-full rounded-md ">Complete Order</a>
      </div>



    </div>
  </div>
</section>



@endsection
