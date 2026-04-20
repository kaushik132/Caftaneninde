<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(isset($seo_data['seo_title']))
        <meta property="og:title" content="{{ $seo_data['seo_title'] }}">
        <title>{{ $seo_data['seo_title'] }}</title>
    @else
        <title>Caftaneninde</title>
    @endif

    @if(isset($seo_data['seo_description']))
        <meta property="og:description" content="{{ $seo_data['seo_description'] }}">
        <meta name="description" content="{{ $seo_data['seo_description'] }}">
    @endif
    @if(isset($seo_data['keywords']))
        <meta name="keywords" content="{{ $seo_data['keywords'] }}">
    @endif
    @if(isset($canocial))
        <link rel="canonical" href="{{ $canocial }}">
    @endif

    <meta property="og:site_name" content="{{ url('/') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <link rel="icon" type="image/x-icon" href="{{ url('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en', autoDisplay: false }, 'google_translate_element');
        }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>
<header class="shadow-sm relative z-50">

    {{-- ── Top Bar ──────────────────────────────────────────────────────── --}}
    <div class="bg-[#FF71A8] lg:flex hidden flex-wrap items-center justify-between py-3 px-4 sm:px-10">
        <p class="font-medium text-[13px] text-white">
            COD available! Shop now, pay upon delivery
        </p>

        <ul class="flex gap-3 items-center text-white text-[14px] font-medium">

            {{-- ── Currency Changer ──────────────────────────────────────── --}}
            <li class="relative group">
                <div class="flex items-center bg-white text-[#FF71A8] px-3 py-[6px] rounded-md cursor-pointer gap-1.5 border border-transparent hover:border-[#FF71A8]/20 transition-all">
                    <i class="fa-solid fa-coins text-[11px]"></i>
                    <span id="currencySymbolDisplay" class="text-[13px] font-bold">$</span>
                    <span id="currencyCodeDisplay"   class="text-[13px] font-bold">USD</span>
                    <i class="fa-solid fa-chevron-down text-[10px] group-hover:rotate-180 transition-transform duration-300"></i>
                </div>

                <ul class="absolute right-0 mt-2 w-[165px] bg-white border border-gray-100 rounded-lg shadow-xl py-2
                           opacity-0 invisible group-hover:opacity-100 group-hover:visible
                           transition-all duration-300 z-[200] transform origin-top scale-95 group-hover:scale-100
                           max-h-[280px] overflow-y-auto">
                    <li onclick="setCurrency('USD','$')"    class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇺🇸 US Dollar</span><span class="text-gray-400">$</span></li>
                    <li onclick="setCurrency('PKR','₨')"    class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇵🇰 Pakistani Rs</span><span class="text-gray-400">₨</span></li>
                    <li onclick="setCurrency('EUR','€')"    class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇪🇺 Euro</span><span class="text-gray-400">€</span></li>
                    <li onclick="setCurrency('GBP','£')"    class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇬🇧 British Pound</span><span class="text-gray-400">£</span></li>
                    <li onclick="setCurrency('AED','د.إ')"  class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇦🇪 UAE Dirham</span><span class="text-gray-400">د.إ</span></li>
                    <li onclick="setCurrency('SAR','﷼')"   class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇸🇦 Saudi Riyal</span><span class="text-gray-400">﷼</span></li>
                    <li onclick="setCurrency('INR','₹')"    class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇮🇳 Indian Rupee</span><span class="text-gray-400">₹</span></li>
                    <li onclick="setCurrency('CAD','C$')"   class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇨🇦 Canadian $</span><span class="text-gray-400">C$</span></li>
                    <li onclick="setCurrency('AUD','A$')"   class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇦🇺 Australian $</span><span class="text-gray-400">A$</span></li>
                    <li onclick="setCurrency('TRY','₺')"   class="currency-option px-4 py-2 text-[13px] cursor-pointer hover:bg-[#FFF0F6] hover:text-[#FF71A8] flex justify-between font-medium"><span>🇹🇷 Turkish Lira</span><span class="text-gray-400">₺</span></li>
                </ul>
            </li>

            {{-- ── Language Changer ──────────────────────────────────────── --}}
            <li class="relative group">
                <div id="langTrigger" class="flex items-center bg-white text-[#FF71A8] px-3 py-[6px] rounded-md cursor-pointer border border-transparent hover:border-[#FF71A8]/20 transition-all gap-2">
                    <i class="fa-solid fa-globe text-[12px]"></i>
                    <span id="selectedLang" class="text-[13px] font-bold">EN</span>
                    <i class="fa-solid fa-chevron-down text-[10px] group-hover:rotate-180 transition-transform duration-300"></i>
                </div>
                <ul id="langDropdown" class="absolute right-0 mt-2 w-[120px] bg-white border border-gray-100 rounded-lg shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[100] transform origin-top scale-95 group-hover:scale-100 max-h-[300px] overflow-y-auto"></ul>
            </li>
        </ul>
    </div>

    <div id="google_translate_element" style="display:none;"></div>

    {{-- ── Main Nav ──────────────────────────────────────────────────────── --}}
    <div id="mainHeader" class="flex justify-between items-center py-3 px-4 sm:px-10 bg-white">
        <a href="{{ url('/') }}">
            <img class="w-12 sm:w-14" src="{{ url('images/logo.png') }}" alt="Logo">
        </a>

        <ul class="hidden md:flex text-[15px] font-medium gap-10">
            <li><a href="{{ url('/') }}"          class="nav-link hover:text-[#FF71A8] transition">Home</a></li>
            <li><a href="{{ url('products') }}"   class="nav-link hover:text-[#FF71A8] transition">Product</a></li>
            <li><a href="{{ url('blogs') }}"      class="nav-link hover:text-[#FF71A8] transition">Blog</a></li>
            <li><a href="{{ url('contact-us') }}" class="nav-link hover:text-[#FF71A8] transition">Contact us</a></li>
        </ul>

        <ul class="lg:flex hidden gap-4 items-center">
            {{-- Search --}}
            <li class="relative">
                <a href="javascript:void(0)" id="searchTrigger" class="cursor-pointer">
                    <img class="w-[17px]" src="{{ url('images/search-icon.png') }}" alt="Search">
                </a>
                <div id="searchBox" class="absolute right-0 top-12 w-[280px] bg-white shadow-xl border border-gray-100 rounded-lg p-3 hidden z-[100]">
                    <div class="relative flex items-center">
                        <input type="text" placeholder="Search for gowns..."
                               class="w-full pl-4 pr-10 py-2 bg-gray-50 border border-[#FF71A8]/20 rounded-md outline-none focus:border-[#FF71A8] text-[14px]">
                        <button class="absolute right-3 text-[#FF71A8]"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </li>
            {{-- Wishlist --}}
            <li class="relative">
                <a href="{{ url('wishlist') }}">
                    <img class="w-[17px]" src="{{ url('images/heart.png') }}" alt="">
                </a>
                @if($wishlistCount > 0)
                    <span class="bg-[#FF71A8] -top-1 -right-2 h-[16px] flex justify-center text-[10px] font-medium text-white items-center w-[16px] rounded-full absolute">
                        {{ $wishlistCount > 99 ? '99+' : $wishlistCount }}
                    </span>
                @endif
            </li>
            {{-- Account --}}
            <li><a href="{{ url('account') }}"><img class="w-[17px]" src="{{ url('images/user.png') }}" alt=""></a></li>
            {{-- Cart --}}
            <li class="relative">
                <a href="{{ url('cart') }}">
                    <img class="w-[17px]" src="{{ url('images/bag-1.png') }}" alt="">
                </a>
                <span id="cartCount" class="bg-[#FF71A8] -top-1 -right-2 h-[16px] flex justify-center text-[10px] font-medium text-white items-center w-[16px] rounded-full absolute {{ $cartCount == 0 ? 'hidden' : '' }}">
                    {{ $cartCount > 99 ? '99+' : $cartCount }}
                </span>
            </li>
        </ul>

        {{-- Hamburger --}}
        <svg width="32px" class="md:hidden" id="menu-btn" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 3.32001H16C14.8954 3.32001 14 4.21544 14 5.32001V8.32001C14 9.42458 14.8954 10.32 16 10.32H19C20.1046 10.32 21 9.42458 21 8.32001V5.32001C21 4.21544 20.1046 3.32001 19 3.32001Z" stroke="#FF71A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M8 3.32001H5C3.89543 3.32001 3 4.21544 3 5.32001V8.32001C3 9.42458 3.89543 10.32 5 10.32H8C9.10457 10.32 10 9.42458 10 8.32001V5.32001C10 4.21544 9.10457 3.32001 8 3.32001Z" stroke="#FF71A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M19 14.32H16C14.8954 14.32 14 15.2154 14 16.32V19.32C14 20.4246 14.8954 21.32 16 21.32H19C20.1046 21.32 21 20.4246 21 19.32V16.32C21 15.2154 20.1046 14.32 19 14.32Z" stroke="#FF71A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M8 14.32H5C3.89543 14.32 3 15.2154 3 16.32V19.32C3 20.4246 3.89543 21.32 5 21.32H8C9.10457 21.32 10 20.4246 10 19.32V16.32C10 15.2154 9.10457 14.32 8 14.32Z" stroke="#FF71A8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    {{-- Overlay --}}
    <div id="overlay" class="fixed inset-0 backdrop-blur bg-black/10 hidden transition-opacity duration-300"></div>

    {{-- Mobile Sidebar --}}
    <div id="sidebar" class="fixed top-0 left-0 w-[85%] h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-[999]">
        <div class="flex justify-between items-center px-5 py-4 border-b">
            <img class="w-12" src="{{ url('images/logo.png') }}" alt="">
            <button id="close-btn" class="text-2xl text-[#FF71A8]"><i class="fa-solid fa-xmark text-[16px]"></i></button>
        </div>

        {{-- Mobile Currency Selector --}}
        <div class="px-6 py-3 border-b border-gray-100">
            <p class="text-[12px] text-gray-400 font-medium mb-2">Currency</p>
            <div class="flex flex-wrap gap-2">
                @foreach(['USD'=>'$','PKR'=>'₨','EUR'=>'€','GBP'=>'£','AED'=>'د.إ','SAR'=>'﷼','INR'=>'₹'] as $code => $sym)
                    <button onclick="setCurrency('{{ $code }}','{{ $sym }}')"
                            class="mobile-currency-btn text-[12px] px-3 py-1 rounded-full border border-gray-200 hover:border-[#FF71A8] hover:text-[#FF71A8] font-medium transition-colors"
                            data-code="{{ $code }}">
                        {{ $sym }} {{ $code }}
                    </button>
                @endforeach
            </div>
        </div>

        <ul class="flex flex-col gap-5 px-6 py-6 text-[15px] font-medium">
            <li><a href="{{ url('/') }}"          class="hover:text-[#FF71A8] transition">Home</a></li>
            <li><a href="{{ url('products') }}"   class="hover:text-[#FF71A8] transition">Product</a></li>
            <li><a href="{{ url('blogs') }}"      class="hover:text-[#FF71A8] transition">Blog</a></li>
            <li><a href="{{ url('contact-us') }}" class="hover:text-[#FF71A8] transition">Contact us</a></li>
        </ul>
    </div>
</header>


