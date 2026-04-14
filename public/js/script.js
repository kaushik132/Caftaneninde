
new Swiper("#categorySwiper", {
  slidesPerView: 5,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 1500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: "#categoryNext",
    prevEl: "#categoryPrev",
  },
  breakpoints: {
    320: {
      slidesPerView: 2,
      spaceBetween: 0
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 15
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 20
    },
  },
});


const productSwiper = new Swiper("#productSwiper .swiper", {
  slidesPerView: 4,
  spaceBetween: 25,
  loop: true,
  navigation: {
    nextEl: "#productNext", // unique next button
    prevEl: "#productPrev", // unique prev button
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 15
    },
    1024: {
      slidesPerView: 3.8,
      spaceBetween: 25
    },
  },
});

const customProductSwiper = new Swiper("#customProductSwiper", {
  slidesPerView: 2, // 3 products per view
  spaceBetween: 10,
  loop: true,
  navigation: {
    nextEl: "#productNext",
    prevEl: "#productPrev",
  },
  breakpoints: {
     320: {
      slidesPerView: 1,
      spaceBetween: 10
    },
    640: {
      slidesPerView: 1
    },
    768: {
      slidesPerView: 2
    },
    1024: {
      slidesPerView: 3.6,
      spaceBetween: 30,
    },
  },
});

const reviewSwiper = new Swiper(".myReviewSwiper", {
  slidesPerView: 2,
  spaceBetween: 10,
  loop: true,
  navigation: {
    nextEl: "#reviewNext",
    prevEl: "#reviewPrev",
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  breakpoints: {
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,

    },
    768: {
      slidesPerView: 2
    },
    300: {
      slidesPerView: 1
    },
  },
});

const menuBtn = document.getElementById('menu-btn');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const closeBtn = document.getElementById('close-btn');

menuBtn.addEventListener('click', () => {
  sidebar.classList.remove('-translate-x-full');
  overlay.classList.remove('hidden');
  setTimeout(() => overlay.classList.add('opacity-100'), 10);
});

const closeSidebar = () => {
  sidebar.classList.add('-translate-x-full');
  overlay.classList.add('hidden');
  overlay.classList.remove('opacity-100');
};

overlay.addEventListener('click', closeSidebar);
closeBtn.addEventListener('click', closeSidebar);

const mainHeader = document.getElementById("mainHeader");

window.addEventListener("scroll", () => {
  if (window.scrollY > 80) {
    mainHeader.classList.add(
      "fixed",
      "top-0",
      "left-0",
      "w-full",
      "shadow-md",
      "bg-white",
      "animate-slideDown"
    );
  } else {
    mainHeader.classList.remove(
      "fixed",
      "top-0",
      "left-0",
      "w-full",
      "shadow-md",
      "bg-white",
      "animate-slideDown"
    );
  }
});




//  const slider = document.getElementById('priceSlider');

//   slider.addEventListener('input', function() {
//     const value = this.value;
//     const max = this.max;
//     this.style.background = `linear-gradient(to right, #ff69b4 0%, #ff69b4 ${value/max*100}%, #eee ${value/max*100}%, #eee 100%)`;
//   });



// mobile drop down js

function toggleNested(menuId, iconId) {
  const menu = document.getElementById(menuId);
  const icon = document.getElementById(iconId);

  // Toggle Menu
  menu.classList.toggle('hidden');
  menu.classList.toggle('flex');

  // Icon Change Logic
  if (icon.classList.contains('fa-chevron-down')) {
    // Main Category Toggle (Rotate Arrow)
    icon.classList.toggle('rotate-180');
  } else {
    // Sub Category Toggle (Plus to Minus)
    if (icon.classList.contains('fa-plus')) {
      icon.classList.replace('fa-plus', 'fa-minus');
    } else {
      icon.classList.replace('fa-minus', 'fa-plus');
    }
  }
}

// hero slider js


var swiper = new Swiper(".heroSwiper", {
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  effect: "fade", // Mast fading effect ke liye
  fadeEffect: {
    crossFade: true
  },
});

// product detail  all js

document.addEventListener('DOMContentLoaded', function () {
  console.log("Caftaneninde Logic Started");

  // --- 1. PRODUCT IMAGE GALLERY & ZOOM ---
  const mainImg = document.getElementById('mainImage');
  const zoomArea = document.getElementById('zoomContainer');
  const thumbs = document.querySelectorAll('.product-thumb');
  const thumbBoxes = document.querySelectorAll('.thumb-box');

  if (mainImg && zoomArea) {
    // Switch Image on Click
    thumbs.forEach((img, index) => {
      img.addEventListener('click', () => {
        mainImg.src = img.src;
        // Update UI: Opacity aur Border reset
        thumbBoxes.forEach(box => {
          box.classList.replace('border-[#FF71A8]', 'border-transparent');
          box.classList.add('opacity-60');
        });
        thumbBoxes[index].classList.replace('border-transparent', 'border-[#FF71A8]');
        thumbBoxes[index].classList.remove('opacity-60');
      });
    });

    // Professional Magnify Effect
    zoomArea.addEventListener('mousemove', (e) => {
      const x = e.offsetX;
      const y = e.offsetY;
      mainImg.style.transformOrigin = `${x}px ${y}px`;
      mainImg.style.transform = "scale(2)";
    });

    zoomArea.addEventListener('mouseleave', () => {
      mainImg.style.transform = "scale(1)";
    });
  }

  // --- 2. QUANTITY COUNTER ---
  const qtyVal = document.getElementById('qtyValue');
  const incBtn = document.getElementById('increaseQty');
  const decBtn = document.getElementById('decreaseQty');

  if (qtyVal && incBtn && decBtn) {
    let count = 1;
    incBtn.addEventListener('click', () => {
      count++;
      qtyVal.innerText = count;
    });
    decBtn.addEventListener('click', () => {
      if (count > 1) {
        count--;
        qtyVal.innerText = count;
      }
    });
  }

  // --- 3. SIZE & COLOR PICKER ---
  // Size Selection
  const sizeBtns = document.querySelectorAll('.size-btn');
  sizeBtns.forEach(btn => {
    btn.onclick = function () {
      sizeBtns.forEach(b => {
        b.classList.remove('bg-[#FF71A8]', 'text-white');
        b.classList.add('text-[#FF71A8]');
      });
      this.classList.add('bg-[#FF71A8]', 'text-white');
      this.classList.remove('text-[#FF71A8]');
    };
  });

  // Color Selection
  const colorDots = document.querySelectorAll('.color-dot');
  colorDots.forEach(dot => {
    dot.onclick = function () {
      colorDots.forEach(d => d.classList.remove('ring-2', 'ring-[#FF71A8]'));
      this.classList.add('ring-2', 'ring-[#FF71A8]');
    };
  });

  // --- 4. SWIPER ERROR PROTECTION ---
  // Swiper initialize karte waqt hamesha Try-Catch use karein
  try {
    if (typeof Swiper !== 'undefined') {
      // Aapka Purana Swiper code yahan rahega...
      // Bas loop: false zaroor kar dena warning se bachne ke liye
    }
  } catch (err) {
    console.warn("Swiper was protected from crashing other JS.");
  }
});
// 1. HEART TOGGLE (Fill/Empty)
function toggleHeart() {
  const icon = document.getElementById('heartIcon');
  const btn = document.getElementById('wishlistBtn');

  if (icon.classList.contains('fa-regular')) {
    // Empty to Filled
    icon.classList.replace('fa-regular', 'fa-solid');
    btn.classList.add('bg-[#FF71A8]', 'text-white');
    btn.classList.remove('text-[#FF71A8]');
    console.log("Added to Wishlist");
  } else {
    // Filled to Empty
    icon.classList.replace('fa-solid', 'fa-regular');
    btn.classList.remove('bg-[#FF71A8]', 'text-white');
    btn.classList.add('text-[#FF71A8]');
    console.log("Removed from Wishlist");
  }
}

// 2. SHARE MODAL TOGGLE
function toggleShareModal(show) {
  const modal = document.getElementById('shareModal');
  if (show) {
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  } else {
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
  }
}

// 3. COPY TO CLIPBOARD
function copyToClipboard() {
  const copyText = document.getElementById("copyInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile
  navigator.clipboard.writeText(copyText.value);

  // Feedback
  alert("Link copied to clipboard!");
}


// rab section js


function openTab(evt, tabName) {
  // Hide all contents
  var contents = document.getElementsByClassName("tab-content");
  for (var i = 0; i < contents.length; i++) {
    contents[i].classList.add("hidden");
  }

  // Remove active styling from all buttons
  var buttons = document.getElementsByClassName("tab-btn");
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].classList.remove("bg-white", "font-bold", "shadow-sm");
    buttons[i].classList.add("font-medium");
  }

  // Show selected content & add styling to active button
  document.getElementById(tabName).classList.remove("hidden");
  evt.currentTarget.classList.add("bg-white", "font-bold", "shadow-sm");
  evt.currentTarget.classList.remove("font-medium");
}

function toggleModal(show) {
  const modal = document.getElementById('reviewModal');
  if (show) {
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Stop scrolling
  } else {
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto'; // Enable scrolling
  }
}

// add to cart js
document.addEventListener('DOMContentLoaded', function () {
    // --- 1. ADD TO CART LOGIC ---
    const addBtn = document.getElementById('addToCartBtn');

    if (addBtn) {
        addBtn.addEventListener('click', function (e) {
            e.preventDefault();

            const product = {
                id: this.getAttribute('data-id'),
                name: this.getAttribute('data-name'),
                price: parseFloat(this.getAttribute('data-price')),
                image: this.getAttribute('data-img'),
                quantity: parseInt(document.getElementById('qtyValue')?.innerText || 1)
            };

            let cart = JSON.parse(localStorage.getItem('userCart')) || [];
            const existingProductIndex = cart.findIndex(item => item.id === product.id);

            if (existingProductIndex > -1) {
                cart[existingProductIndex].quantity += product.quantity;
            } else {
                cart.push(product);
            }

            localStorage.setItem('userCart', JSON.stringify(cart));
            showToast(`${product.name} added to cart!`);
        });
    }

    // --- 2. CART PAGE FUNCTIONALITY ---
    const cartItems = document.querySelectorAll('.cart-item');

    cartItems.forEach(item => {
        const plusBtn = item.querySelector('.qty-increase');
        const minusBtn = item.querySelector('.qty-decrease');
        const qtySpan = item.querySelector('.qty-value');
        const totalDisplay = item.querySelector('.item-total');
        const removeBtn = item.querySelector('.remove-btn');
        const pricePerItem = parseFloat(item.getAttribute('data-price'));
        const productId = item.getAttribute('data-id'); // Make sure your HTML has data-id

        // Quantity Increase
        plusBtn?.addEventListener('click', () => {
            let currentQty = parseInt(qtySpan.innerText);
            currentQty++;
            updateUI(currentQty);
            updateStorage(productId, currentQty);
        });

        // Quantity Decrease
        minusBtn?.addEventListener('click', () => {
            let currentQty = parseInt(qtySpan.innerText);
            if (currentQty > 1) {
                currentQty--;
                updateUI(currentQty);
                updateStorage(productId, currentQty);
            }
        });

        // Remove Item (Professional Version)
        removeBtn?.addEventListener('click', () => {
            // Direct remove without annoying native popup
            item.style.transition = "0.4s ease";
            item.style.opacity = "0";
            item.style.transform = "translateX(20px)";

            setTimeout(() => {
                item.remove();
                removeFromStorage(productId);
                showToast("Item removed from cart");
            }, 300);
        });

        function updateUI(qty) {
            qtySpan.innerText = qty;
            const newTotal = (qty * pricePerItem).toFixed(2);
            totalDisplay.innerText = `$${newTotal}`;
        }
    });
});

// --- HELPER FUNCTIONS ---

// Update LocalStorage Quantity
function updateStorage(id, qty) {
    let cart = JSON.parse(localStorage.getItem('userCart')) || [];
    const index = cart.findIndex(item => item.id === id);
    if (index > -1) {
        cart[index].quantity = qty;
        localStorage.setItem('userCart', JSON.stringify(cart));
    }
}

// Remove from LocalStorage
function removeFromStorage(id) {
    let cart = JSON.parse(localStorage.getItem('userCart')) || [];
    cart = cart.filter(item => item.id !== id);
    localStorage.setItem('userCart', JSON.stringify(cart));

    // Refresh page if cart is empty to show empty state
    if (cart.length === 0) location.reload();
}

// Professional Toast Notification
function showToast(msg) {
    // Remove existing toasts first
    const existingToast = document.querySelector('.custom-toast');
    if (existingToast) existingToast.remove();

    const toast = document.createElement('div');
    toast.className = "custom-toast fixed bottom-5 right-5 bg-black text-white px-6 py-3 rounded-md shadow-2xl z-[9999] animate-slideUp";
    toast.style.borderLeft = "4px solid #FF71A8";
    toast.innerText = msg;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = "0";
        setTimeout(() => toast.remove(), 500);
    }, 3000);
}

// search icon js

document.addEventListener('DOMContentLoaded', function () {
  const searchTrigger = document.getElementById('searchTrigger');
  const searchBox = document.getElementById('searchBox');

  if (searchTrigger && searchBox) {
    // 1. Toggle Search Box on Click
    searchTrigger.addEventListener('click', function (e) {
      e.stopPropagation(); // Bubbling rokne ke liye
      searchBox.classList.toggle('hidden');

      const input = searchBox.querySelector('input');
      if (!searchBox.classList.contains('hidden')) {
        input.focus();
      }
    });

    document.addEventListener('click', function (e) {
      if (!searchBox.contains(e.target) && e.target !== searchTrigger) {
        searchBox.classList.add('hidden');
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === "Escape") {
        searchBox.classList.add('hidden');
      }
    });
  }
});


// wishlist js

document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.remove-item');

    removeButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            // Sabse pas wala card dhundo
            const card = this.closest('.wishlist-card');

            // --- POPUP HATA DIYA ---
            // Direct animation shuru
            card.style.transition = "all 0.4s ease";
            card.style.opacity = "0";
            card.style.transform = "scale(0.9) translateY(10px)";

            // Animation ke baad remove
            setTimeout(() => {
                card.remove();
                checkEmptyWishlist(); // Empty state check karne ke liye
            }, 400);
        });
    });
});

// ACCOUNT PAGE JS

// ===== TAB SWITCHING =====
function switchTab(t) {
  document.querySelectorAll('.tab-section').forEach(s => s.classList.remove('active'));
  document.getElementById('tab-' + t)?.classList.add('active');
  document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
  document.querySelectorAll(`.sidebar-link[data-tab="${t}"]`).forEach(l => l.classList.add('active'));
  document.querySelectorAll('.mobile-tab-item').forEach(i => i.classList.remove('active'));
  document.querySelectorAll(`.mobile-tab-item[data-tab="${t}"]`).forEach(i => i.classList.add('active'));
}
document.querySelectorAll('.sidebar-link[data-tab]').forEach(l => l.addEventListener('click', e => {
  e.preventDefault();
  switchTab(l.dataset.tab);
}));
document.querySelectorAll('.mobile-tab-item[data-tab]').forEach(i => i.addEventListener('click', e => {
  e.preventDefault();
  switchTab(i.dataset.tab);
  window.scrollTo({top:0,behavior:'smooth'});
}));

// ===== ORDER FILTER =====
document.querySelectorAll('[data-order-tab]').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('[data-order-tab]').forEach(b => b.classList.remove('active'));
    this.classList.add('active');
    const f = this.dataset.orderTab;
    document.querySelectorAll('.order-card').forEach(c => {
      c.style.display = (f === 'all' || c.dataset.status === f) ? 'block' : 'none';
    });
  });
});

// ===== TOAST =====
let toastTimer;
function showToast(msg) {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 2800);
}

// ===== WISHLIST =====
function removeWishItem(icon) {
  const item = icon.closest('.wish-item');
  item.style.transition = 'opacity 0.3s, transform 0.3s';
  item.style.opacity = '0';
  item.style.transform = 'scale(0.92)';
  setTimeout(() => {
    item.remove();
    const count = document.querySelectorAll('.wish-item').length;
    document.getElementById('wish-count').textContent = `(${count})`;
    if (count === 0) {
      document.getElementById('wishlist-grid').style.display = 'none';
      document.getElementById('wishlist-empty').classList.remove('hidden');
    }
    showToast('Removed from wishlist');
  }, 300);
}

// ===== ADDRESSES DATA =====
let addressData = {
  1: { type:'Home', name:'Sarah Anderson', phone:'+1 (555) 123-4567', street:'123 Fashion Avenue', city:'NewYork, NY', pin:'10001', isDefault:true },
  2: { type:'Work', name:'Sarah Anderson', phone:'+1 (555) 987-6543', street:'456 Business Park, Suite 200', city:'Manhattan', pin:'10002', isDefault:false }
};
let nextAddrId = 3;

const typeIcon = { Home:'fa-house', Work:'fa-briefcase', Other:'fa-location-dot' };
const typeColor = { Home:'text-[#FF71A8]', Work:'text-[#888]', Other:'text-[#888]' };

function renderAddresses() {
  const grid = document.getElementById('address-grid');
  const entries = Object.entries(addressData);
  if (entries.length === 0) {
    grid.innerHTML = `<div class="col-span-2 text-center py-12">
      <i class="fa-solid fa-location-dot text-[#FFB3CE] text-[50px] mb-3 block"></i>
      <p class="text-[#888] text-[15px] font-medium">No addresses saved yet</p>
      <p class="text-[#BBB] text-[13px] mt-1">Add your first delivery address</p>
    </div>`;
    return;
  }
  grid.innerHTML = entries.map(([id, a]) => {
    const ic = typeIcon[a.type] || 'fa-location-dot';
    const cl = a.isDefault ? 'border-[#FF3E88]' : 'border-[#BABABA]';
    return `<div class="address-card ${cl} border lg:rounded-lg rounded-md px-5 pt-4 pb-5">
      <div class="flex justify-between items-center">
        <p class="text-[13px] font-semibold flex items-center gap-1.5">
          <i class="fa-solid ${ic} ${a.isDefault ? 'text-[#FF71A8]' : 'text-[#888]'}"></i> ${a.type}
        </p>
        ${a.isDefault ? '<span class="text-[#FF71A8] bg-[#FFE1ED] text-[11px] font-medium px-3 py-0.5 rounded-sm">Default</span>' : ''}
      </div>
      <div class="mt-3">
        <h3 class="text-[15px] font-semibold">${a.name}</h3>
        <p class="text-[#7D7D7D] text-[13px] font-medium mt-0.5">${a.street}, ${a.city} ${a.pin}</p>
        <p class="text-[#7D7D7D] text-[13px] font-medium">${a.phone || ''}</p>
        <div class="mt-4 flex gap-2 flex-wrap">
          ${!a.isDefault ? `<button onclick="setDefault(${id})" class="text-[12px] rounded-md bg-[#F5F5F5] px-3 py-1.5 font-medium hover:bg-[#FFE1ED] hover:text-[#FF71A8] transition-colors">Set as Default</button>` : ''}
          <button onclick="openAddressModal(${id})" class="text-[12px] rounded-md bg-[#F5F5F5] px-3 py-1.5 flex items-center font-medium gap-1 hover:bg-[#FFE1ED] hover:text-[#FF71A8] transition-colors"><i class="fa-solid fa-pen text-[10px]"></i> Edit</button>
          <button onclick="deleteAddress(${id})" class="text-[12px] text-[#FF0000] rounded-md bg-[#F5F5F5] px-3 py-1.5 flex items-center font-medium gap-1 hover:bg-[#FFE8E8] transition-colors"><i class="fa-solid fa-trash text-[10px]"></i> Delete</button>
        </div>
      </div>
    </div>`;
  }).join('');
}

function openAddressModal(id) {
  document.getElementById('modal-addr-id').value = id || '';
  document.getElementById('modal-title').textContent = id ? 'Edit Address' : 'Add New Address';
  if (id && addressData[id]) {
    const a = addressData[id];
    const radio = document.querySelector(`input[name="addr-type"][value="${a.type}"]`);
    if (radio) radio.checked = true;
    document.getElementById('addr-name').value = a.name;
    document.getElementById('addr-phone').value = a.phone || '';
    document.getElementById('addr-street').value = a.street;
    document.getElementById('addr-city').value = a.city;
    document.getElementById('addr-pin').value = a.pin || '';
    document.getElementById('addr-default').checked = a.isDefault;
  } else {
    document.querySelector('input[name="addr-type"][value="Home"]').checked = true;
    ['addr-name','addr-phone','addr-street','addr-city','addr-pin'].forEach(i => document.getElementById(i).value = '');
    document.getElementById('addr-default').checked = false;
  }
  document.getElementById('address-modal').classList.add('open');
}

function closeAddressModal() { document.getElementById('address-modal').classList.remove('open'); }

function saveAddress() {
  const name = document.getElementById('addr-name').value.trim();
  const street = document.getElementById('addr-street').value.trim();
  const city = document.getElementById('addr-city').value.trim();
  if (!name || !street || !city) { showToast('⚠️ Please fill required fields (*)'); return; }

  const type = document.querySelector('input[name="addr-type"]:checked').value;
  const phone = document.getElementById('addr-phone').value.trim();
  const pin = document.getElementById('addr-pin').value.trim();
  const isDefault = document.getElementById('addr-default').checked;
  const id = document.getElementById('modal-addr-id').value;

  if (isDefault) Object.values(addressData).forEach(a => a.isDefault = false);

  if (id && addressData[id]) {
    addressData[id] = { type, name, phone, street, city, pin, isDefault };
    showToast('✅ Address updated successfully!');
  } else {
    addressData[nextAddrId++] = { type, name, phone, street, city, pin, isDefault };
    showToast('✅ New address added!');
  }
  closeAddressModal();
  renderAddresses();
}

function setDefault(id) {
  Object.keys(addressData).forEach(k => addressData[k].isDefault = false);
  addressData[id].isDefault = true;
  renderAddresses();
  showToast('✅ Default address updated!');
}

function deleteAddress(id) {
  document.getElementById('confirm-title').textContent = 'Delete Address?';
  document.getElementById('confirm-msg').textContent = 'This action cannot be undone.';
  document.getElementById('confirm-modal').classList.add('open');
  document.getElementById('confirm-action-btn').onclick = function() {
    delete addressData[id];
    closeConfirmModal();
    renderAddresses();
    showToast('Address deleted');
  };
}

function closeConfirmModal() { document.getElementById('confirm-modal').classList.remove('open'); }

// Init addresses on page load
renderAddresses();

// ===== SETTINGS =====
function savePersonalInfo() {
  const name = document.getElementById('s-name').value.trim();
  const email = document.getElementById('s-email').value.trim();
  if (!name) { showToast('⚠️ Name cannot be empty'); return; }
  if (!email.includes('@')) { showToast('⚠️ Enter a valid email'); return; }
  showToast('✅ Profile updated successfully!');
}

function previewPhoto(e) {
  const file = e.target.files[0];
  if (!file) return;
  if (file.size > 2 * 1024 * 1024) { showToast('⚠️ File too large! Max 2MB'); return; }
  const reader = new FileReader();
  reader.onload = ev => { document.getElementById('profile-img').src = ev.target.result; showToast('✅ Photo updated!'); };
  reader.readAsDataURL(file);
}

// ===== SECURITY =====
function togglePass(id, btn) {
  const inp = document.getElementById(id);
  const isText = inp.type === 'text';
  inp.type = isText ? 'password' : 'text';
  btn.innerHTML = isText ? '<i class="fa-regular fa-eye"></i>' : '<i class="fa-regular fa-eye-slash"></i>';
}

function checkStrength(v) {
  let s = 0;
  if (v.length >= 8) s++;
  if (/[A-Z]/.test(v)) s++;
  if (/[0-9]/.test(v)) s++;
  if (/[^A-Za-z0-9]/.test(v)) s++;
  const levels = [
    {w:'0%',c:'',t:'Must be at least 8 characters'},
    {w:'25%',c:'#FF5252',t:'Weak password'},
    {w:'50%',c:'#FF9800',t:'Fair password'},
    {w:'75%',c:'#2196F3',t:'Good password'},
    {w:'100%',c:'#08A702',t:'Strong password ✓'}
  ];
  const bar = document.getElementById('strength-bar');
  const txt = document.getElementById('strength-text');
  bar.style.width = levels[s].w;
  bar.style.backgroundColor = levels[s].c;
  txt.textContent = levels[s].t;
  txt.style.color = levels[s].c || '#AAA';
}

function updatePassword() {
  const cur = document.getElementById('cur-pass').value;
  const nw = document.getElementById('new-pass').value;
  const cf = document.getElementById('conf-pass').value;
  if (!cur) { showToast('⚠️ Enter your current password'); return; }
  if (nw.length < 8) { showToast('⚠️ New password must be 8+ characters'); return; }
  if (nw !== cf) { showToast('⚠️ Passwords do not match'); return; }
  clearPassFields();
  showToast('✅ Password updated successfully!');
}

function clearPassFields() {
  ['cur-pass','new-pass','conf-pass'].forEach(id => document.getElementById(id).value = '');
  checkStrength('');
}

// ===== ORDER CANCEL =====
function confirmCancel(btn) {
  const card = btn.closest('.order-card');
  document.getElementById('confirm-title').textContent = 'Cancel Order?';
  document.getElementById('confirm-msg').textContent = 'Are you sure you want to cancel this order?';
  document.getElementById('confirm-modal').classList.add('open');
  document.getElementById('confirm-action-btn').onclick = function() {
    card.style.transition = 'opacity 0.3s';
    card.style.opacity = '0';
    setTimeout(() => { card.remove(); showToast('Order cancelled'); }, 300);
    closeConfirmModal();
  };
}






// NAVIGATION BAR MOBILE


