<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required',
        ]);

        // Validate captcha
        if (!CaptchaController::validate($request)) {
            return back()->withErrors([
                'captcha' => 'Captcha salah, silakan coba lagi',
            ])->withInput($request->except('password', 'captcha'));
        }

        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ada',
            ])->withInput($request->except('password', 'captcha'));
        }

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->withErrors([
                'password' => 'Password salah',
            ])->withInput($request->except('password', 'captcha'));
        }

        return redirect()->route('dashboard')->with('success', 'Login berhasil');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil');
    }
}
