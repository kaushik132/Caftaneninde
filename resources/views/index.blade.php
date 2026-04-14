@extends('layout.dashboard.main')
@section('content')
    <style>
        /* Customizing Swiper Pagination (Dots) */
        .swiper-pagination-bullet-active {
            background: #FF71A8 !important;
            inline-size: 25px !important;
            border-radius: 5px !important;
        }

        .swiper-pagination-bullet {
            background: #fff;
            opacity: 0.8;
        }
    </style>

    <!-- hero section  -->

    <section class="lg:px-10 px-4 pt-4 lg:pb-5 pb-2 overflow-hidden">
        <div class="swiper heroSwiper overflow-hidden lg:rounded-3xl rounded-md">
            <div class="swiper-wrapper">

                <div
                    class="swiper-slide bg-[url('./images/hero-banner.jpg')] lg:pt-[120px] pt-[90px] lg:pb-[150px] pb-[70px] bg-center bg-cover">
                    <div class="text-center text-white px-4 lg:px-0">
                        <p class="lg:text-[18px] text-[14px] font-medium">Spring Collection 2025</p>
                        <h1 class="font-semibold lg:text-[40px] text-[19px] -mt-0.5 lg:-mt-1.5">Timeless Elegance for Every
                            Occasion</h1>
                        <p class="lg:text-[14px] text-[12px] font-medium -mt-0.5">Discover our curated collection of
                            exquisite gowns</p>
                        <a href="#"
                            class="inline-block bg-[#FF71A89C] hover:bg-[#FF71A8] transition-all lg:px-8 px-6 py-2 lg:py-2.5 font-medium lg:mt-7 mt-3 rounded-full lg:text-[14px] text-[12px]">Explore
                            Collection</a>
                    </div>
                </div>

                <div
                    class="swiper-slide bg-[url('https://images.unsplash.com/photo-1566174053879-31528523f8ae?q=80&w=1920&auto=format&fit=crop')] lg:pt-[120px] pt-[90px] lg:pb-[150px] pb-[70px] bg-center bg-cover">
                    <div class="text-center text-white px-4 lg:px-0">
                        <p class="lg:text-[18px] text-[14px] font-medium">New Arrivals</p>
                        <h1 class="font-semibold lg:text-[40px] text-[19px]">Summer Special Gowns 2025</h1>
                        <p class="lg:text-[14px] text-[12px] font-medium">Handcrafted beauty just for you</p>
                        <a href="#"
                            class="inline-block bg-[#FF71A89C] lg:px-8 px-6 py-2 lg:py-2.5 font-medium lg:mt-7 mt-3 rounded-full lg:text-[14px] text-[12px]">Shop
                            Now</a>
                    </div>
                </div>

            </div>

            <div
                class="swiper-button-next !text-white !w-10 !h-10 after:!text-[18px] bg-[#FF71A8]/30 hover:bg-[#FF71A8] rounded-full transition lg:flex hidden">
            </div>
            <div
                class="swiper-button-prev !text-white !w-10 !h-10 after:!text-[18px] bg-[#FF71A8]/30 hover:bg-[#FF71A8] rounded-full transition lg:flex hidden">
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- options  section  -->

    <section class="lg:px-10 px-4 ">
        <div
            class="grid lg:grid-cols-4 px-3 lg:px-0 grid-cols-2 gap-y-8 lg:gap-y-0  bg-[#FF88B6] py-10 lg:rounded-lg rounded-md">
            <div class="col-span-1 text-center">
                <div class="bg-[#FF67A2] mx-auto h-[56px] w-[56px] rounded-full flex items-center justify-center">
                    <img class="lg:w-[30px] w-[26px]" src="./images/van.png" alt="">
                </div>
                <h2 class="lg:text-[14px] text-[13px] font-medium text-white mt-1">Complimentary Shipping</h2>
                <p class=" text-white lg:text-[12px] text-[11px]">On all orders worldwide</p>
            </div>
            <div class="col-span-1 text-center">
                <div class="bg-[#FF67A2] mx-auto h-[56px] w-[56px] rounded-full flex items-center justify-center">
                    <img class="lg:w-[30px] w-[26px]" src="./images/shopping.png" alt="">
                </div>
                <h2 class="lg:text-[14px] text-[13px] font-medium text-white mt-1">Secure Checkout</h2>
                <p class=" text-white lg:text-[12px] text-[11px]">Protected payment processing</p>
            </div>
            <div class="col-span-1 text-center">
                <div class="bg-[#FF67A2] mx-auto h-[56px] w-[56px] rounded-full flex items-center justify-center">
                    <img class="lg:w-[30px] w-[26px]" src="./images/return.png" alt="">
                </div>
                <h2 class="lg:text-[14px] text-[13px] font-medium text-white mt-1">Flexible Returns</h2>
                <p class=" text-white lg:text-[12px] text-[11px]">30-day return policy</p>
            </div>

            <div class="col-span-1 text-center">
                <div class="bg-[#FF67A2] mx-auto h-[56px] w-[56px] rounded-full flex items-center justify-center">
                    <img class="lg:w-[30px] w-[26px]" src="./images/luxury.png" alt="">
                </div>
                <h2 class="lg:text-[14px] text-[13px] font-medium text-white mt-1">Luxury Quality</h2>
                <p class=" text-white lg:text-[12px] text-[11px]">Premium fabrics & expert tailoring</p>
            </div>
        </div>
    </section>

    <!-- Our Collection section  -->

    <section class="lg:py-12 py-10">
        <div class="text-center">
            <h2 class="lg:text-[32px] text-[20px] font-semibold">Our Collection</h2>
            <p class="font-medium -mt-1 lg:text-[16px] text-[13px]">Discover gowns for every special moment in your life</p>
        </div>

        <div id="categorySwiper" class="swiper mySwiper px-4 lg:!px-10 lg:mt-12 mt-8 py-8 relative">
            <div class="swiper-wrapper my-2">

                @foreach ($homecategories as $category)
                    <div class="swiper-slide text-center">
                        <a href="{{ url('products?categories[]=' . $category->id . '&max_price=1500&color=&sort=featured') }}"
                            class="group block">
                            <div
                                class="p-[5px] mx-auto bg-gradient-to-b from-[#FF71A8] to-white rounded-full inline-block transition-transform duration-300 group-hover:scale-105">
                                <img class="lg:h-[150px] lg:w-[150px] w-[130px] h-[130px] rounded-full object-cover object-top"
                                    src="{{ url('uploads/' . $category->image) }}" alt="{{ $category->name }}" />
                            </div>
                            <h2
                                class="font-medium lg:text-[16px] text-[14px] mt-3 group-hover:text-[#FF71A8] transition-colors">
                                {{ $category->name }}</h2>
                            <p class="text-[#959292] lg:text-[13px] text-[12px] -mt-0.5">{{ $category->description }}</p>
                        </a>
                    </div>
                @endforeach












            </div>

            <button id="categoryPrev"
                class="absolute z-[10] cursor-pointer text-[#FF71A8] left-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-r-md shadow-lg hover:bg-[#FF71A8] hover:text-white transition-all duration-300">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button id="categoryNext"
                class="absolute z-[10] cursor-pointer text-[#FF71A8] right-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-l-md shadow-lg hover:bg-[#FF71A8] hover:text-white transition-all duration-300">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- trending section  -->

    <section class="py-8 lg:py-12 bg-[#FFDEEB]">
        <div class="flex lg:px-10 px-4 justify-between items-end">
            <div>
                <h2 class="lg:text-[24px] text-[20px] font-medium">Trending Now</h2>
                <p class="lg:text-[15px] text-[13px] -mt-0.5 font-medium">Most viewed and loved gowns this week</p>
            </div>
            <div>
                <a href="{{ url('products') }}"
                    class="text-[#FF71A8] bg-white rounded-md lg:px-5 px-4 lg:py-2 py-1.5 text-[11px] lg:text-[14px] font-medium hover:bg-[#FF71A8] hover:text-white transition-all duration-300 shadow-sm">View
                    All</a>
            </div>
        </div>

        <div id="productSwiper" class="relative lg:pl-10 px-4 lg:pr-0 lg:!pb-10 pt-8 lg:py-8">

            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($products as $allproducts)
                        <div class="swiper-slide">
                            <a href="{{ url('product-details/' . $allproducts->slug) }}"
                                class="bg-white lg:rounded-xl rounded-md group block hover:shadow-2xl transition-all duration-500 overflow-hidden border border-transparent hover:border-[#FF71A8]/20">

                                <div class="relative overflow-hidden">
                                    <img src="{{ url('uploads/' . $allproducts->primaryImage->image_path) }}"
                                        alt="{{ $allproducts->name }}"
                                        class="lg:rounded-t-xl rounded-md lg:h-[350px] h-[180px] !w-full object-cover object-top transform group-hover:scale-110 transition-transform duration-700" />

                                    <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full z-10">
                                        <p
                                            class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1 text-[10px] lg:text-[11px] font-medium w-fit rounded-sm shadow-md">
                                            <img src="{{ url('images/grow-white.png') }}" class="lg:w-3 w-2" alt="">
                                            #1 Trending
                                        </p>

                                        <div onclick="event.preventDefault();"
                                            class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[35px] lg:min-w-[35px] h-[28px] min-w-[28px] shadow-md hover:bg-[#FF71A8] hover:text-white transition-colors duration-300">
                                            <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:p-5 p-3">
                                    <div class="lg:flex justify-between items-end">
                                        <div>
                                            <h3
                                                class="lg:text-[16px] text-[13px] font-semibold text-gray-800 group-hover:text-[#FF71A8] transition-colors uppercase">
                                                {{ $allproducts->name }}</h3>
                                            <p class="text-[#FF71A8] lg:text-[15px] text-[13px] font-bold mt-1">
                                                ${{ number_format($allproducts->sale_price, 2) }}</p>
                                        </div>

                                    </div>

                                    <div
                                        class="bg-[#FF71A8] lg:mt-6 mt-3 lg:py-2.5 py-2 rounded-md text-center w-full lg:text-[14px] text-[12px] font-bold text-white shadow-md group-hover:bg-black transition-all duration-300">
                                        Shop Now
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>

            <button id="productPrev"
                class="absolute z-[10] cursor-pointer text-[#FF71A8] left-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-r-md shadow-lg hover:bg-[#FF71A8] hover:text-white transition-all duration-300">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <button id="productNext"
                class="absolute z-[10] cursor-pointer text-[#FF71A8] right-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-l-md shadow-lg hover:bg-[#FF71A8] hover:text-white transition-all duration-300">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

        </div>
    </section>
    <!-- Featured Collection section  -->

    <section class="py-8 lg:py-12 px-4 lg:px-0">
        <div class="text-center ">
            <h2 class="lg:text-[32px] text-[20px] font-semibold">Featured Collection</h2>
            <p class="font-medium lg:text-[16px] text-[13px] lg:-mt-1 ">Carefully curated gowns for the discerning woman
            </p>
        </div>

        <!-- Slider Container -->
        <div id="customProductSwiper" class="swiper relative lg:!pl-10 lg:!pb-10 mt-8 lg:mt-10">
            <div class="swiper-wrapper">
                @foreach ($swiperProducts as $swiperProduct)
                    <div class="swiper-slide">
                        <a href="{{ url('product-details/' . $swiperProduct->slug) }}"
                            class="bg-white lg:rounded-xl rounded-md group block hover:shadow-2xl transition-all duration-500 overflow-hidden border border-transparent hover:border-[#FF71A8]/20">

                            <div class="relative overflow-hidden">
                                <img src="{{ url('uploads/' . $swiperProduct->primaryImage->image_path) }}"
                                    alt="{{ $swiperProduct->name }}"
                                    class="lg:rounded-t-xl rounded-md lg:h-[350px] h-[180px] !w-full object-cover object-top transform group-hover:scale-110 transition-transform duration-700" />

                                <div class="top-3 left-0 px-3 absolute flex justify-between items-center w-full z-10">
                                    <p
                                        class="text-[#fff] px-2 py-1 bg-[#FF71A8] flex gap-1 text-[10px] lg:text-[11px] font-medium w-fit rounded-sm shadow-md">

                                        {{ $swiperProduct->category->name }}
                                    </p>

                                    <div onclick="event.preventDefault();"
                                        class="text-[14px] cursor-pointer bg-white flex items-center justify-center rounded-full lg:h-[35px] lg:min-w-[35px] h-[28px] min-w-[28px] shadow-md hover:bg-[#FF71A8] hover:text-white transition-colors duration-300">
                                        <i class="fa-regular fa-heart text-[12px] lg:text-[15px]"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:p-5 p-3">
                                <div class="lg:flex justify-between items-end">
                                    <div>
                                        <h3
                                            class="lg:text-[16px] text-[13px] font-semibold text-gray-800 group-hover:text-[#FF71A8] transition-colors uppercase">
                                            {{ $swiperProduct->name }}</h3>
                                        <p class="text-[#FF71A8] lg:text-[15px] text-[13px] font-bold mt-1">
                                            ${{ number_format($swiperProduct->sale_price, 2) }}</p>
                                    </div>

                                </div>

                                <div
                                    class="bg-[#FF71A8] lg:mt-6 mt-3 lg:py-2.5 py-2 rounded-md text-center w-full lg:text-[14px] text-[12px] font-bold text-white shadow-md group-hover:bg-black transition-all duration-300">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                <!-- Add more slides here -->
            </div>

            <!-- Custom Navigation Buttons -->
            <button id="productPrev"
                class="absolute z-[10] cursor-pointer text-[#FF71A8] left-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-r-md shadow-lg hover:bg-[#FF71A8] hover:text-white transition-all duration-300">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <button id="productNext"
                class="absolute z-[10] cursor-pointer text-[#FF71A8] right-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-l-md shadow-lg hover:bg-[#FF71A8] hover:text-white transition-all duration-300">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

        </div>
    </section>

    <!-- <section class="bg-[#FFDEEB] lg:py-12 py-8 px-4  lg:px-12">
                                                  <div class="text-center ">
                                                    <h2 class="lg:text-[32px] text-[20px] font-semibold">Experience Élégance</h2>
                                                    <p class="font-medium lg:text-[16px] text-[13px] lg:-mt-1 ">Discover the artistry behind our collections and the stories of the women who wear
                                                      them</p>
                                                  </div>

                                                  <div class="lg:mt-8 mt-5 relative">
                                                    <img class="lg:h-[480px] h-[200px] w-full lg:rounded-xl rounded-md object-cover object-center" src="./images/video.jpg" alt="">

                                                    <div class="inline-block absolute top-1/2 cursor-pointer -translate-y-1/2 left-1/2 -translate-x-1/2">
                                                      <span class=" bg-[#fff] text-[#FF71A8] lg:h-[55px] lg:w-[55px] w-[45px] h-[45px] rounded-full flex justify-center items-center">
                                                        <i class="fa-solid fa-play text-[18px]  lg:text-[20px] "></i>
                                                      </span>
                                                    </div>

                                                  </div>

                                                  <div class="grid grid-cols-3 lg:mt-12 mt-6 lg:px-10 px-0">
                                                    <div class="col-span-1 text-center">
                                                      <h2 class="lg:text-[36px] text-[20px] font-medium">500+</h2>
                                                      <p class="font-medium lg:text-[16px] text-[12px] lg:-mt-2"> Unique Designs</p>
                                                    </div>

                                                    <div class="col-span-1 text-center">
                                                      <h2 class="lg:text-[36px] text-[20px]  font-medium">10K+</h2>
                                                      <p class="font-medium lg:text-[16px] text-[12px] lg:-mt-2"> Happy Customer</p>
                                                    </div>

                                                    <div class="col-span-1 text-center">
                                                      <h2 class="lg:text-[36px] text-[20px]  font-medium">25+</h2>
                                                      <p class="font-medium lg:text-[16px] text-[12px] lg:-mt-2"> Years of Excellence</p>
                                                    </div>
                                                  </div>
                                                </section> -->

    <!-- testimonials section  -->

    <section class="py-10 bg-[#FFDEEB]">
        <div class="text-center ">
            <h2 class="lg:text-[32px] text-[20px] font-semibold">What Our Clients Say</h2>
            <p class="font-medium lg:-mt-1 text-[13px] lg:text-[16px]">Don't just take our word for it - hear from the
                women who've experienced Élégance/p>
        </div>

        <!-- Review Slider Container -->
        <div class="relative w-full lg:mt-10 mt-8 lg:px-12 px-4 ">

            <!-- Swiper main wrapper (unique ID) -->
            <div class="swiper myReviewSwiper">




                <!-- Slide 1 -->
                {{-- <div class="swiper-slide">
                        <div class="border-[#D8D8D8] border rounded-md lg:p-4 p-3 bg-white">
                            <img class="lg:w-10 w-7 rotate-180" src="./images/quote.png" alt="">
                            <ul class="lg:mt-2 mt-1 flex gap-1 text-[14px]">
                                <li><i class="fa-solid fa-star text-[11px] lg:text-[14px] text-[#FF71A8]"></i></li>
                                <li><i class="fa-solid fa-star text-[11px] lg:text-[14px] text-[#FF71A8]"></i></li>
                                <li><i class="fa-solid fa-star text-[11px] lg:text-[14px] text-[#FF71A8]"></i></li>
                                <li><i class="fa-solid fa-star text-[11px] lg:text-[14px] text-[#FF71A8]"></i></li>
                            </ul>
                            <p class="mt-1 lg:text-[15px] text-[10px] font-medium">
                                "Absolutely stunning! The quality of the gown exceeded my expectations. I felt like royalty
                                at my gala
                                event."
                            </p>
                            <p
                                class="lg:text-[12px] text-[9px] mt-1 font-medium text-[#FF71A8] border-[#CBCBCB] border-b pb-2.5">
                                Purchased: Celestial Evening Gown
                            </p>
                            <div class="flex gap-2 items-center mt-2.5">
                                <img class="lg:w-10 lg:h-10 w-8 h-8 rounded-full object-cover" src="./images/user-1.jpg"
                                    alt="">
                                <div>
                                    <h3 class="lg:text-[14px] text-[12px] font-medium">Sophia Anderson</h3>
                                    <p class="text-[#959595] lg:text-[12px] text-[10px] -mt-0.5 font-medium">New York, NY
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                <div class="swiper-wrapper">

                    @foreach ($homeReviews as $review)
                        <div class="swiper-slide">
                            <div class="border-[#D8D8D8] border rounded-md lg:p-4 p-3 bg-white">

                                <img class="lg:w-10 w-7 rotate-180" src="{{ asset('images/quote.png') }}"
                                    alt="">

                                {{-- Rating Stars --}}
                                <ul class="lg:mt-2 mt-1 flex gap-1 text-[14px]">

                                    @for ($i = 1; $i <= 5; $i++)
                                        <li>
                                            <i
                                                class="fa-{{ $i <= $review->rating ? 'solid' : 'regular' }}
                    fa-star text-[11px] lg:text-[14px] text-[#FF71A8]"></i>
                                        </li>
                                    @endfor

                                </ul>


                                {{-- Review text --}}
                                <p class="mt-1 lg:text-[15px] text-[10px] font-medium">

                                    "{{ Str::limit($review->review_text, 120) }}"

                                </p>


                                {{-- Product name --}}
                                <p
                                    class="lg:text-[12px] text-[9px] mt-1 font-medium
        text-[#FF71A8] border-[#CBCBCB] border-b pb-2.5">

                                    Purchased: {{ $review->product->name ?? '' }}

                                </p>


                                {{-- User --}}
                                <div class="flex gap-2 items-center mt-2.5">

                                    <div
                                        class="lg:w-10 lg:h-10 w-8 h-8
            rounded-full bg-[#FFE1ED]
            flex items-center justify-center
            text-[#FF71A8] font-bold">

                                        {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}

                                    </div>

                                    <div>

                                        <h3 class="lg:text-[14px] text-[12px] font-medium">

                                            {{ $review->user->name ?? 'Anonymous' }}

                                        </h3>

                                        <p
                                            class="text-[#959595]
                lg:text-[12px]
                text-[10px]
                -mt-0.5 font-medium">

                                            {{ $review->created_at->diffForHumans() }}

                                        </p>

                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

        <!-- Custom Navigation Buttons -->
        <button id="reviewPrev"
            class="absolute z-[9999]  hidden lg:block  cursor-pointer text-[#FF71A8] left-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-r-md shadow-md transition hover:bg-[#FF71A8] hover:text-white">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <button id="reviewNext"
            class="absolute z-[9999] hidden lg:block cursor-pointer text-[#FF71A8] right-0 top-1/2 -translate-y-1/2 bg-[#F6F6F6] px-3 py-6 rounded-l-md shadow-md transition hover:bg-[#FF71A8] hover:text-white">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

        </div>

        <div class="flex gap-2 items-end lg:mt-7 mt-2 justify-center">
            <ul class="mt-2 flex gap-1 ">

                @for ($i = 1; $i <= 5; $i++)
                    <li>

                        <i
                            class="fa-{{ $i <= round($avgHomeRating) ? 'solid' : 'regular' }}
fa-star text-[12px] text-[#FF71A8]"></i>

                    </li>
                @endfor

            </ul>

            <p class="lg:text-[14px] text-[12px] font-medium">

                {{ $avgHomeRating }} out of 5 based on
                {{ number_format($totalHomeReviews) }} reviews

            </p>
        </div>


    </section>
    <!-- news letter section  -->
    <section class="lg:mt-12 bg-[#FF71A8] lg:py-10 py-7">
        <div class="text-center text-white ">
            <h2 class="lg:text-[32px] text-[20px] font-semibold">Join Our Exclusive Circle</h2>
            <p class="font-medium lg:-mt-1 text-[13px] lg:text-[16px] ">Subscribe for early access to new collections,
                styling tips, and exclusive offers
            </p>
        </div>

        <form class="lg:mt-7 mt-4 flex gap-2 justify-center px-4 lg:px-0">
            <input type=" text" placeholder="Enter your email"
                class="px-4 py-2.5  rounded-sm lg:rounded-md lg:text-[14px] text-[12px] lg:w-[370px] w-full border-0 outline-none bg-white">

            <button type="submit"
                class="px-8 cursor-pointer py-2.5 text-[12px] lg:text-[14px] text-[#FF71A8] bg-white  rounded-sm lg:rounded-md font-medium">Subscribe</button>
        </form>

        <p class="lg:text-[14px] text-[11px] font-medium text-white text-center mt-3">By subscribing, you agree to our
            Privacy Policy and
            consent to receive updates</p>
    </section>
@endsection
