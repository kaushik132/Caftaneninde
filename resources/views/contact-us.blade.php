@extends('layout.dashboard.main')
@section('content')


  <section class="bg-[#FFDEEB] relative lg:pt-[100px] pt-[60px] lg:pb-[80px] pb-[40px] z-[-99]">
    <div class="text-center px-10 lg:px-0">
      <h2 class="font-semibold  lg:text-[38px] text-[20px] ">Contact Us</h2>
      <p class="font-medium text-[12px] lg:-mt-1">We'd love to hear from you. Get in touch with our team for any inquiries or appointments</p>
    </div>

    <img class="absolute bottom-0 left-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/left-leave.png" alt="">
    <img class="absolute bottom-0 right-0 lg:w-[150px] w-[100px] z-[-9]" src="./images/right-leave.png" alt="">
  </section>

  <section class="py-8 lg:px-10 px-4">
    <div class="grid lg:grid-cols-5 grid-cols-1 lg:gap-6 gap-10">
      <div class="lg:col-span-3">
        <div>
          <h2 class="lg:text-[26px] text-[19px] font-semibold">Send Message</h2>
          <p class="lg:text-[15px] text-[12px] font-medium lg:-mt-0.5">Fill out the form below and we'll get back to you within 24 hours</p>
        </div>

        <form class="lg:mt-10 mt-7">
          <div class="lg:flex space-y-5 lg:space-y-0 gap-6">
            <div class="flex-1">
              <label class="lg:text-[15px] text-[13px] font-medium ">First Name*</label>
              <input type="text" value="Jane" class="bg-[#F5F5F5] text-[#545454]  mt-1 block px-4 py-2 lg:text-[15px] text-[13px]  rounded-md w-full border-0 outline-none">
            </div>

            <div class="flex-1">
              <label class="lg:text-[15px] text-[13px] font-medium ">shadow-lgtransition Name*</label>
              <input type="text" value="Doe" class="bg-[#F5F5F5] text-[#545454]   mt-1 block px-4 py-2 lg:text-[15px] text-[13px] rounded-md w-full border-0 outline-none">
            </div>
          </div>

          <div class="mt-5">
            <label class="lg:text-[15px] text-[13px] font-medium ">Email Address*</label>
            <input type="text" value="jane.doe@example.com" class="bg-[#F5F5F5] text-[#545454] mt-1 lg:text-[15px] text-[13px] px-4 py-2.5 rounded-md w-full border-0 outline-none">
          </div>

          <div class="mt-5">
            <label class="lg:text-[15px] text-[13px] font-medium ">Phone Number*</label>
            <input type="text" value="+91 9878437562" class="bg-[#F5F5F5] text-[#545454] mt-1 lg:text-[15px] text-[13px] px-4 py-2.5 rounded-md w-full border-0 outline-none">
          </div>

          <div class="mt-5">
            <label class="lg:text-[15px] text-[13px] font-medium ">Subject*</label>
            <input type="text" placeholder="Inquiry about wedding gown " class="bg-[#F5F5F5] text-[#545454] mt-1 lg:text-[15px] text-[13px] placeholder:text-[#545454] px-4 py-2.5 rounded-md w-full border-0 outline-none">
          </div>

          <div class="mt-5">
            <label class="lg:text-[15px] text-[13px] font-medium ">Message*</label>

            <textarea rows="4" class="bg-[#F5F5F5] resize-none text-[#545454] placeholder:text-[#545454] mt-1 lg:text-[15px] text-[13px] px-4 py-2.5 rounded-md w-full border-0 outline-none" placeholder="Tell us how we can help you..."></textarea>
          </div>

          <div class="lg:mt-7 mt-5">
            <button type="submit" class="py-2.5 text-white lg:text-[15px] text-[13px] font-medium bg-[#FF71A8] rounded-md block w-full cursor-pointer">Send Message</button>
          </div>
        </form>
      </div>

      <div class="lg:col-span-2">
        <div>
          <h2 class="lg:text-[26px] text-[19px] font-semibold">Get In Touch</h2>
        </div>

        <div class="mt-6 lg:space-y-3 space-y-2 ">
          <div class="px-6 flex gap-3 py-5 bg-[#FF97BF]  rounded-md lg:rounded-3xl">
            <div class="bg-[#FF71A8] lg:min-w-[55px] min-w-[45px] lg:h-[55px] h-[45px] rounded-full flex justify-center items-center">
              <img class="lg:w-[20px] w-[16px]" src="./images/location.png" alt="">
            </div>
            <div>
              <h3 class="text-white lg:text-[16px] text-[14px] mb-1 font-medium mt-1">Visit Our Boutique</h3>
              <span class="block text-[12px] lg:text-[14px] text-white">123 Fashion Avenue </span>
              <span class=" block text-[12px] lg:text-[14px] text-white">New York, NY 10001</span>
              <span class="block text-[12px] lg:text-[14px] text-white">United States</span>
            </div>
          </div>

          <div class="px-6 flex gap-3 py-5 bg-[#FF97BF]  rounded-md lg:rounded-3xl">
            <div class="bg-[#FF71A8] lg:min-w-[55px] min-w-[45px] lg:h-[55px] h-[45px] rounded-full flex justify-center items-center">
              <img class="lg:w-[20px] w-[16px]" src="./images/call.png" alt="">
            </div>
            <div>
              <h3 class="text-white lg:text-[16px] text-[14px] mb-1 font-medium mt-1">Call Us</h3>
              <span class="block text-[12px] lg:text-[14px] text-white">+1 (555) 123-4567 </span>
              <span class=" block text-[12px] lg:text-[14px] text-white">Monday - Saturday</span>
            </div>
          </div>

          <div class="px-6 flex gap-3 py-5 bg-[#FF97BF]  rounded-md lg:rounded-3xl">
            <div class="bg-[#FF71A8] lg:min-w-[55px] min-w-[45px] lg:h-[55px] h-[45px] rounded-full flex justify-center items-center">
              <img class="lg:w-[20px] w-[16px]" src="./images/envelope.png" alt="">
            </div>

            <div>
              <h3 class="text-white lg:text-[16px] text-[14px] mb-1 font-medium mt-1">Email Us</h3>
              <span class="block text-[12px] lg:text-[14px] text-white">info@elegance.com </span>
              <span class=" block text-[12px] lg:text-[14px] text-white">support@elegance.com</span>
            </div>
          </div>

          <div class="px-6 flex gap-3 py-5 bg-[#FF97BF] rounded-md lg:rounded-3xl">
            <div class="bg-[#FF71A8] lg:min-w-[55px] min-w-[45px] lg:h-[55px] h-[45px] rounded-full flex justify-center items-center">
              <img class="lg:w-[23px] w-[19px]" src="./images/clock.png" alt="">
            </div>

            <div>
              <h3 class="text-white tlg:text-[16px] text-[14px] mb-1 font-medium mt-1">Business Hours</h3>
              <span class="block text-[12px] lg:text-[14px] text-white">Monday - Friday: 10:00 AM - 7:00 PM </span>
              <span class=" block text-[12px] lg:text-[14px] text-white">Saturday: 10:00 AM - 6:00 PM</span>
              <span class=" block text-[12px] lg:text-[14px] text-white">Sunday: Closed</span>
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

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.7544481910704!2d75.74810857578032!3d26.879541561514664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db500086c45f1%3A0xf6912ee7cae318a1!2sMansarovar%20metro%20station!5e0!3m2!1sen!2sin!4v1760619873423!5m2!1sen!2sin" width="100%" class="lg:h-[450px] h-[250px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>



@endsection
