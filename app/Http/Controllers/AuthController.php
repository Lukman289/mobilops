<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    public function index() {
        return view("auth.login");
    }

    public function login (Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $user = $request->only('username','password');

        if (!Auth::attempt($user)) {
            Log::error('Login failed', ['username' => $request->username]);

            return redirect('login')
                ->withInput()
                ->withErrors(['login_failed' => 'Pastikan kembali username dan password yang dimasukan sudah benar']);
        }

        Log::info('Login success', ['username' => $request->username]);
        Log::info('Role user', ['role' => Auth::user()->role]);

        return redirect()->intended(match(Auth::user()->role) {
            'admin' => 'admin',
            'validator' => 'validator',
            default => 'login'
        });
    }

    public function logout() {
        Auth::logout();

        return redirect('login');
    }
}
