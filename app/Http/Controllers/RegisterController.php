<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name'  => 'required|string|max:30',
            'username'   => 'required|string|max:30|unique:login',
            'email'      => 'required|email|unique:login',
            'phone'      => 'required|numeric',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'first_name' => $validatedData['first_name'],
            'last_name'  => $validatedData['last_name'],
            'username'   => $validatedData['username'],
            'email'      => $validatedData['email'],
            'phone'      => $validatedData['phone'],
            'password'   => Hash::make($validatedData['password']),
            'role_id'    => 3 // default user
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
