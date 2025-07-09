<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['nullable', 'string'],
            'alias' => ['nullable', 'string'],
            'birthdate' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('login')->with('success', 'Cuenta creada');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('ads.index');
        }

        return back()->withErrors([
            'email' => 'Credenciales no válidas',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
