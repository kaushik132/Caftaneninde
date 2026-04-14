@extends('layout.dashboard.main')
@section('content')


<style>
  footer {
    display: none !important;
  }
</style>




<div class="lg:w-[700px] w-full pb-14 lg:mx-auto text-center lg:mt-20 mt-44 border-[#D5D5D5] lg:border rounded-md pt-14 px-4 bg-white shadow-sm animate-zoomIn">
  <div class="relative w-fit mx-auto">
    <img class="lg:w-[100px] w-[65px] mx-auto animate-bounceIn" src="./images/check-mark.png" alt="Success">
  </div>

  <h2 class="font-bold lg:text-[28px] text-[22px] mt-4 text-gray-800">Order Confirmed!</h2>

  <p class="lg:text-[15px] text-[13px] px-6 lg:px-20 font-medium text-gray-500 mt-1">
    Thank you for your purchase. We have sent a confirmation email with your order details to your registered address.
  </p>

  <p class="lg:text-[16px] text-[14px] font-bold text-[#FF71A8] mt-3 tracking-wide">
    Order Number: #ORD-10600
  </p>

  <div class="lg:mt-10 mt-7 flex flex-wrap justify-center gap-3">
    <a href="{{url('my-orders')}}" class="border border-[#FF71A8] px-10 lg:py-2.5 py-2 text-[#FF71A8] text-[13px] lg:text-[15px] font-bold inline-block rounded-md hover:bg-[#FFE1ED] transition-all">
      View Order
    </a>

    <a href="{{url('/')}}" class="bg-[#FF71A8] px-10 lg:py-2.5 py-2 text-white text-[13px] lg:text-[15px] font-bold inline-block rounded-md hover:bg-black transition-all shadow-md">
      Continue Shopping
    </a>
  </div>
</div>

<canvas id="confetti-canvas" class="fixed inset-0 pointer-events-none z-[9999]"></canvas>


@endsection
