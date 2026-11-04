<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm(): View
    {
        return view('login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/panel')->with('success', 'Sesión iniciada correctamente.');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('email');
    }

    /**
     * Show registration form.
     */
    public function showRegisterForm(): View
    {
        return view('register');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'age' => ['required', 'integer', 'min:1', 'max:120'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'age' => (int) $validated['age'],
            'is_admin' => false,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/panel')->with('success', 'Cuenta creada e inicio de sesión exitoso.');
    }

    /**
     * Quick login helper for demo/testing.
     */
    public function quickLogin(string $type, Request $request): RedirectResponse
    {
        $email = match ($type) {
            'admin' => 'admin@resort.com',
            'adult' => 'adulto@resort.com',
            'minor' => 'menor@resort.com',
            default => null,
        };

        if ($email && $user = User::where('email', $email)->first()) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect('/panel')->with('success', "Has iniciado sesión como {$user->name} ({$user->email}).");
        }

        return redirect('/login')->with('error', 'Usuario de prueba no encontrado.');
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Has cerrado sesión exitosamente.');
    }
}
