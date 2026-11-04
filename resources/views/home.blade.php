@extends('layouts.app')

@section('title', 'Bienvenido al Resort')

@section('content')
<div class="space-y-8">
    <div class="bg-gradient-to-r from-emerald-900/60 to-slate-800 p-8 rounded-2xl border border-emerald-500/30">
        <h1 class="text-3xl font-extrabold text-emerald-300 mb-3">
            Bienvenido al Digital Resort Oasis
        </h1>
        <p class="text-slate-300 text-lg max-w-3xl leading-relaxed">
            Tu destino de lujo y entretenimiento digital. Nuestro sistema de porteros virtuales (middlewares) protege cada área del complejo para garantizar una estancia segura y adaptada a cada huésped.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Tarjeta 1: Habitación Privada -->
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 flex flex-col justify-between hover:border-blue-500/50 transition">
            <div>
                <div class="text-3xl mb-3">🛏️</div>
                <h2 class="text-xl font-bold text-blue-400 mb-2">Habitación Privada</h2>
                <p class="text-slate-300 text-sm mb-4">
                    Área reservada exclusivamente para huéspedes registrados. Requiere autenticación.
                </p>
                <div class="text-xs bg-blue-500/10 text-blue-300 border border-blue-500/20 px-2.5 py-1 rounded inline-block">
                    Portero: CheckAuth
                </div>
            </div>
            <a href="{{ route('panel') }}" class="mt-6 block text-center py-2.5 px-4 rounded-xl font-semibold bg-blue-600 hover:bg-blue-500 text-white transition">
                Entrar a la Habitación
            </a>
        </div>

        <!-- Tarjeta 2: Casino Exclusivo -->
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 flex flex-col justify-between hover:border-amber-500/50 transition">
            <div>
                <div class="text-3xl mb-3">🎰</div>
                <h2 class="text-xl font-bold text-amber-400 mb-2">Casino Royale (18+)</h2>
                <p class="text-slate-300 text-sm mb-4">
                    Zona de apuestas y entretenimiento nocturno. Solo para huéspedes mayores de edad.
                </p>
                <div class="text-xs bg-amber-500/10 text-amber-300 border border-amber-500/20 px-2.5 py-1 rounded inline-block">
                    Porteros: CheckAuth + CheckAge
                </div>
            </div>
            <a href="{{ route('casino') }}" class="mt-6 block text-center py-2.5 px-4 rounded-xl font-semibold bg-amber-600 hover:bg-amber-500 text-white transition">
                Entrar al Casino
            </a>
        </div>

        <!-- Tarjeta 3: Dirección General -->
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 flex flex-col justify-between hover:border-rose-500/50 transition">
            <div>
                <div class="text-3xl mb-3">💼</div>
                <h2 class="text-xl font-bold text-rose-400 mb-2">Oficina de Dirección</h2>
                <p class="text-slate-300 text-sm mb-4">
                    Centro de mando y administración del complejo. Acceso restringido al personal directivo.
                </p>
                <div class="text-xs bg-rose-500/10 text-rose-300 border border-rose-500/20 px-2.5 py-1 rounded inline-block">
                    Porteros: CheckAuth + CheckAdmin
                </div>
            </div>
            <a href="{{ route('admin') }}" class="mt-6 block text-center py-2.5 px-4 rounded-xl font-semibold bg-rose-600 hover:bg-rose-500 text-white transition">
                Acceso a Dirección
            </a>
        </div>
    </div>
</div>
@endsection
