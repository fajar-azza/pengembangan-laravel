<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //untuk menampilkan halaman Login Page
    public function loginpage(){
        return view('auth.login');
    }

    //proses untuk Login kedalam Dashboard
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials))
        {
            return redirect('/dashboard');
        }
        return back()->with('error','email atau password salah');
    }

    //fungsi logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
