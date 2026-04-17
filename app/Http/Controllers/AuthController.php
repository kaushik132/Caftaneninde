<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ── Login Form ────────────────────────────────────────────────────────────
    public function loginForm()
    {
        $homepage = Seo::select('seo_title_login', 'seo_des_login', 'seo_key_login')->first();
        $seo_data['seo_title'] = $homepage->seo_title_login;
        $seo_data['seo_description'] = $homepage->seo_des_login;
        $seo_data['keywords'] = $homepage->seo_key_login;

        $canocial = 'https://www.caftaneninde.com/login';
        return view('auth.login',compact('seo_data','canocial'));
    }

    // ── Login Submit ──────────────────────────────────────────────────────────
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Admin ho to admin panel, user ho to home
            if (Auth::user()->role === 'admin') {
                return redirect()->route('home')->with('success', 'Welcome back, Admin!');
            }

            return redirect()->intended(route('home'))->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'These credentials do not match our records.'])->onlyInput('email');
    }

    // ── Register Form ─────────────────────────────────────────────────────────
    public function registerForm()
    {
        $homepage = Seo::select('seo_title_register', 'seo_des_register', 'seo_key_register')->first();
        $seo_data['seo_title'] = $homepage->seo_title_register;
        $seo_data['seo_description'] = $homepage->seo_des_register;
        $seo_data['keywords'] = $homepage->seo_key_register;

        $canocial = 'https://www.caftaneninde.com/register';
        return view('auth.register',compact('seo_data','canocial'));
    }

    // ── Register Submit ───────────────────────────────────────────────────────
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // password_confirmation field chahiye
            'password_confirmation' => 'required|min:6',
            'phone'    => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'phone'    => $request->phone,
            'role'     => 'user',
        ]);

        Auth::login($user);



        return redirect()->route('home')->with('success', 'Account created successfully!');
    }

    // ── Logout ────────────────────────────────────────────────────────────────
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
