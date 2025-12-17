<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


    // dibawah ini fungsi untuk membuat penambahan User
    public function registerpage()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',

        ]);
    
    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>hash::make($request->password)
    ]);
    return redirect('/login')->with('success','Registrasi berhasil');
}

}
