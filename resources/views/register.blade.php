@extends('layouts.app')

@section('title', 'Registro de Cuenta')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 shadow-xl">
        <h1 class="text-2xl font-bold text-white mb-2">Registro de Huésped</h1>
        <p class="text-slate-400 text-sm mb-6">
            Crea tu cuenta de huésped para comenzar tu estancia en el Digital Resort Oasis.
        </p>

        @if ($errors->any())
            <div class="mb-4 p-3 rounded-lg bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1">
                    Nombre Completo
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="Juan Pérez">
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1">
                    Correo Electrónico
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="juan@ejemplo.com">
            </div>

            <div>
                <label for="age" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1">
                    Edad
                </label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" min="1" max="120" required
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="25">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1">
                    Contraseña
                </label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="••••••••">
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1">
                    Confirmar Contraseña
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"
                    placeholder="••••••••">
            </div>

            <button type="submit" class="w-full py-3 px-4 rounded-xl font-bold bg-emerald-600 hover:bg-emerald-500 text-white transition shadow-lg shadow-emerald-900/30">
                Registrar Cuenta
            </button>
        </form>

        <div class="mt-6 pt-6 border-t border-slate-700 text-center text-xs text-slate-400">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-emerald-400 font-semibold hover:underline">Inicia sesión</a>
        </div>
    </div>
</div>
@endsection

