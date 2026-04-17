@extends('layout.dashboard.main')
@section('content')
    <section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] z-[-99]">
        <div class="text-center px-10 lg:px-0">
            <h2 class="font-semibold  lg:text-[38px] text-[20px] ">Contact Us</h2>
            <p class="font-medium text-[12px] lg:-mt-1">We'd love to hear from you. Get in touch with our team for any
                inquiries or appointments</p>
        </div>

        <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/left-leave.png" alt="">
        <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/right-leave.png" alt="">
    </section>

    <section class="py-8 lg:px-10 px-4">
        <div class="grid lg:grid-cols-5 grid-cols-1 lg:gap-6 gap-10">

            {{-- ── LEFT — Contact Form ──────────────────────────────────────────── --}}
            <div class="lg:col-span-3">
                <div>
                    <h2 class="lg:text-[26px] text-[19px] font-semibold">Send Message</h2>
                    <p class="lg:text-[15px] text-[12px] font-medium lg:-mt-0.5">
                        Fill out the form below and we'll get back to you within 24 hours
                    </p>
                </div>

                {{-- Success Message (non-JS fallback) --}}
                @if (session('success'))
                    <div
                        class="mt-5 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-[13px] flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                        {{ session('success') }}
                    </div>
                @endif

                {{-- AJAX Success Banner (hidden by default) --}}
                <div id="successBanner"
                    class="hidden mt-5 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-[13px] flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-green-500"></i>
                    <span id="successText"></span>
                </div>

                <form action="{{route('contact.send')}}" method="POST"  class="lg:mt-10 mt-7" novalidate>
                    @csrf

                    {{-- Name Row --}}
                    <div class="lg:flex space-y-5 lg:space-y-0 gap-6">
                        <div class="flex-1">
                            <label class="lg:text-[15px] text-[13px] font-medium">First Name *</label>
                            <input type="text" name="first_name" id="first_name"
                                value="{{ auth()->user()?->name ? explode(' ', auth()->user()->name)[0] : old('first_name') }}"
                                placeholder=""
                                class="form-input bg-[#F5F5F5] text-[#545454] mt-1 block px-4 py-2.5 lg:text-[15px] text-[13px] rounded-md w-full border-0 outline-none focus:ring-2 focus:ring-[#FF71A8] transition">
                            <p class="err-msg hidden text-red-500 text-[11px] mt-1" id="err_first_name"></p>
                        </div>
                        <div class="flex-1">
                            <label class="lg:text-[15px] text-[13px] font-medium">Last Name *</label>
                            <input type="text" name="last_name" id="last_name"
                                value="{{ auth()->user()?->name ? explode(' ', auth()->user()->name)[1] ?? '' : old('last_name') }}"
                                placeholder=""
                                class="form-input bg-[#F5F5F5] text-[#545454] mt-1 block px-4 py-2.5 lg:text-[15px] text-[13px] rounded-md w-full border-0 outline-none focus:ring-2 focus:ring-[#FF71A8] transition">
                            <p class="err-msg hidden text-red-500 text-[11px] mt-1" id="err_last_name"></p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mt-5">
                        <label class="lg:text-[15px] text-[13px] font-medium">Email Address *</label>
                        <input type="email" name="email" id="email"
                            value="{{ auth()->user()?->email ?? old('email') }}" placeholder=""
                            class="form-input bg-[#F5F5F5] text-[#545454] mt-1 lg:text-[15px] text-[13px] px-4 py-2.5 rounded-md w-full border-0 outline-none focus:ring-2 focus:ring-[#FF71A8] transition">
                        <p class="err-msg hidden text-red-500 text-[11px] mt-1" id="err_email"></p>
                    </div>

                    {{-- Phone --}}
                    <div class="mt-5">
                        <label class="lg:text-[15px] text-[13px] font-medium">Phone Number</label>
                        <input type="text" name="phone" id="phone"
                            value="{{ auth()->user()?->phone ?? old('phone') }}" placeholder="+1 (555) 000-0000"
                            class="form-input bg-[#F5F5F5] text-[#545454] mt-1 lg:text-[15px] text-[13px] px-4 py-2.5 rounded-md w-full border-0 outline-none focus:ring-2 focus:ring-[#FF71A8] transition">
                    </div>

                    {{-- Subject --}}
                    <div class="mt-5">
                        <label class="lg:text-[15px] text-[13px] font-medium">Subject *</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                            placeholder="Inquiry about wedding gown"
                            class="form-input bg-[#F5F5F5] text-[#545454] mt-1 lg:text-[15px] text-[13px] placeholder:text-[#9D9D9D] px-4 py-2.5 rounded-md w-full border-0 outline-none focus:ring-2 focus:ring-[#FF71A8] transition">
                        <p class="err-msg hidden text-red-500 text-[11px] mt-1" id="err_subject"></p>
                    </div>

                    {{-- Message --}}
                    <div class="mt-5">
                        <label class="lg:text-[15px] text-[13px] font-medium">Message *</label>
                        <textarea name="message" id="message" rows="5" placeholder="Tell us how we can help you..."
                            class="form-input bg-[#F5F5F5] resize-none text-[#545454] placeholder:text-[#9D9D9D] mt-1 lg:text-[15px] text-[13px] px-4 py-2.5 rounded-md w-full border-0 outline-none focus:ring-2 focus:ring-[#FF71A8] transition">{{ old('message') }}</textarea>
                        <div class="flex justify-between items-center mt-1">
                            <p class="err-msg hidden text-red-500 text-[11px]" id="err_message"></p>
                            <p class="text-[11px] text-gray-400 ml-auto"><span id="charCount">0</span>/2000</p>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="lg:mt-7 mt-5">
                        <button type="submit"
                            class="py-2.5 text-white lg:text-[15px] text-[13px] font-medium bg-[#FF71A8] rounded-md block w-full cursor-pointer hover:bg-black transition-all">
                            <span id="submitText">Send Message</span>
                         
                        </button>
                    </div>
                </form>
            </div>

            {{-- ── RIGHT — Get In Touch ─────────────────────────────────────────── --}}
            <div class="lg:col-span-2">
                <div>
                    <h2 class="lg:text-[26px] text-[19px] font-semibold">Get In Touch</h2>
                </div>

                <div class="mt-6 lg:space-y-3 space-y-2">
                    <div class="px-6 flex gap-3 py-5 bg-[#FF97BF] rounded-md lg:rounded-3xl">
                        <div
                            class="bg-[#FF71A8] lg:min-w-[55px] min-w-[45px] lg:h-[55px] h-[45px] rounded-full flex justify-center items-center flex-shrink-0">
                            <img class="lg:w-[20px] w-[16px]" src="{{ asset('images/location.png') }}" alt="">
                        </div>
                        <div>
                            <h3 class="text-white lg:text-[16px] text-[14px] mb-1 font-medium mt-1">Visit Our Boutique</h3>
                            <span class="block text-[12px] lg:text-[14px] text-white">123 Fashion Avenue</span>
                            <span class="block text-[12px] lg:text-[14px] text-white">New York, NY 10001</span>
                            <span class="block text-[12px] lg:text-[14px] text-white">United States</span>
                        </div>
                    </div>

                    <div class="px-6 flex gap-3 py-5 bg-[#FF97BF] rounded-md lg:rounded-3xl">
                        <div
                            class="bg-[#FF71A8] lg:min-w-[55px] min-w-[45px] lg:h-[55px] h-[45px] rounded-full flex justify-center items-center flex-shrink-0">
                            <img class="lg:w-[20px] w-[16px]" src="{{ asset('images/call.png') }}" alt="">
                        </div>
                        <div>
                            <h3 class="text-white lg:text-[16px] text-[14px] mb-1 font-medium mt-1">Call Us</h3>
                            <span class="block text-[12px] lg:text-[14px] text-white">+1 (555) 123-4567</span>
                            <span class="block text-[12px] lg:text-[14px] text-white">Monday - Saturday</span>
                        </div>
                    </div>

                    <div class="px-6 flex gap-3 py-5 bg-[#FF97BF] rounded-md lg:rounded-3xl">
                        <div
                            class="bg-[#FF71A8] lg:min-w-[55px] min-w-[45px] lg:h-[55px] h-[45px] rounded-full flex justify-center items-center flex-shrink-0">
                            <img class="lg:w-[20px] w-[16px]" src="{{ asset('images/envelope.png') }}" alt="">
                        </div>
                        <div>
                            <h3 class="text-white lg:text-[16px] text-[14px] mb-1 font-medium mt-1">Email Us</h3>
                            <span class="block text-[12px] lg:text-[14px] text-white">info@elegance.com</span>
                            <span class="block text-[12px] lg:text-[14px] text-white">support@elegance.com</span>
                        </div>
                    </div>

                    <div class="px-6 flex gap-3 py-5 bg-[#FF97BF] rounded-md lg:rounded-3xl">
                        <div
                            class="bg-[#FF71A8] lg:min-w-[55px] min-w-[45px] lg:h-[55px] h-[45px] rounded-full flex justify-center items-center flex-shrink-0">
                            <img class="lg:w-[23px] w-[19px]" src="{{ asset('images/clock.png') }}" alt="">
                        </div>
                        <div>
                            <h3 class="text-white lg:text-[16px] text-[14px] mb-1 font-medium mt-1">Business Hours</h3>
                            <span class="block text-[12px] lg:text-[14px] text-white">Monday - Friday: 10:00 AM - 7:00
                                PM</span>
                            <span class="block text-[12px] lg:text-[14px] text-white">Saturday: 10:00 AM - 6:00 PM</span>
                            <span class="block text-[12px] lg:text-[14px] text-white">Sunday: Closed</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="mt-5">
        <div class="text-center mb-4">
            <h2 class="font-semibold lg:text-[28px] text-[20px]">Find Us</h2>
        </div>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.7544481910704!2d75.74810857578032!3d26.879541561514664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db500086c45f1%3A0xf6912ee7cae318a1!2sMansarovar%20metro%20station!5e0!3m2!1sen!2sin!4v1760619873423!5m2!1sen!2sin"
            width="100%" class="lg:h-[450px] h-[250px]" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>


    @endsection
