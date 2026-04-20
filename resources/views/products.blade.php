@extends('layout.dashboard.main')
@section('content')

<style>
  #priceSlider {
    -webkit-appearance: none;
    width: 100%;
    height: 6px;
    border-radius: 5px;
    outline: none;
    cursor: pointer;
  }
  #priceSlider::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 18px;
    height: 18px;
    background: #FF71A8;
    border: 2px solid white;
    border-radius: 50%;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
  }
  .size-label.active {
    border-color: #FF71A8;
    color: #FF71A8;
    font-weight: 600;
  }
  .color-circle.active {
    ring: 2px;
    outline: 2px solid #FF71A8;
    outline-offset: 2px;
  }
</style>

{{-- ── Hero Banner ─────────────────────────────────────────────────────────── --}}
<section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[60px] overflow-hidden">
  <div class="text-center px-4 relative z-10">
    <h2 class="font-semibold lg:text-[38px] text-[28px] leading-tight text-gray-800">Our Collection</h2>
    <p class="font-medium mt-2 lg:text-[16px] text-[13px] text-gray-600 max-w-[600px] mx-auto">
      Explore our curated selection of exquisite gowns for every special occasion
    </p>
  </div>
  <img class="absolute bottom-0 left-0 lg:w-[150px] w-[80px] pointer-events-none opacity-80 lg:opacity-100"
       src="{{ asset('images/left-leave.png') }}" alt="">
  <img class="absolute bottom-0 right-0 lg:w-[150px] w-[80px] pointer-events-none opacity-80 lg:opacity-100"
       src="{{ asset('images/right-leave.png') }}" alt="">
</section>

{{-- ── Main Layout ──────────────────────────────────────────────────────────── --}}
<main class="py-[40px] lg:py-[60px] lg:px-10 px-4 flex flex-col lg:flex-row items-start gap-8">

  {{-- ════════════════════════════════════════════════════════
       FILTER SIDEBAR
  ════════════════════════════════════════════════════════ --}}
  <form method="GET" action="{{ route('products') }}" id="filterForm">

    <aside class="w-full lg:w-[280px] lg:sticky lg:top-[90px] border-[#D4D4D4] border rounded-2xl px-5 pt-5 pb-7 bg-white">

      <div class="flex justify-between items-center border-b lg:border-none pb-3 lg:pb-0 mb-4">
        <span class="text-[16px] font-bold">Filter</span>
        <a href="{{ route('products') }}" class="text-[14px] font-medium cursor-pointer text-[#FF71A8]">Clear All</a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6">

        {{-- Category --}}
        <div>
          <span class="text-[15px] font-bold block mb-3">Category</span>
          <div class="space-y-2">
            @foreach($categories as $category)
              <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox"
                       name="categories[]"
                       value="{{ $category->id }}"
                       class="accent-[#FF71A8] w-4 h-4"
                       onchange="document.getElementById('filterForm').submit()"
                       {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                <span class="text-[14px] font-medium text-gray-600">{{ $category->name }}</span>
              </label>
            @endforeach
          </div>
        </div>

        {{-- Price Range --}}
        <div>
          <span class="text-[15px] font-bold block mb-3">
            Price Range: <span id="priceDisplay" class="text-[#FF71A8]">${{ request('max_price', 1500) }}</span>
          </span>
          <input type="range"
                 name="max_price"
                 id="priceSlider"
                 min="0"
                 max="1500"
                 value="{{ request('max_price', 1500) }}"
                 class="w-full accent-[#FF71A8]"
                 oninput="updatePrice(this.value)"
                 onchange="document.getElementById('filterForm').submit()">
          <div class="flex justify-between text-[#A7A7A7] text-[12px] font-medium mt-1">
            <span>$0</span>
            <span>$1,500</span>
          </div>
        </div>

        {{-- Size --}}
        <div>
          <span class="text-[15px] font-bold block mb-3">Size</span>
          <div class="flex flex-wrap gap-3">
            @foreach(['XS','S','M','L','XL'] as $size)
              <label class="size-label flex items-center gap-1 cursor-pointer border px-3 py-1 rounded-md text-[13px] transition
                            {{ in_array($size, request('sizes', [])) ? 'active border-[#FF71A8] text-[#FF71A8]' : 'hover:border-[#FF71A8]' }}">
                <input type="checkbox"
                       name="sizes[]"
                       value="{{ $size }}"
                       class="hidden"
                       onchange="document.getElementById('filterForm').submit()"
                       {{ in_array($size, request('sizes', [])) ? 'checked' : '' }}>
                {{ $size }}
              </label>
            @endforeach
          </div>
        </div>

        {{-- Color --}}
        <div>
          <span class="text-[15px] font-bold block mb-3">Color</span>
          <ul class="flex flex-wrap gap-2">
            @foreach($colors as $colorData)
              <li title="{{ $colorData->color }}">
                <button type="button"
                        onclick="selectColor('{{ $colorData->color }}')"
                        class="color-circle h-6 w-6 rounded-full border-2 border-white shadow-sm transition
                               {{ request('color') === $colorData->color ? 'outline outline-2 outline-[#FF71A8] outline-offset-2' : '' }}"
                        style="background-color: {{ $colorData->color_hex }}">
                </button>
              </li>
            @endforeach

            {{-- Agar color selected hai to clear button dikho --}}
            @if(request('color'))
              <li>
                <button type="button"
                        onclick="clearColor()"
                        class="h-6 w-6 rounded-full border-2 border-gray-300 text-gray-400 text-[10px] flex items-center justify-center"
                        title="Clear color">
                  ✕
                </button>
              </li>
            @endif
          </ul>
          {{-- Hidden input for selected color --}}
          <input type="hidden" name="color" id="colorInput" value="{{ request('color') }}">
        </div>

        {{-- Sort (hidden — desktop sort se override hoga) --}}
        <input type="hidden" name="sort" id="sortInputSidebar" value="{{ request('sort', 'featured') }}">

      </div>
    </aside>
  </form>

  {{-- ════════════════════════════════════════════════════════
       PRODUCTS GRID
  ════════════════════════════════════════════════════════ --}}
  <section class="flex-1 w-full">

    {{-- Top bar: count + sort --}}
    <div class="flex justify-between items-center mb-6">
      <p class="text-[14px] font-medium text-[#6B6B6B]">
        Showing <span class="text-black font-bold">{{ $products->total() }}</span> Products
      </p>

      <div class="relative w-44">
        <select onchange="sortProducts(this.value)"
                class="appearance-none w-full pl-4 pr-10 py-2 bg-[#FF71A8] rounded-lg text-white text-[14px] font-bold outline-none cursor-pointer">
          <option value="featured"   {{ request('sort','featured') === 'featured'   ? 'selected' : '' }}>Sort: Featured</option>
          <option value="newest"     {{ request('sort') === 'newest'     ? 'selected' : '' }}>Newest First</option>
          <option value="price_asc"  {{ request('sort') === 'price_asc'  ? 'selected' : '' }}>Price: Low–High</option>
          <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High–Low</option>
        </select>
        <i class="fas fa-chevron-down text-white absolute right-4 text-[10px] top-1/2 -translate-y-1/2 pointer-events-none"></i>
      </div>
    </div>

    {{-- Product Cards --}}
    @if($products->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)

          @php
            $thumb = $product->primaryImage;
            $price = $product->sale_price ?? $product->price;
          @endphp

          <div class="group relative bg-white rounded-xl shadow-sm border overflow-hidden">
            {{-- Clickable overlay --}}
            <a href="{{ route('product-details', $product->slug) }}" class="absolute inset-0 z-20"></a>

            {{-- Image --}}
            <div class="relative overflow-hidden">
              <img src="{{ $thumb ? url('uploads/' . $thumb->image_path) : 'https://via.placeholder.com/400x500?text=No+Image' }}"
                   class="h-[300px] lg:h-[350px] w-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                   alt="{{ $product->name }}">

              {{-- Badge --}}
              @if($product->badge)
                <div class="absolute top-3 left-3 z-30">
                  <span class="bg-[#FF71A8] text-white px-2 py-1 rounded text-[10px] font-bold">
                    {{ $product->badge }}
                  </span>
                </div>
              @endif

              {{-- Hover overlay --}}
              <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4 z-10">
                <div class="bg-[#FF71A8] text-white w-full py-2 rounded text-center text-[13px] font-bold">
                  View Details
                </div>
              </div>
            </div>

            {{-- Info --}}
            <div class="p-4">
              <p class="text-[12px] text-[#FF71A8] font-medium mb-1">{{ $product->category->name ?? '' }}</p>
              <h3 class="text-[15px] font-semibold text-gray-800 truncate">{{ $product->name }}</h3>

              <div class="flex items-center gap-2 mt-2">
                <p class="text-[#FF71A8] font-bold text-[17px]" data-usd="{{ $price }}">${{ number_format($price, 2) }}</p>
                @if($product->sale_price)
                  <p class="text-gray-400 text-[13px] line-through" data-usd="{{ $product->price }}">${{ number_format($product->price, 2) }}</p>
                @endif
              </div>
            </div>
          </div>

        @endforeach
      </div>

      {{-- Pagination --}}
      @if($products->hasPages())
        <div class="mt-10 flex justify-center">
          {{ $products->links('vendor.pagination.tailwind') }}
        </div>
      @endif

    @else
      {{-- No Products Found --}}
      <div class="flex flex-col items-center justify-center py-20 text-center">
        <div class="text-[60px] mb-4">🔍</div>
        <h3 class="text-[18px] font-semibold text-gray-700">No products found</h3>
        <p class="text-gray-400 text-[14px] mt-2">Try changing your filters</p>
        <a href="{{ route('products') }}"
           class="mt-5 bg-[#FF71A8] text-white px-6 py-2 rounded-lg text-[14px] font-bold hover:bg-black transition">
          Clear Filters
        </a>
      </div>
    @endif

  </section>
</main>

{{-- ── JavaScript ───────────────────────────────────────────────────────────── --}}
<script>
// Price Slider
function updatePrice(val) {
  document.getElementById('priceDisplay').textContent = '$' + val;
  updateSliderBackground(val);
}

function updateSliderBackground(val) {
  const slider = document.getElementById('priceSlider');
  const pct = (val / slider.max) * 100;
  slider.style.background = `linear-gradient(to right, #FF71A8 0%, #FF71A8 ${pct}%, #eee ${pct}%, #eee 100%)`;
}

// Sort
function sortProducts(val) {
  document.getElementById('sortInputSidebar').value = val;
  document.getElementById('filterForm').submit();
}

// Color Select
function selectColor(color) {
  document.getElementById('colorInput').value = color;
  document.getElementById('filterForm').submit();
}

function clearColor() {
  document.getElementById('colorInput').value = '';
  document.getElementById('filterForm').submit();
}

// Size label toggle style
document.querySelectorAll('.size-label input').forEach(input => {
  input.addEventListener('change', function () {
    this.closest('label').classList.toggle('active', this.checked);
  });
});

// Init slider background on load
document.addEventListener('DOMContentLoaded', () => {
  const slider = document.getElementById('priceSlider');
  updateSliderBackground(slider.value);
});
</script>

@endsection
