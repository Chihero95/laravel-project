<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request) {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
        if(Auth::attempt($credentials,$remember)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('auth.login.get')
                    ->withErrors(['Tài khoản hoặc mật khẩu không chính xác']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('auth.login.get');
    }
}
