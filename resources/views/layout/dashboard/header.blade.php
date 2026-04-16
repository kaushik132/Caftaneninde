<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         @if (isset($seo_data['seo_title']))
        <meta property="og:title" content="{{ $seo_data['seo_title'] }}">
    @endif
    <meta property="og:site_name" content="http://127.0.0.1:8000/">

    <meta property="og:url" content="http://127.0.0.1:8000/">

    @if (isset($seo_data['seo_description']))
        <meta property="og:description" content="{{ $seo_data['seo_description'] }}">
    @endif


    @if (isset($seo_data['seo_title']))
        <title>{{ $seo_data['seo_title'] }}</title>
    @endif

    @if (isset($seo_data['seo_description']))
        <meta name="description" content="{{ $seo_data['seo_description'] }}" />
    @endif

    @if (isset($seo_data['keywords']))
        <meta name="keywords" content="{{ $seo_data['keywords'] }}" />
    @endif


    @if (isset($canocial))
        <link rel="canonical" href="{{ $canocial }}" />
    @endif

    <link rel="icon" type="image/x-icon" href="{{ url('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <header class="shadow-sm relative z-50">
        <div class="bg-[#FF71A8] lg:flex hidden flex-wrap items-center justify-between py-3 px-4 sm:px-10">
            <p class="font-medium text-[13px] text-white">
                COD available! Shop now, pay upon delivery
            </p>

            <ul class="flex gap-5  items-center text-white text-[14px] font-medium">
                <li><i class="fa-solid fa-location-dot mr-1"></i> Order Tracking</li>
                <li><i class="fa-solid fa-truck-fast mr-1"></i> Shipping Charges</li>
                <li class="bg-white text-[#FF71A8] px-3 py-[5px] rounded-md cursor-pointer">EN</li>
            </ul>
        </div>

        <div id="mainHeader" class="flex justify-between items-center py-3 px-4 sm:px-10 bg-white">
            <a href="{{ url('/') }}">
                <img class="w-12 sm:w-14" src="{{ url('images/logo.png') }}" alt="Logo">
            </a>

            <ul class="hidden md:flex text-[15px] font-medium gap-10">
                <li><a href="{{ url('/') }}" class="nav-link hover:text-[#FF71A8] transition">Home</a></li>
                <li><a href="{{ url('products') }}" class="nav-link hover:text-[#FF71A8] transition">Product</a></li>
                {{-- <li class="relative group">
                    <a href="#!" class="hover:text-[#FF71A8] transition flex items-center gap-1">
                        Categories <i class="fa-solid fa-chevron-down text-[10px]"></i>
                    </a>

                    <ul
                        class="absolute left-0 top-full w-56 bg-white border border-[#ffe1ed] shadow-xl rounded-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">

                        <li class="relative group/sub">
                            <a href="#"
                                class="flex justify-between items-center px-4 py-2.5 text-[14px] text-gray-700 hover:bg-[#ffe1ed] hover:text-[#FF71A8] transition">
                                <span>Skincare</span>
                                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>

                            <ul
                                class="absolute left-full top-0 w-52 bg-white border border-[#ffe1ed] shadow-xl rounded-lg py-2 ml-1 opacity-0 invisible group-hover/sub:opacity-100 group-hover/sub:visible transition-all duration-300 transform translate-x-2 group-hover/sub:translate-x-0">
                                <li><a href="#"
                                        class="block px-4 py-2 text-[13px] text-gray-600 hover:text-[#FF71A8] hover:bg-[#ffe1ed]/50 transition">Face
                                        Wash</a></li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-[13px] text-gray-600 hover:text-[#FF71A8] hover:bg-[#ffe1ed]/50 transition">Moisturizers</a>
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-[13px] text-gray-600 hover:text-[#FF71A8] hover:bg-[#ffe1ed]/50 transition">Sunscreen</a>
                                </li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="#"
                                class="flex justify-between items-center px-4 py-2.5 text-[14px] text-gray-700 hover:bg-[#ffe1ed] hover:text-[#FF71A8] transition border-t border-gray-50">
                                <span>Haircare</span>
                                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>

                            <ul
                                class="absolute left-full top-0 w-52 bg-white border border-[#ffe1ed] shadow-xl rounded-lg py-2 ml-1 opacity-0 invisible group-hover/sub:opacity-100 group-hover/sub:visible transition-all duration-300 transform translate-x-2 group-hover/sub:translate-x-0">
                                <li><a href="#"
                                        class="block px-4 py-2 text-[13px] text-gray-600 hover:text-[#FF71A8] hover:bg-[#ffe1ed]/50 transition">Shampoo</a>
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-[13px] text-gray-600 hover:text-[#FF71A8] hover:bg-[#ffe1ed]/50 transition">Hair
                                        Oil</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"
                                class="block px-4 py-2.5 text-[14px] text-gray-700 hover:bg-[#ffe1ed] hover:text-[#FF71A8] transition border-t border-gray-50">
                                Makeup
                            </a>
                        </li>

                    </ul>
                </li> --}}
                <li><a href="{{ url('blogs') }}" class="nav-link hover:text-[#FF71A8] transition">Blog</a></li>
                <li><a href="{{ url('contact-us') }}" class="nav-link hover:text-[#FF71A8] transition">Contact us</a>
                </li>

            </ul>

            <ul class="lg:flex hidden gap-4 items-center">
                <li class="relative">
                    <a href="javascript:void(0)" id="searchTrigger" class="cursor-pointer">
                        <img class="w-[17px]" src="{{ url('images/search-icon.png') }}" alt="Search">
                    </a>

                    <div id="searchBox"
                        class="absolute right-0 top-12 w-[280px] bg-white shadow-xl border border-gray-100 rounded-lg p-3 hidden animate-slideDown z-[100]">
                        <div class="relative flex items-center">
                            <input type="text" placeholder="Search for gowns..."
                                class="w-full pl-4 pr-10 py-2 bg-gray-50 border border-[#FF71A8]/20 rounded-md outline-none focus:border-[#FF71A8] text-[14px]">
                            <button class="absolute right-3 text-[#FF71A8]">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </li>
                {{-- Wishlist --}}
                <li class="relative">
                    <a href="{{ url('wishlist') }}">
                        <img class="w-[17px]" src="{{ url('images/heart.png') }}" alt="">
                    </a>
                    @if ($wishlistCount > 0)
                        <span
                            class="bg-[#FF71A8] -top-1 -right-2 h-[16px] flex justify-center text-[10px] font-medium text-white items-center w-[16px] rounded-full absolute">
                            {{ $wishlistCount > 99 ? '99+' : $wishlistCount }}
                        </span>
                    @endif
                </li>
                <li><a href="{{ url('account') }}"><img class="w-[17px]" src="{{ url('images/user.png') }}"
                            alt=""></a></li>
                {{-- Cart --}}
                <li class="relative">
                    <a href="{{ url('cart') }}">
                        <img class="w-[17px]" src="{{ url('images/bag-1.png') }}" alt="">
                    </a>
                    <span id="cartCount"
                        class="bg-[#FF71A8] -top-1 -right-2 h-[16px] flex justify-center text-[10px] font-medium text-white items-center w-[16px] rounded-full absolute {{ $cartCount == 0 ? 'hidden' : '' }}">
                        {{ $cartCount > 99 ? '99+' : $cartCount }}
                    </span>
                </li>
            </ul>

            <!-- Hamburger Button (Mobile) -->
            <svg width="32px" class="md:hidden text-2xl" id="menu-btn" viewBox="-0.5 0 25 25" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M19 3.32001H16C14.8954 3.32001 14 4.21544 14 5.32001V8.32001C14 9.42458 14.8954 10.32 16 10.32H19C20.1046 10.32 21 9.42458 21 8.32001V5.32001C21 4.21544 20.1046 3.32001 19 3.32001Z"
                        stroke="#FF71A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M8 3.32001H5C3.89543 3.32001 3 4.21544 3 5.32001V8.32001C3 9.42458 3.89543 10.32 5 10.32H8C9.10457 10.32 10 9.42458 10 8.32001V5.32001C10 4.21544 9.10457 3.32001 8 3.32001Z"
                        stroke="#FF71A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M19 14.32H16C14.8954 14.32 14 15.2154 14 16.32V19.32C14 20.4246 14.8954 21.32 16 21.32H19C20.1046 21.32 21 20.4246 21 19.32V16.32C21 15.2154 20.1046 14.32 19 14.32Z"
                        stroke="#FF71A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M8 14.32H5C3.89543 14.32 3 15.2154 3 16.32V19.32C3 20.4246 3.89543 21.32 5 21.32H8C9.10457 21.32 10 20.4246 10 19.32V16.32C10 15.2154 9.10457 14.32 8 14.32Z"
                        stroke="#FF71A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>

        </div>

        <!-- 🔹 Sidebar Overlay -->
        <div id="overlay"
            class="fixed inset-0 backdrop-blur bg-black/10 bg-opacity-50 hidden transition-opacity duration-300"></div>

        <!-- 🔹 Sidebar Menu -->
        <div id="sidebar"
            class="fixed top-0 left-0 w-[85%] h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-[999]">
            <div class="flex justify-between items-center px-5 py-4 border-b">
                <img class="w-12" src="./images/logo.png" alt="">
                <button id="close-btn" class="text-2xl text-[#FF71A8]">
                    <i class="fa-solid fa-xmark text-[16px]"></i>
                </button>
            </div>

            <ul class="flex flex-col gap-5 px-6 py-6 text-[15px] font-medium">
                <li><a href="index.php" class="hover:text-[#FF71A8] transition">Home</a></li>
                <li><a href="{{ url('products') }}" class="hover:text-[#FF71A8] transition">Product</a></li>
                <li class="border-b border-gray-100">
                    <div class="flex justify-between items-center cursor-pointer group"
                        onclick="toggleNested('main-categories', 'main-icon')">
                        <span class="flex items-center gap-3 text-[15px] font-bold text-gray-800">
                            Shop By Categories
                        </span>
                        <i class="fa-solid fa-chevron-down text-[12px] transition-transform duration-300"
                            id="main-icon"></i>
                    </div>

                    <ul class="hidden flex-col bg-[#ffe1ed]/10 border-l-2 border-[#FF71A8] ml-2" id="main-categories">

                        <li>
                            <div class="flex justify-between items-center py-3 px-4 cursor-pointer border-b border-white/50"
                                onclick="toggleNested('sub-skincare', 'icon-skincare')">
                                <span class="text-[14px] font-medium text-gray-700">Skincare</span>
                                <i class="fa-solid fa-plus text-[10px] text-[#FF71A8]" id="icon-skincare"></i>
                            </div>
                            <ul class="hidden flex-col bg-white" id="sub-skincare">
                                <li><a href="#"
                                        class="block py-2.5 px-8 text-[13px] text-gray-500 hover:text-[#FF71A8] border-b border-gray-50">Face
                                        Wash</a></li>
                                <li><a href="#"
                                        class="block py-2.5 px-8 text-[13px] text-gray-500 hover:text-[#FF71A8] border-b border-gray-50">Moisturizers</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <div class="flex justify-between items-center py-3 px-4 cursor-pointer border-b border-white/50"
                                onclick="toggleNested('sub-haircare', 'icon-haircare')">
                                <span class="text-[14px] font-medium text-gray-700">Haircare</span>
                                <i class="fa-solid fa-plus text-[10px] text-[#FF71A8]" id="icon-haircare"></i>
                            </div>
                            <ul class="hidden flex-col bg-white" id="sub-haircare">
                                <li><a href="#"
                                        class="block py-2.5 px-8 text-[13px] text-gray-500 hover:text-[#FF71A8] border-b border-gray-50">Shampoo</a>
                                </li>
                                <li><a href="#"
                                        class="block py-2.5 px-8 text-[13px] text-gray-500 hover:text-[#FF71A8] border-b border-gray-50">Hair
                                        Oil</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li><a href="{{ url('blogs') }}" class="hover:text-[#FF71A8] transition">Blog</a></li>
                <li><a href="contact-us.php" class="hover:text-[#FF71A8] transition">Contact us</a></li>
            </ul>
        </div>
    </header>
