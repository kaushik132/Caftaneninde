@extends('layout.dashboard.main')
@section('content')
    {{-- ── Hero ──────────────────────────────────────────────────────────────────── --}}
    <section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] overflow-hidden">
        <div class="text-center px-10 lg:px-0">
            <h2 class="font-semibold lg:text-[38px] text-[20px]">Shopping Cart</h2>
            <p class="font-medium text-[12px] lg:-mt-1">
                <span id="heroItemCount">{{ $itemCount }}</span>
                {{ Str::plural('item', $itemCount) }} in your cart
            </p>
        </div>
        <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-0 pointer-events-none"
            src="{{ asset('images/left-leave.png') }}" alt="">
        <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-0 pointer-events-none"
            src="{{ asset('images/right-leave.png') }}" alt="">
    </section>

    {{-- ── Main Section ─────────────────────────────────────────────────────────── --}}
    <section class="lg:px-12 px-4 lg:py-14 py-10">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-6 items-start">

            {{-- ── Cart Items ──────────────────────────────────────────────────── --}}
            <div class="lg:col-span-2 space-y-4" id="cartItemsContainer">

                @forelse($cartItems as $item)
                    @php
                        $product = $item->product;
                        $variant = $item->variant;
                        $price = $product->sale_price ?? $product->price;
                        $thumb = $product->primaryImage;
                    @endphp

                    <div class="cart-item border-[#E6E6E6] border lg:rounded-2xl rounded-md px-3 py-3 lg:px-4 lg:py-4"
                        id="cart-item-{{ $item->id }}" data-id="{{ $item->id }}" data-price="{{ $price }}"
                        data-stock="{{ $variant->stock_quantity ?? 99 }}">

                        <div class="flex gap-3 lg:gap-4">

                            {{-- Product Image --}}
                            <a href="{{ route('product-details', $product->slug) }}">
                                <img class="w-[100px] h-[130px] lg:w-[150px] lg:h-[200px] object-cover lg:rounded-lg rounded-md"
                                    src="{{ $thumb ? url('uploads/' . $thumb->image_path) : 'https://via.placeholder.com/150x200' }}"
                                    alt="{{ $product->name }}">
                            </a>

                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start">
                                        <a href="{{ route('product-details', $product->slug) }}"
                                            class="lg:text-[22px] text-[15px] font-semibold leading-tight pr-2 hover:text-[#FF71A8] transition">
                                            {{ $product->name }}
                                        </a>
                                        {{-- Remove Button --}}
                                        <button onclick="removeItem({{ $item->id }})"
                                            class="remove-btn text-gray-400 hover:text-red-500 transition-colors flex-shrink-0">
                                            <i class="fa-solid fa-xmark lg:text-[20px] text-[18px]"></i>
                                        </button>
                                    </div>

                                    @if ($variant)
                                        <p class="text-[#9D9D9D] lg:text-[14px] text-[11px] mt-1">Color:
                                            {{ $variant->color }}</p>
                                        <p class="text-[#9D9D9D] lg:text-[14px] text-[11px]">Size: {{ $variant->size }}</p>
                                    @endif

                                    @if ($product->sale_price)
                                        <p class="text-gray-400 text-[11px] mt-1 line-through">
                                            ${{ number_format($product->price, 2) }}</p>
                                    @endif
                                </div>

                                <div class="mt-4 lg:mt-0 flex flex-col lg:flex-row lg:justify-between lg:items-end gap-3">

                                    {{-- Qty Controls --}}
                                    <div class="flex items-center gap-2">
                                        <p class="lg:text-[15px] text-[12px] font-medium text-[#898888]">Qty:</p>
                                        <div
                                            class="flex items-center gap-2 lg:gap-4 bg-gray-50 p-1 rounded-md border border-gray-100">
                                            <button onclick="changeQty({{ $item->id }}, -1)"
                                                class="qty-decrease border-[#FF71A8] border cursor-pointer text-[#FF71A8] w-7 h-7 lg:w-8 lg:h-8 flex items-center justify-center rounded-md hover:bg-[#FF71A8] hover:text-white transition-all">
                                                <i class="fa-solid fa-minus text-[10px]"></i>
                                            </button>
                                            <span
                                                class="qty-value font-bold text-[13px] lg:text-[15px] min-w-[20px] text-center">{{ $item->quantity }}</span>
                                            <button onclick="changeQty({{ $item->id }}, 1)"
                                                class="qty-increase border-[#FF71A8] border cursor-pointer text-[#FF71A8] w-7 h-7 lg:w-8 lg:h-8 flex items-center justify-center rounded-md hover:bg-[#FF71A8] hover:text-white transition-all">
                                                <i class="fa-solid fa-plus text-[10px]"></i>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- Item Total --}}
                                    <div
                                        class="text-left lg:text-right border-t border-gray-50 pt-2 lg:border-none lg:pt-0">
                                        <h3 class="item-total text-[#FF71A8] lg:text-[22px] text-[18px] font-bold">
                                            ${{ number_format($price * $item->quantity, 2) }}
                                        </h3>
                                        <p class="lg:text-[13px] text-[11px] text-[#898888] font-medium">
                                            ${{ number_format($price, 2) }} each
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    {{-- Empty Cart --}}
                    <div id="emptyCart"
                        class="flex flex-col items-center justify-center py-20 text-center border border-[#E6E6E6] rounded-2xl">
                        <div class="w-24 h-24 bg-[#FFE1ED] rounded-full flex items-center justify-center mx-auto mb-5">
                            <i class="fa-solid fa-cart-shopping text-[#FF71A8] text-3xl"></i>
                        </div>
                        <h3 class="text-[20px] font-semibold text-gray-700">Your cart is empty</h3>
                        <p class="text-gray-400 text-[14px] mt-2">Add some products to get started.</p>
                        <a href="{{ route('products') }}"
                            class="mt-6 bg-[#FF71A8] text-white px-8 py-3 rounded-md text-[14px] font-bold hover:bg-black transition">
                            Browse Products
                        </a>
                    </div>
                @endforelse

                @if ($cartItems->count() > 0)
                    <div class="mt-6">
                        <a href="{{ route('products') }}"
                            class="w-full lg:w-auto border-[#FF71A8] border rounded-md font-bold text-[#FF71A8] px-8 py-3 lg:text-[14px] text-[13px] inline-block text-center hover:bg-[#FF71A8] hover:text-white transition-all shadow-sm">
                            <i class="fa-solid fa-arrow-left mr-2"></i> Continue Shopping
                        </a>
                    </div>
                @endif
            </div>

            {{-- ── Order Summary ────────────────────────────────────────────────── --}}
            <div
                class="col-span-1 border-[#E6E6E6] border rounded-2xl lg:px-6 px-4 lg:pt-5 pt-4 pb-6 lg:sticky lg:top-[90px]">
                <h2 class="lg:text-[19px] text-[15px] font-medium">Order Summary</h2>

                <div class="mt-4 space-y-1 lg:text-[16px] text-[13px] border-[#B0B0B0] border-b pb-5">
                    <div class="flex justify-between">
                        <p class="text-[#737373]">Subtotal:</p>
                        <p id="summarySubtotal">${{ number_format($subtotal, 2) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-[#737373]">Shipping:</p>
                        <p class="text-[#389528]">{{ $shipping == 0 ? 'Free' : '$' . number_format($shipping, 2) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-[#737373]">Tax (8%)</p>
                        <p id="summaryTax">${{ number_format($tax, 2) }}</p>
                    </div>
                </div>

                <div class="flex justify-between lg:text-[18px] text-[14px] mt-3 font-semibold">
                    <p>Total:</p>
                    <p id="summaryTotal">${{ number_format($total, 2) }}</p>
                </div>

                <div class="mt-4">
                    @if ($cartItems->count() > 0)
                        <a href="{{ url('checkout') }}"
                            class="text-white bg-[#FF71A8] lg:text-[14px] text-[13px] font-medium text-center py-2.5 block w-full rounded-md hover:bg-black transition">
                            Proceed to Checkout
                        </a>
                    @else
                        <button disabled
                            class="text-white bg-gray-300 lg:text-[14px] text-[13px] font-medium text-center py-2.5 block w-full rounded-md cursor-not-allowed">
                            Proceed to Checkout
                        </button>
                    @endif
                </div>

                <ul class="text-[13px] mt-5 text-[#FF71A8] font-medium space-y-1">
                    <li>✓ Secure checkout</li>
                    <li>✓ 30-day returns</li>
                    <li>✓ Money-back guarantee</li>
                </ul>
            </div>

        </div>
    </section>

    {{-- ── JavaScript ───────────────────────────────────────────────────────────── --}}
    <script>
        const csrfToken = "{{ csrf_token() }}";
        const TAX_RATE = 0.08;

        // ── Quantity Change ───────────────────────────────────────────────────────
        function changeQty(itemId, delta) {
            const row = document.getElementById('cart-item-' + itemId);
            const qtyEl = row.querySelector('.qty-value');
            const stock = parseInt(row.dataset.stock);
            const price = parseFloat(row.dataset.price);
            const currentQty = parseInt(qtyEl.textContent);
            const newQty = currentQty + delta;

            if (newQty < 1) {
                removeItem(itemId);
                return;
            }
            if (newQty > stock) {
                showToast('Maximum stock reached!', 'warning');
                return;
            }

            // Buttons disable karo taake double click na ho
            row.querySelectorAll('.qty-decrease, .qty-increase').forEach(btn => btn.disabled = true);

            fetch(`/cart/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-HTTP-Method-Override': 'PATCH',
                    },
                    body: JSON.stringify({
                        quantity: newQty
                    }),
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Server se confirmed value set karo
                        qtyEl.textContent = data.new_quantity;
                        row.querySelector('.item-total').textContent = '$' + (price * data.new_quantity).toFixed(2);

                        // Navbar cart count update karo
                        const cartCountEl = document.getElementById('cartCount');
                        if (cartCountEl && data.cart_count !== undefined) {
                            cartCountEl.textContent = data.cart_count;
                        }

                        recalcSummary();
                        updateHeroCount();
                    } else {
                        showToast(data.message ?? 'Update failed.', 'warning');
                    }
                })
                .catch(() => showToast('Network error.', 'warning'))
                .finally(() => {
                    // Buttons wapas enable karo
                    row.querySelectorAll('.qty-decrease, .qty-increase').forEach(btn => btn.disabled = false);
                });
        }
        // ── Remove Item ───────────────────────────────────────────────────────────
        function removeItem(itemId) {
            const row = document.getElementById('cart-item-' + itemId);

            // Animate out
            row.style.transition = 'all 0.3s ease';
            row.style.opacity = '0';
            row.style.transform = 'translateX(20px)';

            setTimeout(() => {
                row.remove();
                recalcSummary();
                updateHeroCount();
                checkEmpty();
            }, 300);

            // AJAX
            fetch(`/cart/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-HTTP-Method-Override': 'DELETE',
                    },
                })
                .then(res => res.json())
                .then(data => {
                    const cartCountEl = document.getElementById('cartCount');
                    if (cartCountEl) {
                        cartCountEl.textContent = data.cart_count;
                        // 0 hone par hide karo
                        cartCountEl.classList.toggle('hidden', data.cart_count == 0);
                    }
                    showToast('Item removed.');
                })
                .catch(() => {});
        }

        // ── Recalculate Summary ───────────────────────────────────────────────────
        function recalcSummary() {
            let subtotal = 0;
            document.querySelectorAll('.cart-item').forEach(row => {
                const price = parseFloat(row.dataset.price);
                const qty = parseInt(row.querySelector('.qty-value').textContent);
                subtotal += price * qty;
            });

            const tax = subtotal * TAX_RATE;
            const total = subtotal + tax;

            document.getElementById('summarySubtotal').textContent = '$' + subtotal.toFixed(2);
            document.getElementById('summaryTax').textContent = '$' + tax.toFixed(2);
            document.getElementById('summaryTotal').textContent = '$' + total.toFixed(2);
        }

        // ── Hero Count Update ─────────────────────────────────────────────────────
        function updateHeroCount() {
            let total = 0;
            document.querySelectorAll('.cart-item .qty-value').forEach(el => {
                total += parseInt(el.textContent);
            });
            const heroEl = document.getElementById('heroItemCount');
            if (heroEl) heroEl.textContent = total;
        }

        // ── Show Empty State if no items left ────────────────────────────────────
        function checkEmpty() {
            const remaining = document.querySelectorAll('.cart-item').length;
            if (remaining === 0) {
                document.getElementById('cartItemsContainer').innerHTML = `
                <div class="flex flex-col items-center justify-center py-20 text-center border border-[#E6E6E6] rounded-2xl">
                    <div class="w-24 h-24 bg-[#FFE1ED] rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fa-solid fa-cart-shopping text-[#FF71A8] text-3xl"></i>
                    </div>
                    <h3 class="text-[20px] font-semibold text-gray-700">Your cart is empty</h3>
                    <p class="text-gray-400 text-[14px] mt-2">Add some products to get started.</p>
                    <a href="{{ route('products') }}" class="mt-6 bg-[#FF71A8] text-white px-8 py-3 rounded-md text-[14px] font-bold hover:bg-black transition">
                        Browse Products
                    </a>
                </div>`;
            }
        }

        // ── Toast ─────────────────────────────────────────────────────────────────
        function showToast(msg, type = 'success') {
            let toast = document.getElementById('toastMsg');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'toastMsg';
                document.body.appendChild(toast);
            }
            const colors = {
                success: 'bg-[#FF71A8]',
                warning: 'bg-orange-500'
            };
            toast.className =
                `fixed bottom-6 right-6 px-5 py-3 rounded-xl text-[13px] font-medium z-[9999] text-white transition-opacity duration-300 ${colors[type] || colors.success}`;
            toast.textContent = msg;
            toast.style.opacity = '1';
            clearTimeout(window._toastTimer);
            window._toastTimer = setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 300);
            }, 2500);
        }
    </script>
@endsection
