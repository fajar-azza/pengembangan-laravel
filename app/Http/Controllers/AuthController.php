<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Http\Middleware\RoleMiddleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //untuk menampilkan halaman Login Page
    public function loginpage()
    {
        return view('auth.login');
    }

    //proses untuk Login kedalam Dashboard
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if (Auth::user()->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        }
        return back()->withErrors([
            'email' => 'email atau password salah',
        ]);
    }

    //fungsi logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


    // dibawah ini fungsi untuk membuat penambahan User
    public function registerpage()
    {
        return view('admin.loket');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password)
        ]);
        return redirect('/dashboard')->with('success', 'Registrasi berhasil');
    }
}
