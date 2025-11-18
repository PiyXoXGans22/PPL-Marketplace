<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Show register page.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Store user registration.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi sesuai tabel login
        $request->validate([
            'first_name' => ['required', 'string', 'max:30'],
            'last_name'  => ['required', 'string', 'max:30'],
            'username'   => ['required', 'string', 'max:30', 'unique:login,username'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:login,email'],
            'phone'      => ['required', 'numeric'],
            'password'   => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Simpan user ke tabel login
        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'username'   => $request->username,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'password'   => Hash::make($request->password),
            'role_id'    => 3, // default user (role_id = 3)
        ]);

        // Jika mau login otomatis setelah register, aktifkan ini:
        // Auth::login($user);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
