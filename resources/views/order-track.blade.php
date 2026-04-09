@extends('layout.dashboard.main')
@section('content')


  <section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] z-[-99]">
    <div class="text-center px-10 lg:px-0">
      <h2 class="font-semibold  lg:text-[42px] text-[20px] ">Track Your Order</h2>
      <p class="font-medium text-[12px] lg:-mt-1">Enter your order number and email address to track your elegant gown's journey to you</p>
    </div>
    <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/left-leave.png" alt="">
    <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/right-leave.png" alt="">
  </section>

  <section class="lg:px-12 px-4 lg:pt-12 pt-10 pb-32">
    <div class="lg:mx-32 bg-[#FFF8FB] lg:rounded-2xl rounded-md px-6 py-6">
      <h2 class="lg:text-[18px] text-[16px] font-medium text-center">Find Your Order</h2>
      <form class="mt-7 space-y-5">
        <div>
          <label class="lg:text-[15px] text-[13px] font-medium ">Order Number</label>
          <input placeholder="ORD-2025-002" class="lg:text-[14px] text-[13px] mt-0.5 py-2.5 px-4 rounded-md w-full bg-white" type="text">
          <p class="lg:text-[12px] text-[11px] font-medium mt-1 ">You can find this in your order confirmation email</p>
        </div>

        <div>
          <label class="lg:text-[15px] text-[13px] font-medium ">Email Address</label>
          <input placeholder="youexample@gmail.com" class="lg:text-[14px] text-[13px] mt-0.5 py-2.5 px-4 rounded-md w-full bg-white" type="text">
        </div>

        <div>
          <button type="submit" class="bg-[#FF71A8]  mt-4 rounded-md text-white w-full font-medium lg:text-[14px] text-[13px] cursor-pointer py-2">Track Order</button>
        </div>
      </form>
    </div>

    <div class="border-[#DADADA] border mt-7 lg:rounded-xl rounded-md lg:px-10 p-5 lg:py-7">
      <div class="flex justify-between items-center">
        <div>
          <h3 class="font-medium lg:text-[17px] text-[15px]">Order ORD-2025-002</h3>
          <p class="lg:text-[12px] text-[11px] -mt-0.5 font-medium text-[#707070]">Placed on February 28, 2025
          </p>
        </div>

        <div>
          <p class="lg:text-[13px] text-[11px] text-white font-medium rounded-sm bg-[#0436FF] px-4 lg:py-2 py-1.5 rounde-sm">Transit</p>
        </div>
      </div>

      <div class="mt-10 grid grid-cols-5">
        <div class="col-span-1 nextStep text-center">
          <div class="h-[66px] w-[66px] bg-[#FF71A8] mx-auto  rounded-full flex justify-center items-center">
            <img class="w-[24px]" src="./images/orderPlaced.png" alt="">
          </div>

          <p class="text-[#737373] text-[14px] mt-1.5 font-medium">Order Placed</p>
        </div>

        <div class="col-span-1 nextStep text-center">
          <div class="h-[66px] w-[66px] bg-[#FF71A8] mx-auto  rounded-full flex justify-center items-center">
            <img class="w-[24px]" src="./images/orderPlaced.png" alt="">
          </div>

          <p class="text-[#737373] text-[14px] mt-1.5 font-medium">Order Placed</p>
        </div>


        <div class="col-span-1 nextStep text-center">
          <div class="h-[66px] w-[66px] bg-[#FF71A8] mx-auto  rounded-full flex justify-center items-center">
            <img class="w-[24px]" src="./images/orderPlaced.png" alt="">
          </div>

          <p class="text-[#737373] text-[14px] mt-1.5 font-medium">Order Placed</p>
        </div>

        <div class="col-span-1 nextStep text-center">
          <div class="h-[66px] w-[66px] bg-[#FF71A8] mx-auto  rounded-full flex justify-center items-center">
            <img class="w-[24px]" src="./images/orderPlaced.png" alt="">
          </div>

          <p class="text-[#737373] text-[14px] mt-1.5 font-medium">Order Placed</p>
        </div>

        <div class="col-span-1  text-center">
          <div class="h-[66px] w-[66px] bg-[#FF71A8] mx-auto  rounded-full flex justify-center items-center">
            <img class="w-[24px]" src="./images/orderPlaced.png" alt="">
          </div>

          <p class="text-[#737373] text-[14px] mt-1.5 font-medium">Order Placed</p>
        </div>
      </div>

      <div class="mt-10 flex gap-32">
        <div>
          <div class="flex gap-2 items-start">
            <img class="w-[23px]" src="./images/van-2.png" alt="">

            <div>
              <p class="text-[#696969] font-medium text-[13px]">Tracking Number</p>
              <p class="text-[14px] font-medium">TRK987654321</p>
            </div>
          </div>

          <div class="flex gap-2 items-start mt-4">
            <img class="w-[16px] mt-1" src="./images/box.png" alt="">

            <div>
              <p class="text-[#696969] font-medium text-[13px]">Carrier</p>
              <p class="text-[14px] font-medium">Standard Shipping</p>
            </div>
          </div>


          <div class="flex gap-2 items-start mt-4">
            <img class="w-[16px] mt-1" src="./images/calender.png" alt="">

            <div>
              <p class="text-[#696969] font-medium text-[13px]">Estimated Delivery</p>
              <p class="text-[14px] font-medium">March 20, 2025</p>
            </div>
          </div>

        </div>

        <div class="flex gap-2 items-start ">
          <img class="w-[16px] mt-1" src="./images/pin-map.png" alt="">

          <div>
            <p class="text-[#696969] font-medium text-[13px]">Shipping Address</p>
            <p class="text-[14px] font-medium">Emily Martinez</p>
            <p class="text-[#696969] font-medium text-[13px]">456 Rose Boulevard</p>
            <p class="text-[#696969] font-medium text-[13px]">Los Angeles, CA 90001</p>
            <p class="text-[#696969] font-medium text-[13px]">+1 (555) 987-6543</p>

          </div>
        </div>
      </div>
    </div>

    <div class="border-[#DADADA] border mt-6 rounded-xl px-10 py-7">
      <h2 class="font-medium">Order Items</h2>

      <div class="border-[#D4D4D4] border-b pb-8">
        <div class="mt-5 flex justify-between">
          <div class="flex gap-2">
            <img class="w-[110px] h-[120px] object-cover rounded-md" src="./images/product-2.jpg" alt="">
            <div>
              <h3 class=" font-medium">Celestial Evening Gown</h3>
              <p class="text-[#9D9D9D] text-[15px] font-medium">Midnight Blue/M</p>
              <p class="text-[#898888] text-[15px] font-medium">QTY: 1</p>
            </div>
          </div>
          <h3 class="text-[16px] text-[#FF71A8] font-medium">$389.99</h3>

        </div>

        <div class="mt-5 flex justify-between">
          <div class="flex gap-2">
            <img class="w-[110px] h-[120px] object-cover rounded-md" src="./images/product-2.jpg" alt="">
            <div>
              <h3 class=" font-medium">Celestial Evening Gown</h3>
              <p class="text-[#9D9D9D] text-[15px] font-medium">Midnight Blue/M</p>
              <p class="text-[#898888] text-[15px] font-medium">QTY: 1</p>
            </div>
          </div>
          <h3 class="text-[16px] text-[#FF71A8] font-medium">$389.99</h3>

        </div>
      </div>

      <div class="flex justify-between items-center mt-5">
        <h2 class="font-medium">Total:</h2>
        <p class="font-medium text-[#FF71A8] text-[17px]">$389.99</p>
      </div>
    </div>
  </section>



@endsection
