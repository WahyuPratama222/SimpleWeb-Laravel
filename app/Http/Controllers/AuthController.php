<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    // 1. Get Register
    public function showRegister()
    {
        return view ('auth.register');
    }

    // 2. Post Register
    public function register (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/login');
    }

    // 3. Get Login
    public function showLogin()
    {
        return view('auth.login');
    }

    //4. Post Login
    public function login(request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }

        return back()->with('error', 'Login gagal');
    }

    //5. Get Logout
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
