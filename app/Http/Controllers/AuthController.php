<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin_form(){
        return view('auth.signin');
    }

    public function check(Request $request){
        $request->validate([
            'login_email'    => 'required|email',
            'login_password' => 'required|min:6',
        ]);

        $credentials = [
            'email'    => $request->input('login_email'),
            'password' => $request->input('login_password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/myaccount');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
                         ->with('success', 'Kamu sudah logout, hati-hati ya');
    }
}
