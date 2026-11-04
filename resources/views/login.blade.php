@extends('layouts.app')

@section('title', 'Inicio de Sesión')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
        <h1 class="text-2xl font-bold text-white mb-2">Iniciar Sesión en el Resort</h1>
        <p class="text-slate-400 text-sm mb-6">
            Introduce tus credenciales para acceder a las instalaciones privadas de nuestro complejo.
        </p>

        @if ($errors->any())
            <div class="mb-4 p-3 rounded-lg bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1">
                    Correo Electrónico
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="ejemplo@resort.com">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1">
                    Contraseña
                </label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="••••••••">
            </div>

            <button type="submit" class="w-full py-3 px-4 rounded-xl font-bold bg-emerald-600 hover:bg-emerald-500 text-white transition shadow-lg shadow-emerald-900/30">
                Acceder a mi Cuenta
            </button>
        </form>

        <div class="mt-6 pt-6 border-t border-slate-700 text-center text-xs text-slate-400">
            ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-emerald-400 font-semibold hover:underline">Regístrate aquí</a>
        </div>

        <div class="mt-6 p-4 rounded-xl bg-slate-900/70 border border-slate-700/60 text-xs text-slate-300 space-y-2">
            <p class="font-bold text-slate-200">Usuarios de prueba disponibles (clave: password):</p>
            <ul class="list-disc list-inside space-y-1 text-slate-400">
                <li><span class="text-rose-400 font-medium">admin@resort.com</span> (Admin, 35 años)</li>
                <li><span class="text-emerald-400 font-medium">adulto@resort.com</span> (Adulto, 25 años)</li>
                <li><span class="text-amber-400 font-medium">menor@resort.com</span> (Menor, 16 años)</li>
            </ul>
        </div>
    </div>
</div>
@endsection
