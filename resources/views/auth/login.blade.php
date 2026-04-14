@extends('layout.dashboard.main')
@section('content')
<style>
    header {
       display: none;
    }
    footer {
       display: none;
    }
    body {
display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
}
</style>



<section class="py-[30px]">
    <div class="max-w-[450px] w-full bg-white rounded-3xl shadow-[0_20px_50px_rgba(255,113,168,0.15)] p-8 lg:p-12 border border-gray-50 mx-auto">
    <div class="text-center mb-10">
        <h1 class="text-[28px] font-bold text-gray-800 tracking-tight">Welcome Back</h1>
        <p class="text-gray-400 text-[14px] mt-1 font-medium">Please enter your details to sign in</p>
    </div>
   @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>

   @endif

    <form action="{{route('login.post')}}" method="POST" class="space-y-6">
        @csrf
        <div class="space-y-2">
            <label class="text-[13px] font-bold text-gray-600 ml-1">Email Address</label>
            <div class="relative group">
                <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#FF71A8] transition-colors"></i>
                <input type="email" name="email" placeholder="name@company.com" required
                       class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-transparent rounded-2xl outline-none focus:bg-white focus:border-[#FF71A8] focus:ring-4 focus:ring-[#FF71A8]/5 transition-all text-[15px]">
            </div>
        </div>

        <div class="space-y-2">
            <div class="flex justify-between items-center ml-1">
                <label class="text-[13px] font-bold text-gray-600">Password</label>
                <a href="#" class="text-[12px] font-bold text-[#FF71A8] hover:underline">Forgot?</a>
            </div>
            <div class="relative group">
                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#FF71A8] transition-colors"></i>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-transparent rounded-2xl outline-none focus:bg-white focus:border-[#FF71A8] focus:ring-4 focus:ring-[#FF71A8]/5 transition-all text-[15px]">
            </div>
        </div>

        <button type="submit" class="w-full bg-[#FF71A8] text-white py-4 rounded-2xl font-bold shadow-lg shadow-[#FF71A8]/30 hover:bg-black transition-all transform hover:-translate-y-1">
            Sign In
        </button>
    </form>

    <p class="text-center mt-8 text-[14px] font-medium text-gray-500">
        Don't have an account?
        <a href="{{url('register')}}" class="text-[#FF71A8] font-bold hover:underline">Create Account</a>
    </p>
</div>

</section>

@endsection
