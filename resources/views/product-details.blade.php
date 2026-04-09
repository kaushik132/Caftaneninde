@extends('layout.dashboard.main')
@section('content')

<div class="bg-[#FFF5F8] lg:py-5 py-3 px-4 lg:px-12 border-b border-[#FF71A8]/10">
  <div class="flex items-center gap-2 lg:text-[14px] text-[12px] font-medium">
    <a href="index.php" class="text-gray-500 hover:text-[#FF71A8] transition-colors flex items-center gap-2">
      <i class="fa-solid fa-house text-[12px]"></i> Home
    </a>

    <span class="text-gray-400"><i class="fa-solid fa-chevron-right text-[10px]"></i></span>

    <a href="{{url('products')}}" class="text-gray-500 hover:text-[#FF71A8] transition-colors">
      Product
    </a>

    <span class="text-gray-400"><i class="fa-solid fa-chevron-right text-[10px]"></i></span>

    <span class="text-[#FF71A8] truncate max-w-[150px] lg:max-w-none">
      Midnight Velvet Gown
    </span>
  </div>
</div>
<!-- product setail section  -->
<section class="lg:px-12 px-4 py-5">
  <div>
    <a href="{{url('products')}}" class="lg:text-[14px] text-[13px] font-medium hover:text-[#FF71A8] transition">
      <i class="fa-solid fa-arrow-left mr-1"></i> Back
    </a>
  </div>

  <div class="mt-5 grid lg:grid-cols-5 grid-cols-1 lg:gap-7 gap-10">
    <div class="lg:col-span-2">
      <div id="zoomContainer" class="lg:h-[550px] h-[400px] relative overflow-hidden cursor-zoom-in border rounded-md bg-gray-50">
        <img id="mainImage" class="w-full h-full object-cover rounded-md transition-transform duration-300 origin-center"
          src="https://images.unsplash.com/photo-1566174053879-31528523f8ae?q=80&w=800&auto=format&fit=crop"
          alt="Product Image">
        <span class="bg-[#FF71A8] top-4 left-5 absolute text-white text-[10px] lg:text-[11px] font-medium px-4 py-1 rounded-md z-10">New Arrival</span>
      </div>

      <div class="flex lg:gap-5 gap-3 mt-3 lg:mt-5">
        <div class="w-[33%] thumb-box border-2 border-[#FF71A8] rounded-md p-1 transition-all">
          <img class="product-thumb lg:h-[160px] h-[100px] w-full cursor-pointer rounded-md object-cover lg:object-top"
            src="https://images.unsplash.com/photo-1566174053879-31528523f8ae?q=80&w=800&auto=format&fit=crop" alt="Thumbnail 1">
        </div>
        <div class="w-[33%] thumb-box border-2 border-transparent opacity-60 rounded-md p-1 transition-all">
          <img class="product-thumb lg:h-[160px] h-[100px] w-full cursor-pointer rounded-md object-cover lg:object-top"
            src="https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?q=80&w=800&auto=format&fit=crop"
            alt="Thumbnail 2">
        </div>
        <div class="w-[33%] thumb-box border-2 border-transparent opacity-60 rounded-md p-1 transition-all">
          <img class="product-thumb lg:h-[160px] h-[100px] w-full cursor-pointer rounded-md object-cover lg:object-top"
            src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=800&auto=format&fit=crop" alt="Thumbnail 3">
        </div>
      </div>
    </div>

    <div class="lg:col-span-3">
      <div>
        <p class="text-[#FF71A8] lg:text-[14px] text-[12px] font-medium">Evening Gown</p>
        <h2 class="lg:text-[32px] text-[19px] font-semibold">Celestial Evening Gown</h2>
      </div>

      <div class="flex gap-4 items-end">
        <ul class="mt-1 flex gap-1 lg:text-[14px] text-[11px]">
          <li><i class="fa-solid fa-star text-[#FF71A8]"></i></li>
          <li><i class="fa-solid fa-star text-[#FF71A8]"></i></li>
          <li><i class="fa-solid fa-star text-[#FF71A8]"></i></li>
          <li><i class="fa-solid fa-star text-[#FF71A8]"></i></li>
          <li><i class="fa-solid fa-star text-[#D9D9D9]"></i></li>
        </ul>
        <p class="lg:text-[13px] text-[11px] font-medium text-[#333333]">4.8 (127 reviews)</p>
        <a href="#" class="font-medium lg:text-[13px] text-[11px] border-b border-dotted border-black hover:text-[#FF71A8]">Add Review</a>
      </div>

      <div class="lg:mt-4 mt-3 flex gap-4 items-end">
        <h2 class="lg:text-[24px] text-[18px] font-medium">$389.99</h2>
        <span class="text-[#08B302] bg-[#D2FFD1] font-medium lg:text-[13px] text-[10px] rounded-md px-4 py-1.5">In Stock</span>
      </div>

      <div class="lg:mt-4 mt-3 border-[#DEDEDE] border-b pb-5">
        <p class="font-medium lg:text-[14px] text-[11px] text-gray-600">Luxurious silk charmeuse with delicate hand-beaded embellishments. Timeless silhouette.</p>
      </div>

      <div class="mt-4">
        <p class="lg:text-[15px] text-[13px] font-medium">Color: Midnight Blue</p>
        <ul class="mt-2 flex gap-2" id="colorPicker">
          <li class="color-dot lg:w-8 w-6 lg:h-8 h-6 bg-[#80504D] rounded-full cursor-pointer border-2 border-white ring-2 ring-[#FF71A8]"></li>
          <li class="color-dot lg:w-8 w-6 lg:h-8 h-6 bg-[#FF7173] rounded-full cursor-pointer border-2 border-white"></li>
          <li class="color-dot lg:w-8 w-6 lg:h-8 h-6 bg-[#AF73EA] rounded-full cursor-pointer border-2 border-white"></li>
        </ul>
      </div>

      <div class="mt-7">
        <p class="lg:text-[15px] text-[13px] font-medium">Size:</p>
        <ul id="sizeList" class="flex flex-wrap mt-2 gap-2">
          <li class="size-btn cursor-pointer lg:text-[14px] text-[12px] text-[#FF71A8] border-[#FF71A8] border rounded-md lg:px-7 px-4 py-2 font-medium transition-all">XS</li>
          <li class="size-btn active cursor-pointer lg:text-[14px] text-[12px] bg-[#FF71A8] text-white border-[#FF71A8] border rounded-md lg:px-7 px-4 py-2 font-medium transition-all">S</li>
          <li class="size-btn cursor-pointer lg:text-[14px] text-[12px] text-[#FF71A8] border-[#FF71A8] border rounded-md lg:px-7 px-4 py-2 font-medium transition-all">M</li>
          <li class="size-btn cursor-pointer lg:text-[14px] text-[12px] text-[#FF71A8] border-[#FF71A8] border rounded-md lg:px-7 px-4 py-2 font-medium transition-all">L</li>
        </ul>
      </div>

      <div class="mt-5 border-[#DEDEDE] border-b pb-6">
        <p class="lg:text-[15px] text-[13px] font-medium">Quantity:</p>
        <div class="mt-2 flex gap-5 items-center">
          <button id="decreaseQty" class="border-[#FF71A8] border cursor-pointer text-[#FF71A8] px-3 py-1.5 rounded-md hover:bg-[#FF71A8] hover:text-white transition"><i class="fa-solid fa-minus"></i></button>
          <span id="qtyValue" class="font-bold text-lg w-6 text-center">1</span>
          <button id="increaseQty" class="border-[#FF71A8] border cursor-pointer text-[#FF71A8] px-3 py-1.5 rounded-md hover:bg-[#FF71A8] hover:text-white transition"><i class="fa-solid fa-plus"></i></button>
        </div>
      </div>

      <div class="mt-6 w-full md:w-[70%]">
        <div class="flex gap-3">
          <a href="javascript:void(0)"
            id="addToCartBtn"
            data-id="p101"
            data-name="Celestial Evening Gown"
            data-price="389.99"
            data-img="./images/product-2.jpg"
            class="flex-1 bg-[#FF71A8] hover:bg-black text-white font-bold py-3.5 rounded-md shadow-md transition-all flex items-center justify-center gap-2 cursor-pointer text-center no-underline">
            <i class="fa-solid fa-cart-shopping text-sm"></i>
            <span>Add to cart</span>
          </a>

          <button id="wishlistBtn" onclick="toggleHeart()" class="border border-[#FF71A8] text-[#FF71A8] hover:bg-[#FF71A8] hover:text-white transition-all w-[55px] h-[55px] rounded-md flex items-center justify-center cursor-pointer group">
            <i id="heartIcon" class="fa-regular fa-heart text-xl transition-all duration-300"></i>
          </button>

          <button onclick="toggleShareModal(true)" class="border border-[#FF71A8] text-[#FF71A8] hover:bg-[#FF71A8] hover:text-white transition-all w-[55px] h-[55px] rounded-md flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-share-nodes text-xl"></i>
          </button>

          <div id="shareModal" class="fixed inset-0 bg-black/50 z-[10000] hidden flex items-center justify-center px-4">
            <div class="bg-white w-full max-w-sm rounded-2xl p-6 relative animate-zoomIn">
              <button onclick="toggleShareModal(false)" class="absolute top-4 right-4 text-gray-400 hover:text-black text-2xl cursor-pointer">&times;</button>

              <h3 class="text-lg font-bold mb-4 text-center">Share this Gown</h3>

              <div class="grid grid-cols-4 gap-4 mb-6">
                <a href="#" class="flex flex-col items-center gap-1 group">
                  <div class="w-12 h-12 rounded-full bg-[#1877F2]/10 flex items-center justify-center text-[#1877F2] group-hover:bg-[#1877F2] group-hover:text-white transition-all">
                    <i class="fa-brands fa-facebook-f text-xl"></i>
                  </div>
                  <span class="text-[10px] font-medium">Facebook</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-1 group">
                  <div class="w-12 h-12 rounded-full bg-[#25D366]/10 flex items-center justify-center text-[#25D366] group-hover:bg-[#25D366] group-hover:text-white transition-all">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                  </div>
                  <span class="text-[10px] font-medium">WhatsApp</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-1 group">
                  <div class="w-12 h-12 rounded-full bg-[#E4405F]/10 flex items-center justify-center text-[#E4405F] group-hover:bg-[#E4405F] group-hover:text-white transition-all">
                    <i class="fa-brands fa-instagram text-xl"></i>
                  </div>
                  <span class="text-[10px] font-medium">Instagram</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-1 group">
                  <div class="w-12 h-12 rounded-full bg-[#1DA1F2]/10 flex items-center justify-center text-[#1DA1F2] group-hover:bg-[#1DA1F2] group-hover:text-white transition-all">
                    <i class="fa-brands fa-twitter text-xl"></i>
                  </div>
                  <span class="text-[10px] font-medium">Twitter</span>
                </a>
              </div>

              <div class="relative">
                <input id="copyInput" type="text" readonly value="https://caftanenide.com/product/celestial-gown" class="w-full bg-gray-50 border border-gray-200 rounded-lg py-2.5 px-3 text-[12px] outline-none">
                <button onclick="copyToClipboard()" class="absolute right-2 top-1.5 bg-[#FF71A8] text-white px-3 py-1 rounded text-[11px] font-bold">Copy</button>
              </div>
            </div>
          </div>
        </div>

        <a href="checkout.php" class="w-full mt-3 border border-[#FF71A8] text-[#FF71A8] font-bold py-3.5 rounded-md hover:bg-[#ffe1ed] transition-all cursor-pointer inline-block text-center">
          Buy Now
        </a>
      </div>

      <div class="flex mt-8 lg:gap-4 gap-2 w-full md:w-[70%]">
        <div class="bg-[#FF97BF] flex-1 lg:rounded-2xl rounded-xl text-center p-4 shadow-sm hover:scale-105 transition-transform">
          <div class="bg-[#FF67A2] mx-auto lg:w-12 lg:h-12 w-10 h-10 flex justify-center items-center rounded-full mb-2">
            <img class="lg:w-6 w-5" src="./images/van.png" alt="Shipping">
          </div>
          <h3 class="text-white lg:text-[13px] text-[11px] font-bold leading-tight">Complimentary Shipping</h3>
          <p class="text-white lg:text-[11px] text-[9px] mt-1 opacity-90">On all orders worldwide</p>
        </div>

        <div class="bg-[#FF97BF] flex-1 lg:rounded-2xl rounded-xl text-center p-4 shadow-sm hover:scale-105 transition-transform">
          <div class="bg-[#FF67A2] mx-auto lg:w-12 lg:h-12 w-10 h-10 flex justify-center items-center rounded-full mb-2">
            <img class="lg:w-6 w-5" src="./images/shopping.png" alt="Secure">
          </div>
          <h3 class="text-white lg:text-[13px] text-[11px] font-bold leading-tight">Secure Checkout</h3>
          <p class="text-white lg:text-[11px] text-[9px] mt-1 opacity-90">Protected payment processing</p>
        </div>

        <div class="bg-[#FF97BF] flex-1 lg:rounded-2xl rounded-xl text-center p-4 shadow-sm hover:scale-105 transition-transform">
          <div class="bg-[#FF67A2] mx-auto lg:w-12 lg:h-12 w-10 h-10 flex justify-center items-center rounded-full mb-2">
            <img class="lg:w-6 w-5" src="./images/return.png" alt="Returns">
          </div>
          <h3 class="text-white lg:text-[13px] text-[11px] font-bold leading-tight">Flexible Returns</h3>
          <p class="text-white lg:text-[11px] text-[9px] mt-1 opacity-90">30-day return policy</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- tab section  -->

<section class="py-5 lg:px-12 px-4">
  <div class="bg-[#FFE1ED] px-2 flex justify-between py-2 rounded-sm mb-6">
    <button onclick="openTab(event, 'details')" class="tab-btn lg:px-20 px-4 flex-1 cursor-pointer rounded-sm py-1.5 bg-white text-[#FF71A8] lg:text-[14px] text-[12px] font-bold transition-all shadow-sm">Details</button>
    <button onclick="openTab(event, 'featured')" class="tab-btn lg:px-20 px-4 flex-1 cursor-pointer rounded-sm py-1.5 text-[#FF71A8] lg:text-[14px] text-[12px] font-medium transition-all">Featured</button>
    <button onclick="openTab(event, 'reviews')" class="tab-btn lg:px-20 px-4 flex-1 cursor-pointer rounded-sm py-1.5 text-[#FF71A8] lg:text-[14px] text-[12px] font-medium transition-all">Review</button>
  </div>

  <div id="details" class="tab-content bg-[#FAFAFA] lg:px-10 px-5 py-8 rounded-2xl animate-fadeIn">
    <h2 class="font-bold lg:text-[18px] text-[15px] mb-4">Product Details</h2>
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-10">
      <div class="col-span-1">
        <h3 class="font-bold text-[14px] mb-3">Specifications</h3>
        <ul class="space-y-3 lg:text-[14px] text-[12px] text-[#757575] font-medium">
          <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Fabric:</span> <span class="text-black">100% Silk Charmeuse</span></li>
          <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Lining:</span> <span class="text-black">Polyester blend</span></li>
          <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Care:</span> <span class="text-black">Dry clean only</span></li>
          <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Origin:</span> <span class="text-black">Made in Italy</span></li>
          <li class="flex justify-between border-b border-[#e5e5e5] pb-2"><span>Fit:</span> <span class="text-black">True to size</span></li>
        </ul>
      </div>
      <div class="lg:col-span-2">
        <h3 class="font-bold text-[14px] mb-2">Description</h3>
        <p class="text-gray-600 leading-relaxed lg:text-[14px] text-[12px]">An exquisite evening gown crafted from luxurious silk charmeuse with delicate hand-beaded embellishments. This timeless piece features a flattering silhouette that drapes beautifully, making it perfect for galas, formal events, and special occasions.</p>
      </div>
    </div>
  </div>

  <div id="featured" class="tab-content hidden bg-[#FAFAFA] lg:px-10 px-5 py-8 rounded-2xl animate-fadeIn">
    <h2 class="font-bold lg:text-[18px] text-[15px] mb-6">Key Features</h2>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-y-4 gap-x-10 text-gray-700 lg:text-[15px] text-[13px] font-medium">
      <div class="flex items-center gap-2">• Premium silk charmeuse fabric</div>
      <div class="flex items-center gap-2">• Hand-beaded embellishments</div>
      <div class="flex items-center gap-2">• Flattering A-line silhouette</div>
      <div class="flex items-center gap-2">• Hidden back zipper</div>
      <div class="flex items-center gap-2">• Fully lined</div>
      <div class="flex items-center gap-2">• Dry clean only</div>
    </div>
  </div>

  <div id="reviews" class="tab-content hidden bg-white lg:px-10 px-5 py-8 border border-gray-100 rounded-2xl animate-fadeIn">
    <div class="flex justify-between items-start mb-8">
      <h2 class="font-bold lg:text-[20px] text-[16px]">Customer Reviews</h2>
      <button onclick="toggleModal(true)" class="bg-[#FF71A8] text-white px-6 py-2 rounded-md lg:text-[14px] text-[12px] font-bold hover:bg-black transition cursor-pointer">Write Review</button>
    </div>

    <div class="flex flex-col lg:flex-row gap-10 items-center border-b pb-10">
      <div class="text-center">
        <h1 class="text-[48px] font-bold leading-none">4.8</h1>
        <div class="flex text-[#FF71A8] gap-1 my-2">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
        </div>
        <p class="text-gray-400 text-[12px]">127 reviews</p>
      </div>

      <div class="flex-1 w-full space-y-2">
        <div class="flex items-center gap-4 text-[12px] font-bold">
          <span>5 Star</span>
          <div class="flex-1 bg-gray-100 h-2 rounded-full">
            <div class="bg-[#FF71A8] w-[85%] h-full rounded-full"></div>
          </div> <span>85%</span>
        </div>
        <div class="flex items-center gap-4 text-[12px] font-bold text-gray-400">
          <span>4 Star</span>
          <div class="flex-1 bg-gray-100 h-2 rounded-full">
            <div class="bg-[#FF71A8] w-[30%] h-full rounded-full opacity-50"></div>
          </div> <span>30%</span>
        </div>
        <div class="flex items-center gap-4 text-[12px] font-bold text-gray-400">
          <span>3 Star</span>
          <div class="flex-1 bg-gray-100 h-2 rounded-full">
            <div class="bg-[#FF71A8] w-[20%] h-full rounded-full opacity-50"></div>
          </div> <span>20%</span>
        </div>
      </div>
    </div>

    <div class="mt-8 space-y-6">
      <div class="p-5 border border-gray-50 rounded-xl flex gap-4 bg-gray-50/30">
        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=150" class="w-12 h-12 rounded-full object-cover shadow-md">
        <div>
          <div class="flex justify-between w-full">
            <h4 class="font-bold text-[14px]">Sarah Johnson <span class="ml-2 bg-green-100 text-green-600 px-2 py-0.5 rounded text-[10px]">Verified Purchase</span></h4>
          </div>
          <div class="flex text-[#FF71A8] text-[10px] gap-0.5 my-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
          <p class="font-bold text-[12px] mt-1">Absolutely Stunning!</p>
          <p class="text-gray-500 text-[12px] mt-1">This gown exceeded all my expectations. The quality is impeccable!</p>
        </div>
      </div>
      <div class="p-5 border border-gray-50 rounded-xl flex gap-4 bg-gray-50/30">
        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=150" class="w-12 h-12 rounded-full object-cover shadow-md">
        <div>
          <div class="flex justify-between w-full">
            <h4 class="font-bold text-[14px]">Sarah Johnson <span class="ml-2 bg-green-100 text-green-600 px-2 py-0.5 rounded text-[10px]">Verified Purchase</span></h4>
          </div>
          <div class="flex text-[#FF71A8] text-[10px] gap-0.5 my-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
          <p class="font-bold text-[12px] mt-1">Absolutely Stunning!</p>
          <p class="text-gray-500 text-[12px] mt-1">This gown exceeded all my expectations. The quality is impeccable!</p>
        </div>
      </div>
      <div class="p-5 border border-gray-50 rounded-xl flex gap-4 bg-gray-50/30">
        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=150" class="w-12 h-12 rounded-full object-cover shadow-md">
        <div>
          <div class="flex justify-between w-full">
            <h4 class="font-bold text-[14px]">Sarah Johnson <span class="ml-2 bg-green-100 text-green-600 px-2 py-0.5 rounded text-[10px]">Verified Purchase</span></h4>
          </div>
          <div class="flex text-[#FF71A8] text-[10px] gap-0.5 my-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
          <p class="font-bold text-[12px] mt-1">Absolutely Stunning!</p>
          <p class="text-gray-500 text-[12px] mt-1">This gown exceeded all my expectations. The quality is impeccable!</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div id="reviewModal" class="fixed inset-0 bg-black/50 z-[9999] hidden flex items-center justify-center px-4">
  <div class="bg-white w-full max-w-2xl rounded-2xl p-8 relative max-h-[90vh] overflow-y-auto animate-zoomIn">
    <button onclick="toggleModal(false)" class="absolute top-5 right-5 text-gray-400 hover:text-black text-2xl cursor-pointer">&times;</button>

    <h2 class="text-[22px] font-bold">Write a Review</h2>
    <p class="text-gray-500 text-[14px] mb-6">Share your thoughts about the Celestial Evening Gown</p>

    <form class="space-y-5">
      <div>
        <label class="block font-bold text-[14px] mb-2">Overall Rating*</label>
        <div class="flex text-gray-300 gap-2 text-2xl cursor-pointer">
          <i class="fa-regular fa-star hover:text-[#FF71A8]"></i><i class="fa-regular fa-star hover:text-[#FF71A8]"></i><i class="fa-regular fa-star hover:text-[#FF71A8]"></i><i class="fa-regular fa-star hover:text-[#FF71A8]"></i><i class="fa-regular fa-star hover:text-[#FF71A8]"></i>
        </div>
      </div>

      <div>
        <label class="block font-bold text-[14px] mb-1">Review Title*</label>
        <input type="text" placeholder="Summarize your experience" class="w-full bg-gray-50 border-none rounded-lg p-3 text-[14px] focus:ring-2 focus:ring-[#FF71A8] outline-none">
      </div>

      <div>
        <label class="block font-bold text-[14px] mb-1">Your Review*</label>
        <textarea rows="4" placeholder="Share details about your experience..." class="w-full bg-gray-50 border-none rounded-lg p-3 text-[14px] focus:ring-2 focus:ring-[#FF71A8] outline-none"></textarea>
        <p class="text-right text-[10px] text-gray-400 mt-1">Minimum 100 Characters</p>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block font-bold text-[14px] mb-1">Your Name*</label>
          <input type="text" placeholder="Enter your name" class="w-full bg-gray-50 border-none rounded-lg p-3 text-[14px] focus:ring-2 focus:ring-[#FF71A8] outline-none">
        </div>
        <div>
          <label class="block font-bold text-[14px] mb-1">Email Address*</label>
          <input type="email" placeholder="Your email@example.com" class="w-full bg-gray-50 border-none rounded-lg p-3 text-[14px] focus:ring-2 focus:ring-[#FF71A8] outline-none">
        </div>
      </div>

      <div class="bg-gray-50 p-4 rounded-xl flex justify-between items-center">
        <div>
          <p class="font-bold text-[14px]">Would you recommended this product?</p>
          <p class="text-gray-400 text-[11px]">Help other customers make informed decisions</p>
        </div>
        <input type="checkbox" class="w-10 h-5 accent-[#FF71A8]">
      </div>

      <div>
        <label class="block font-bold text-[14px] mb-1">Add Photos (Optional)</label>
        <div class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center cursor-pointer hover:border-[#FF71A8] transition">
          <i class="fa-solid fa-upload text-gray-400 text-2xl mb-2"></i>
          <p class="text-[12px] text-gray-500">Click to upload images</p>
        </div>
      </div>

      <div class="flex gap-4 pt-4">
        <button type="button" onclick="toggleModal(false)" class="flex-1 border border-[#FF71A8] text-[#FF71A8] font-bold py-3 rounded-md">Cancel</button>
        <button type="submit" class="flex-1 bg-[#FF71A8] text-white font-bold py-3 rounded-md hover:bg-black transition">Submit Review</button>
      </div>
    </form>
  </div>
</div>

<!-- related peoducts section -->

<section class="lg:pt-10  pt-8">
  <div class="lg:pl-12 px-4 lg:pr-0">
    <h2 class="lg:text-[26px] text-[20px] font-semibold">You May Also Like</h2>
  </div>

  <!-- Slider Container -->
  <div id="customProductSwiper" class="swiper relative lg:!pl-10 lg:!pr-0 !px-4 !pb-5 mt-4">
    <div class="swiper-wrapper">
      <!-- Slide 1 -->

      <div class="swiper-slide">
        <div class="bg-white lg:rounded-xl rounded-md shadow">
          <div class="relative">
            <img src="./images/2.jpg" alt="" class="lg:rounded-xl rounded-md  lg:h-[350px] h-[150px]   !w-full object-cover object-top" />
            <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
              <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1  text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">New
              </p>
              <div class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px]">
                <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
              </div>
            </div>
            <div class="absolute lg:bottom-5 bottom-2 lg:px-6  px-3  w-full">
              <a href="product-details.php" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">View
                Details</a>
            </div>
          </div>
          <div class="lg:p-4 p-3">
            <h3 class="lg:text-[15px] text-[12px] font-medium">Midnight Velvet Gown</h3>
            <ul class="flex gap-1 mt-1">
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
            </ul>
            <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">$449.99</h3>
          </div>
        </div>
      </div>


      <div class="swiper-slide">
        <div class="bg-white lg:rounded-xl rounded-md shadow">
          <div class="relative">
            <img src="./images/2.jpg" alt="" class="lg:rounded-xl rounded-md  lg:h-[350px] h-[150px]   !w-full object-cover object-top" />
            <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
              <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1  text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">New
              </p>
              <div class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px]">
                <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
              </div>
            </div>
            <div class="absolute lg:bottom-5 bottom-2 lg:px-6  px-3  w-full">
              <a href="product-details.php" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">View
                Details</a>
            </div>
          </div>
          <div class="lg:p-4 p-3">
            <h3 class="lg:text-[15px] text-[12px] font-medium">Midnight Velvet Gown</h3>
            <ul class="flex gap-1 mt-1">
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
            </ul>
            <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">$449.99</h3>
          </div>
        </div>
      </div>


      <div class="swiper-slide">
        <div class="bg-white lg:rounded-xl rounded-md shadow">
          <div class="relative">
            <img src="./images/2.jpg" alt="" class="lg:rounded-xl rounded-md  lg:h-[350px] h-[150px]   !w-full object-cover object-top" />
            <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
              <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1  text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">New
              </p>
              <div class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px]">
                <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
              </div>
            </div>
            <div class="absolute lg:bottom-5 bottom-2 lg:px-6  px-3  w-full">
              <a href="product-details.php" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">View
                Details</a>
            </div>
          </div>
          <div class="lg:p-4 p-3">
            <h3 class="lg:text-[15px] text-[12px] font-medium">Midnight Velvet Gown</h3>
            <ul class="flex gap-1 mt-1">
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
            </ul>
            <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">$449.99</h3>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="bg-white lg:rounded-xl rounded-md shadow">
          <div class="relative">
            <img src="./images/2.jpg" alt="" class="lg:rounded-xl rounded-md  lg:h-[350px] h-[150px]   !w-full object-cover object-top" />
            <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
              <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1  text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">New
              </p>
              <div class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px]">
                <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
              </div>
            </div>
            <div class="absolute lg:bottom-5 bottom-2 lg:px-6  px-3  w-full">
              <a href="product-details.php" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">View
                Details</a>
            </div>
          </div>
          <div class="lg:p-4 p-3">
            <h3 class="lg:text-[15px] text-[12px] font-medium">Midnight Velvet Gown</h3>
            <ul class="flex gap-1 mt-1">
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
            </ul>
            <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">$449.99</h3>
          </div>
        </div>
      </div>

      <!-- Add more slides here -->
    </div>

    <!-- Custom Navigation Buttons -->
    <button id="productPrev" class="absolute hidden lg:block z-[99999] cursor-pointer text-[#FF71A8] left-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-r-md shadow-lg transition">
      <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button id="productNext" class="absolute z-[99999] hidden lg:block cursor-pointer text-[#FF71A8] right-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-l-md shadow-lg transition">
      <i class="fa-solid fa-chevron-right"></i>
    </button>

  </div>
</section>

<section>
  <!-- Slider Container -->
  <div id="customProductSwiper" class="swiper relative lg:!pl-10 lg:!pr-0 !px-4 !pb-5 mt-4">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="bg-white lg:rounded-xl rounded-md shadow">
          <div class="relative">
            <img src="./images/2.jpg" alt="" class="lg:rounded-xl rounded-md  lg:h-[350px] h-[150px]   !w-full object-cover object-top" />
            <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
              <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1  text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">New
              </p>
              <div class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px]">
                <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
              </div>
            </div>
            <div class="absolute lg:bottom-5 bottom-2 lg:px-6  px-3  w-full">
              <a href="product-details.php" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">View
                Details</a>
            </div>
          </div>
          <div class="lg:p-4 p-3">
            <h3 class="lg:text-[15px] text-[12px] font-medium">Midnight Velvet Gown</h3>
            <ul class="flex gap-1 mt-1">
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
            </ul>
            <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">$449.99</h3>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="bg-white lg:rounded-xl rounded-md shadow">
          <div class="relative">
            <img src="./images/2.jpg" alt="" class="lg:rounded-xl rounded-md  lg:h-[350px] h-[150px]   !w-full object-cover object-top" />
            <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
              <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1  text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">New
              </p>
              <div class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px]">
                <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
              </div>
            </div>
            <div class="absolute lg:bottom-5 bottom-2 lg:px-6  px-3  w-full">
              <a href="product-details.php" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">View
                Details</a>
            </div>
          </div>
          <div class="lg:p-4 p-3">
            <h3 class="lg:text-[15px] text-[12px] font-medium">Midnight Velvet Gown</h3>
            <ul class="flex gap-1 mt-1">
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
            </ul>
            <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">$449.99</h3>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="bg-white lg:rounded-xl rounded-md shadow">
          <div class="relative">
            <img src="./images/2.jpg" alt="" class="lg:rounded-xl rounded-md  lg:h-[350px] h-[150px]   !w-full object-cover object-top" />
            <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
              <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1  text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">New
              </p>
              <div class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px]">
                <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
              </div>
            </div>
            <div class="absolute lg:bottom-5 bottom-2 lg:px-6  px-3  w-full">
              <a href="product-details.php" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">View
                Details</a>
            </div>
          </div>
          <div class="lg:p-4 p-3">
            <h3 class="lg:text-[15px] text-[12px] font-medium">Midnight Velvet Gown</h3>
            <ul class="flex gap-1 mt-1">
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
            </ul>
            <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">$449.99</h3>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="bg-white lg:rounded-xl rounded-md shadow">
          <div class="relative">
            <img src="./images/2.jpg" alt="" class="lg:rounded-xl rounded-md  lg:h-[350px] h-[150px]   !w-full object-cover object-top" />
            <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full">
              <p class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1  text-[10px] lg:text-[11px] font-medium w-fit rounded-sm">New
              </p>
              <div class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[30px] lg:min-w-[30px] h-[25px] min-w-[25px]">
                <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
              </div>
            </div>
            <div class="absolute lg:bottom-5 bottom-2 lg:px-6  px-3  w-full">
              <a href="product-details.php" class="bg-[#FF71A8] mt-6 lg:py-2 py-1.5 rounded-md text-center inline-block w-full lg:text-[14px] text-[12px] font-medium text-white">View
                Details</a>
            </div>
          </div>
          <div class="lg:p-4 p-3">
            <h3 class="lg:text-[15px] text-[12px] font-medium">Midnight Velvet Gown</h3>
            <ul class="flex gap-1 mt-1">
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
              <li class="bg-[#FFE1ED] lg:h-4 lg:w-4 w-2 h-2 rounded-full"></li>
            </ul>
            <h3 class="text-[#FF71A8] lg:text-[16px] text-[12px] font-medium mt-1.5">$449.99</h3>
          </div>
        </div>
      </div>

      <!-- Add more slides here -->
    </div>

    <!-- Custom Navigation Buttons -->
    <button id="productPrev" class="absolute z-[99999] hidden lg:block  cursor-pointer text-[#FF71A8] left-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-r-md shadow-lg transition">
      <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button id="productNext" class="absolute z-[99999] hidden lg:block   cursor-pointer text-[#FF71A8] right-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-l-md shadow-lg transition">
      <i class="fa-solid fa-chevron-right"></i>
    </button>

  </div>
</section>

<div class="bg-white/85 backdrop-blur shadow-t-sm pb-5 pt-6 px-6 lg:hidden w-full z-[9] fixed bottom-0">
  <!-- Icons -->
  <ul class="flex justify-between  items-center">
    <li><a href="#"><img class="w-[19px]" src="./images/search-icon.png" alt=""></a></li>
    <li><a href="#"><img class="w-[19px]" src="./images/heart.png" alt=""></a></li>
    <li><a href="#"><img class="w-[19px]" src="./images/user.png" alt=""></a></li>
    <li class="relative">
      <a href="#"><img class="w-[19px]" src="./images/bag-1.png" alt=""></a>
      <span class="bg-[#FF71A8] -top-1 -right-2 h-[16px] flex justify-center text-[10px] font-medium text-white items-center w-[16px] rounded-full absolute">1</span>
    </li>
  </ul>
</div>



@endsection
