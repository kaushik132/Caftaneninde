@extends('layout.dashboard.main')
@section('content')


<style>
  .slider-container {
    width: 100%;
    margin-top: 15px;
  }

  #priceSlider {
    -webkit-appearance: none;
    width: 100%;
    height: 6px;
    background: #eee;
    border-radius: 5px;
    outline: none;
    cursor: pointer;
  }

  /* Slider Thumb (Gola) for Chrome, Safari, Edge */
  #priceSlider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 18px;
    height: 18px;
    background: #FF71A8;
    border: 2px solid white;
    border-radius: 50%;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
  }

  /* Labels spacing */
  .labels {
    display: flex;
    justify-content: space-between;
    margin-top: 8px;
  }
</style>

<style>
  #filterSidebar.active { transform: translateX(0); }
  body.filter-open { overflow: hidden; }
</style>


<section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[60px] overflow-hidden">
  <div class="text-center px-4 relative z-10">
    <h2 class="font-semibold lg:text-[38px] text-[28px] leading-tight text-gray-800">
      Our Collection
    </h2>

    <p class="font-medium mt-2 lg:text-[16px] text-[13px] text-gray-600 max-w-[600px] mx-auto">
      Explore our curated selection of exquisite gowns for every special occasion
    </p>
  </div>

  <img class="absolute bottom-0 left-0 lg:w-[150px] w-[80px] pointer-events-none opacity-80 lg:opacity-100"
       src="./images/left-leave.png" alt="decoration">

  <img class="absolute bottom-0 right-0 lg:w-[150px] w-[80px] pointer-events-none opacity-80 lg:opacity-100"
       src="./images/right-leave.png" alt="decoration">
</section>


<main class="py-[40px] lg:py-[60px] lg:px-10 px-4 flex flex-col lg:flex-row items-start gap-8">

  <aside class="w-full lg:w-[26%] lg:sticky lg:top-[90px] border-[#D4D4D4] border rounded-2xl px-5 pt-5 pb-7 bg-white">
    <div class="flex justify-between items-center border-b lg:border-none pb-3 lg:pb-0 mb-4">
      <span class="text-[16px] font-bold">Filter</span>
      <span class="text-[14px] font-medium cursor-pointer text-[#FF71A8]">Clear All</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6">

      <div>
        <span class="text-[15px] font-bold block mb-3">Category</span>
        <div class="space-y-2">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" class="accent-[#FF71A8] w-4 h-4">
            <span class="text-[14px] font-medium text-gray-600">Evening Gown</span>
          </label>
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" class="accent-[#FF71A8] w-4 h-4">
            <span class="text-[14px] font-medium text-gray-600">Bridal</span>
          </label>
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" class="accent-[#FF71A8] w-4 h-4">
            <span class="text-[14px] font-medium text-gray-600">Cocktail Dresses</span>
          </label>
        </div>
      </div>

      <div>
        <span class="text-[15px] font-bold block mb-3">Price Range</span>
        <input type="range" min="0" max="1500" value="500" id="priceSlider" class="w-full accent-[#FF71A8]">
        <div class="flex justify-between text-[#A7A7A7] text-[12px] font-medium mt-1">
          <span>$0</span>
          <span>$1,500</span>
        </div>
      </div>

      <div>
        <span class="text-[15px] font-bold block mb-3">Size</span>
        <div class="flex flex-wrap gap-3">
          <label class="flex items-center gap-1 cursor-pointer border px-3 py-1 rounded-md text-[13px] hover:border-[#FF71A8]">
            <input type="checkbox" class="hidden"> XS
          </label>
          <label class="flex items-center gap-1 cursor-pointer border px-3 py-1 rounded-md text-[13px] hover:border-[#FF71A8]">
            <input type="checkbox" class="hidden"> S
          </label>
          <label class="flex items-center gap-1 cursor-pointer border px-3 py-1 rounded-md text-[13px] hover:border-[#FF71A8]">
            <input type="checkbox" class="hidden"> M
          </label>
          <label class="flex items-center gap-1 cursor-pointer border px-3 py-1 rounded-md text-[13px] hover:border-[#FF71A8]">
            <input type="checkbox" class="hidden"> XL
          </label>
        </div>
      </div>

      <div>
        <span class="text-[15px] font-bold block mb-3">Color</span>
        <ul class="flex flex-wrap gap-2">
          <li class="cursor-pointer h-6 w-6 bg-black rounded-full border shadow-sm"></li>
          <li class="cursor-pointer h-6 w-6 bg-white border rounded-full shadow-sm"></li>
          <li class="cursor-pointer h-6 w-6 bg-[#FF71A8] rounded-full shadow-sm"></li>
          <li class="cursor-pointer h-6 w-6 bg-[#08B302] rounded-full shadow-sm"></li>
        </ul>
      </div>

    </div>
  </aside>

  <section class="flex-1 w-full">
    <div class="flex justify-between items-center mb-6">
      <p class="text-[14px] font-medium text-[#6B6B6B]">Showing <span class="text-black font-bold">12</span> Products</p>

      <div class="relative w-40">
        <select class="appearance-none w-full pl-4 pr-10 py-2 bg-[#FF71A8] rounded-lg text-white text-[14px] font-bold outline-none cursor-pointer">
          <option value="">Sort: Featured</option>
          <option value="1">Price: Low-High</option>
          <option value="2">Price: High-Low</option>
        </select>
        <i class="fas fa-chevron-down text-white absolute right-4 text-[10px] top-1/2 -translate-y-1/2 pointer-events-none"></i>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <div class="group relative bg-white rounded-xl shadow-sm border overflow-hidden">
        <a href="{{url('product-details')}}" class="absolute inset-0 z-20"></a>
        <div class="relative overflow-hidden">
          <img src="./images/2.jpg" class="h-[300px] lg:h-[350px] w-full object-cover object-top transition-transform duration-500 group-hover:scale-105" />
          <div class="absolute top-3 left-3 z-30">
            <span class="bg-[#FF71A8] text-white px-2 py-1 rounded text-[10px] font-bold">New</span>
          </div>
          <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
             <div class="bg-[#FF71A8] text-white w-full py-2 rounded text-center text-[13px] font-bold">View Details</div>
          </div>
        </div>
        <div class="p-4">
          <h3 class="text-[15px] font-semibold text-gray-800">Midnight Velvet Gown</h3>
          <p class="text-[#FF71A8] font-bold mt-2 text-[17px]">$449.99</p>
        </div>
      </div>

      </div>
  </section>
</main>

<script>

</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('priceSlider');

    function updateSliderBackground() {
        const value = slider.value;
        const max = slider.max;
        // Calculation for pink color filling
        const percentage = (value / max) * 100;
        slider.style.background = `linear-gradient(to right, #FF71A8 0%, #FF71A8 ${percentage}%, #eee ${percentage}%, #eee 100%)`;
    }

    // Initialize on page load
    updateSliderBackground();

    // Update on change
    slider.addEventListener('input', updateSliderBackground);
});

 function toggleMobileFilter(show) {
    const sidebar = document.getElementById('filterSidebar');
    const overlay = document.getElementById('filterOverlay');
    if (show) {
      sidebar.classList.add('active');
      overlay.classList.remove('hidden');
      document.body.classList.add('filter-open');
    } else {
      sidebar.classList.remove('active');
      overlay.classList.add('hidden');
      document.body.classList.remove('filter-open');
    }
  }
</script>

@endsection
