<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', [
            "title" => "Login"
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if ($user && $user->status === 'Admin') {
                return redirect()->intended('/');
            }

            return redirect()->intended('/');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => 'Email atau password salah']);
    }


    public function showRegistrationForm()
    {
        return view('auth.register', [
            "title" => "Register"
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'status' => 'required|in:Guru,Murid,Admin,Lainnya',
        ], [
            'email.unique' => 'Email is already in use.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $user = User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status'),
        ]);

        $user->user_id = $user->id;
        $user->save();

        Session::flash('success', 'Registrasi berhasil, silahkan login.');

        return redirect()->route('login');
    }
}
