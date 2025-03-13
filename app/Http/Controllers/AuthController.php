<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function showRegister() {
        return view('auth.register');
    }
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }
    public function showLogin() {
        return view('auth.login');
    }
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Logged in successfully');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}