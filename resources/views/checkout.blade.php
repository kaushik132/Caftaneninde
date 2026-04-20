@extends('layout.dashboard.main')
@section('content')

{{-- ── Hero ──────────────────────────────────────────────────────────────── --}}
<section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] overflow-hidden">
    <div class="lg:pl-32 pl-10">
        <a href="{{ route('cart') }}" class="text-[#767676] lg:text-[14px] text-[12px]">
            <i class="fa-solid fa-chevron-left lg:text-[13px] text-[11px]"></i> Back to cart
        </a>
        <h2 class="font-semibold lg:text-[42px] text-[24px]">Checkout</h2>
    </div>
    <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-0 pointer-events-none" src="{{ asset('images/left-leave.png') }}" alt="">
    <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-0 pointer-events-none" src="{{ asset('images/right-leave.png') }}" alt="">
</section>

{{-- Error Message --}}
@if(session('error'))
    <div class="lg:px-12 px-4 pt-4">
        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-[13px]">
            {{ session('error') }}
        </div>
    </div>
@endif

<section class="lg:px-12 px-4 py-10">
    <form action="{{ route('checkout.post') }}" method="POST" id="checkoutForm">
        @csrf

        <div class="grid lg:grid-cols-3 items-start gap-6">

            {{-- ── LEFT — Forms ──────────────────────────────────────────── --}}
            <div class="lg:col-span-2 space-y-4">

                {{-- Contact Information --}}
                <div class="bg-[#F8F8F8] rounded-md lg:rounded-2xl px-6 pt-5 pb-6">
                    <h3 class="text-[#4B4B4B] lg:text-[16px] text-[14px] font-medium">Contact Information</h3>
                    <div class="mt-5">
                        <label class="lg:text-[15px] text-[13px] font-medium">Email *</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               class="bg-white px-5 mt-1 py-2.5 lg:text-[14px] text-[13px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition @error('email') border-red-400 @enderror"
                               placeholder="you@example.com">
                        @error('email')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                    </div>
                    <p class="mt-1 lg:text-[12px] text-[10px] ml-2 text-gray-500">Email me with news and offers</p>
                </div>

                {{-- Shipping Address --}}
                <div class="bg-[#F8F8F8] lg:mt-6 mt-4 lg:rounded-2xl rounded-md px-6 pt-5 pb-6">
                    <h3 class="text-[#4B4B4B] lg:text-[16px] text-[14px] font-medium">Shipping Address</h3>

                    <div class="mt-5 flex gap-5">
                        <div class="flex-1">
                            <label class="lg:text-[15px] text-[13px] font-medium">First Name *</label>
                            <input type="text" name="first_name"
                                   value="{{ old('first_name', explode(' ', $user->name)[0] ?? '') }}"
                                   class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition @error('first_name') border-red-400 @enderror">
                            @error('first_name')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex-1">
                            <label class="lg:text-[15px] text-[13px] font-medium">Last Name *</label>
                            <input type="text" name="last_name"
                                   value="{{ old('last_name', explode(' ', $user->name)[1] ?? '') }}"
                                   class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition @error('last_name') border-red-400 @enderror">
                            @error('last_name')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="lg:text-[15px] text-[13px] font-medium">Address *</label>
                        <input type="text" name="address_line1"
                               value="{{ old('address_line1') }}"
                               placeholder="Street Address"
                               class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition @error('address_line1') border-red-400 @enderror">
                        @error('address_line1')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mt-5">
                        <label class="lg:text-[15px] text-[13px] font-medium">Country</label>
                        <input type="text" name="country"
                               value="{{ old('country') }}"
                               class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition">
                    </div>

                    <div class="mt-5 flex gap-5">
                        <div class="flex-1">
                            <label class="lg:text-[15px] text-[13px] font-medium">City *</label>
                            <input type="text" name="city"
                                   value="{{ old('city') }}"
                                   class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition @error('city') border-red-400 @enderror">
                            @error('city')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex-1">
                            <label class="lg:text-[15px] text-[13px] font-medium">State *</label>
                            <input type="text" name="state"
                                   value="{{ old('state') }}"
                                   class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition @error('state') border-red-400 @enderror">
                            @error('state')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex-1">
                            <label class="lg:text-[15px] text-[13px] font-medium">PIN code *</label>
                            <input type="text" name="zip"
                                   value="{{ old('zip') }}"
                                   class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition @error('zip') border-red-400 @enderror">
                            @error('zip')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="lg:text-[15px] text-[13px] font-medium">Phone Number *</label>
                        <input type="text" name="phone"
                               value="{{ old('phone', $user->phone) }}"
                               class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition @error('phone') border-red-400 @enderror">
                        @error('phone')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Payment Method --}}
                <div class="bg-[#F8F8F8] lg:mt-6 mt-4 rounded-md lg:rounded-2xl px-6 pt-5 pb-6">
                    <h3 class="text-[#4B4B4B] font-medium lg:text-[16px] text-[14px]">
                        <i class="fa-solid fa-lock mr-1"></i> Payment Method
                    </h3>

                    {{-- Payment Toggle --}}
                    <div class="mt-5 flex gap-3">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="payment_method" value="cod"
                                   class="hidden peer" {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }}
                                   onchange="togglePayment('cod')">
                            <div class="peer-checked:border-[#FF71A8] peer-checked:bg-[#FFF0F6] border-2 border-gray-200 rounded-xl p-4 text-center transition-all">
                                <i class="fa-solid fa-money-bill-wave text-[#FF71A8] text-xl mb-2 block"></i>
                                <p class="font-bold text-[13px]">Cash on Delivery</p>
                                <p class="text-gray-400 text-[11px]">Pay when you receive</p>
                            </div>
                        </label>

                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="payment_method" value="card"
                                   class="hidden peer" {{ old('payment_method') === 'card' ? 'checked' : '' }}
                                   onchange="togglePayment('card')">
                            <div class="peer-checked:border-[#FF71A8] peer-checked:bg-[#FFF0F6] border-2 border-gray-200 rounded-xl p-4 text-center transition-all">
                                <i class="fa-solid fa-credit-card text-[#FF71A8] text-xl mb-2 block"></i>
                                <p class="font-bold text-[13px]">Credit / Debit Card</p>
                                <p class="text-gray-400 text-[11px]">Visa, Mastercard, etc.</p>
                            </div>
                        </label>
                    </div>

                    {{-- Card Fields — only show when card selected --}}
                    <div id="cardFields" class="{{ old('payment_method') === 'card' ? '' : 'hidden' }} mt-5 space-y-4">
                        <div>
                            <label class="lg:text-[15px] text-[13px] font-medium">Card Number</label>
                            <input type="text" name="card_number"
                                   placeholder="1234 5678 9012 3456"
                                   maxlength="19"
                                   oninput="formatCard(this)"
                                   class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition">
                        </div>
                        <div class="flex gap-5">
                            <div class="flex-1">
                                <label class="lg:text-[15px] text-[13px] font-medium">Expiry Date</label>
                                <input type="text" name="expiry" placeholder="MM/YY" maxlength="5"
                                       oninput="formatExpiry(this)"
                                       class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition">
                            </div>
                            <div class="flex-1">
                                <label class="lg:text-[15px] text-[13px] font-medium">CVC</label>
                                <input type="text" name="cvc" placeholder="123" maxlength="3"
                                       class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition">
                            </div>
                        </div>
                        <div>
                            <label class="lg:text-[15px] text-[13px] font-medium">Name on Card</label>
                            <input type="text" name="card_name"
                                   class="bg-white px-5 mt-1 py-2.5 text-[14px] rounded-md w-full border border-transparent focus:border-[#FF71A8] outline-none transition">
                        </div>
                    </div>

                    {{-- COD Message --}}
                    <div id="codMessage" class="{{ old('payment_method') === 'card' ? 'hidden' : '' }} mt-5 bg-green-50 border border-green-100 rounded-xl p-4 text-center">
                        <i class="fa-solid fa-truck text-green-500 text-xl mb-2 block"></i>
                        <p class="text-green-700 font-medium text-[13px]">Pay when your order arrives at your door</p>
                        <p class="text-green-500 text-[11px] mt-1">No advance payment needed</p>
                    </div>
                </div>

            </div>

            {{-- ── RIGHT — Order Summary ────────────────────────────────── --}}
            <div class="col-span-1 border-[#E6E6E6] border rounded-md lg:rounded-2xl px-6 pt-5 pb-6 lg:sticky lg:top-[90px]">
                <h2 class="lg:text-[19px] text-[16px] font-medium">Order Summary</h2>

                {{-- Cart Items --}}
                <div class="mt-4 space-y-4 border-[#B0B0B0] border-b pb-5">
                    @foreach($cartItems as $item)
                        @php
                            $product = $item->product;
                            $variant = $item->variant;
                            $price   = $product->sale_price ?? $product->price;
                            $thumb   = $product->primaryImage;
                        @endphp
                        <div class="flex gap-4">
                            <div class="relative flex-shrink-0">
                                <img class="h-[80px] w-[70px] rounded-md object-cover object-top"
                                     src="{{ $thumb ? url('uploads/' . $thumb->image_path) : 'https://via.placeholder.com/70x80' }}"
                                     alt="{{ $product->name }}">
                                {{-- Quantity badge --}}
                                <span class="absolute -top-2 -right-2 bg-[#FF71A8] text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center">
                                    {{ $item->quantity }}
                                </span>
                            </div>
                            <div class="flex-1">
                                <h3 class="lg:text-[14px] text-[13px] font-medium leading-tight">{{ $product->name }}</h3>
                                @if($variant)
                                    <p class="text-[#9D9D9D] text-[12px] font-medium mt-0.5">
                                        {{ $variant->color }} / {{ $variant->size }}
                                    </p>
                                @endif
                                <p class="text-[#FF71A8] text-[14px] font-semibold mt-1" data-usd="{{ $price * $item->quantity }}">
                                    ${{ number_format($price * $item->quantity, 2) }}
                                </p>
                                @if($item->quantity > 1)
                                    <p class="text-gray-400 text-[11px]" data-usd="{{ number_format($price, 2) }}">${{ number_format($price, 2) }} each</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Totals --}}
                <div class="mt-4 space-y-1 lg:text-[15px] text-[13px] border-[#B0B0B0] border-b pb-5">
                    <div class="flex justify-between">
                        <p class="text-[#737373]">Subtotal:</p>
                        <p data-usd="{{ number_format($subtotal, 2) }}">${{ number_format($subtotal, 2) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-[#737373]">Shipping:</p>
                        <p class="text-[#389528]" data-usd="{{ $shipping == 0 ? 'Free' : '$' . number_format($shipping, 2) }}">{{ $shipping == 0 ? 'Free' : '$' . number_format($shipping, 2) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-[#737373]">Tax (8%)</p>
                        <p data-usd="{{ number_format($tax, 2) }}">${{ number_format($tax, 2) }}</p>
                    </div>
                </div>

                <div class="flex justify-between lg:text-[18px] text-[15px] mt-3 font-semibold">
                    <p>Total:</p>
                    <p class="text-[#FF71A8]" data-usd="{{ number_format($total, 2) }}">${{ number_format($total, 2) }}</p>
                </div>

                <div class="mt-4">
                    <button type="submit" id="submitBtn"
                            class="text-white bg-[#FF71A8] hover:bg-black lg:text-[14px] text-[13px] font-medium text-center py-2.5 w-full rounded-md transition cursor-pointer">
                        Complete Order
                    </button>
                </div>

                <ul class="text-[12px] mt-4 text-gray-500 space-y-1">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-lock text-[#FF71A8]"></i> Secure checkout</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-rotate-left text-[#FF71A8]"></i> 30-day returns</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-shield text-[#FF71A8]"></i> Money-back guarantee</li>
                </ul>
            </div>

        </div>
    </form>
</section>

{{-- ── JavaScript ───────────────────────────────────────────────────────── --}}
<script>
    // Payment method toggle
    function togglePayment(method) {
        const cardFields  = document.getElementById('cardFields');
        const codMessage  = document.getElementById('codMessage');
        if (method === 'card') {
            cardFields.classList.remove('hidden');
            codMessage.classList.add('hidden');
        } else {
            cardFields.classList.add('hidden');
            codMessage.classList.remove('hidden');
        }
    }

    // Card number format: 1234 5678 9012 3456
    function formatCard(input) {
        let val = input.value.replace(/\D/g, '').substring(0, 16);
        input.value = val.match(/.{1,4}/g)?.join(' ') ?? val;
    }

    // Expiry format: MM/YY
    function formatExpiry(input) {
        let val = input.value.replace(/\D/g, '').substring(0, 4);
        if (val.length >= 2) val = val.substring(0,2) + '/' + val.substring(2);
        input.value = val;
    }

    // Submit button loading state
    document.getElementById('checkoutForm').addEventListener('submit', function () {
        const btn = document.getElementById('submitBtn');
        btn.disabled    = true;
        btn.textContent = 'Processing...';
        btn.classList.add('opacity-75');
    });
</script>

@endsection
