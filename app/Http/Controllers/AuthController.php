<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function signup_form(){
        return view('auth.signup');
    }

    public function signup_check(Request $request){
        $val = $request->validate([
            'login_name'        => 'required|unique:users,name',
            'login_email'       => 'required|email|unique:users,email',
            'login_password'    => 'required|min:6',
            'login_password2'   => 'required|same:login_password',
        ], [
            'login_password2.same' => 'Konfirmasi password tidak sama dengan password.',
        ]);

        $user = User::create([
            'name'     => $request->login_name,
            'email'    => $request->login_email,
            'password' => Hash::make($request->login_password),
            'balance'  => 0.00,
        ]);

        // otomatis login setelah signup
        Auth::login($user);

        return redirect()->intended('/myaccount')->with('success', 'Pendaftaran berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('signin_form')
                         ->with('success', 'Kamu sudah logout, hati-hati ya');
    }
}
