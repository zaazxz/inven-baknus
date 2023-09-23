<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // View Login
    public function index() {
        return view('auth.login');
    }

    // Auth Login System
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Alert::success('Success', 'Kamu Berhasil Login!');
            return redirect()->route('home');
        }

        Alert::error('Error', 'Login Gagal!');
        return back();
    }

    // Logging Out
    public function logout(Request $request) {

        // Logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect
        Alert::success('Success', "Logout Berhasil!");
        return redirect()->route('home.dashboard');
    }

}
