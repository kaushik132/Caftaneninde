@extends('layout.dashboard.main')
@section('content')


<section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] z-[-99]">
  <div class="text-center px-10 lg:px-0">
    <h2 class="font-semibold  lg:text-[38px] text-[20px] ">Shopping Cart</h2>
    <p class="font-medium text-[12px] lg:-mt-1">1 item in your cart</p>
  </div>

  <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/left-leave.png" alt="">
  <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/right-leave.png" alt="">
</section>

<section class="lg:px-12 px-4 lg:py-14 py-10">
  <div class="grid lg:grid-cols-3 grid-cols-1 gap-6 items-start">

   <div class="lg:col-span-2 space-y-4">
  <div class="cart-item border-[#E6E6E6] border lg:rounded-2xl rounded-md px-3 py-3 lg:px-4 lg:py-4" data-price="389.99">
    <div class="flex gap-3 lg:gap-4">
      <img class="w-[100px] h-[130px] lg:w-[150px] lg:h-[200px] object-cover lg:rounded-lg rounded-md" src="./images/product-2.jpg" alt="Product Image">

      <div class="flex-1 flex flex-col justify-between">
        <div>
          <div class="flex justify-between items-start">
            <h3 class="lg:text-[22px] text-[15px] font-semibold leading-tight pr-2">Celestial Evening Gown</h3>
            <i class="remove-btn fa-solid fa-xmark lg:text-[20px] text-[18px] cursor-pointer hover:text-red-500 transition-colors"></i>
          </div>
          <p class="text-[#9D9D9D] lg:text-[14px] text-[11px] mt-1">Color: Midnight Blue</p>
          <p class="text-[#9D9D9D] lg:text-[14px] text-[11px]">Size: M</p>
        </div>

        <div class="mt-4 lg:mt-0 flex flex-col lg:flex-row lg:justify-between lg:items-end gap-3">

          <div class="flex items-center gap-2">
            <p class="lg:text-[15px] text-[12px] font-medium text-[#898888]">Qty:</p>
            <div class="flex items-center gap-2 lg:gap-4 bg-gray-50 p-1 rounded-md border border-gray-100">
              <button class="qty-decrease border-[#FF71A8] border cursor-pointer text-[#FF71A8] w-7 h-7 lg:w-8 lg:h-8 flex items-center justify-center rounded-md hover:bg-[#FF71A8] hover:text-white transition-all">
                <i class="fa-solid fa-minus text-[10px]"></i>
              </button>
              <span class="qty-value font-bold text-[13px] lg:text-[15px] min-w-[20px] text-center">1</span>
              <button class="qty-increase border-[#FF71A8] border cursor-pointer text-[#FF71A8] w-7 h-7 lg:w-8 lg:h-8 flex items-center justify-center rounded-md hover:bg-[#FF71A8] hover:text-white transition-all">
                <i class="fa-solid fa-plus text-[10px]"></i>
              </button>
            </div>
          </div>

          <div class="text-left lg:text-right border-t border-gray-50 pt-2 lg:border-none lg:pt-0">
            <h3 class="item-total text-[#FF71A8] lg:text-[22px] text-[18px] font-bold">$389.99</h3>
            <p class="lg:text-[13px] text-[11px] text-[#898888] font-medium">$389.99 each</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="mt-6">
    <a href="products.php" class="w-full lg:w-auto border-[#FF71A8] border rounded-md font-bold text-[#FF71A8] px-8 py-3 lg:text-[14px] text-[13px] inline-block text-center hover:bg-[#FF71A8] hover:text-white transition-all shadow-sm">
      <i class="fa-solid fa-arrow-left mr-2"></i> Continue Shopping
    </a>
  </div>
</div>

    <div class="col-span-1 border-[#E6E6E6] border rounded-2xl lg:px-6 px-4 lg:pt-5 pt-4  pb-6">
      <h2 class="lg:text-[19px] text-[15px] font-medium">Order Summary</h2>

      <div class="mt-4 space-y-1 lg:text-[16px] text-[13px] border-[#B0B0B0] border-b pb-5">
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

      <div class="flex justify-between lg:text-[18px] text-[14px] mt-3">
        <p>Total:</p>
        <p>$421.19</p>
      </div>

      <div class="mt-4">
        <a href="checkout.php" class="text-white bg-[#FF71A8] lg:text-[14px] text-[13px] font-medium text-center py-2.5 block w-full rounded-md ">Proceed to Checkout</a>
      </div>

      <ul class="text-[13px] mt-5 text-[#FF71A8] font-medium space-y-1">
        <li>✓ Secure checkout</li>
        <li> ✓ 30-day returns </li>
        <li> ✓ Money-back guarantee checkout</li>
      </ul>

    </div>
  </div>
</section>



@endsection
