@extends('layouts.app')

@section('title', 'Casino Royale - Área de Adultos')

@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-amber-950/60 via-slate-900 to-amber-950/40 p-8 rounded-2xl border border-amber-500/40">
        <div class="flex items-center gap-4 mb-4">
            <span class="text-4xl">🎰</span>
            <div>
                <h1 class="text-3xl font-extrabold text-amber-300">
                    Casino Royale & Sala de Juegos
                </h1>
                <p class="text-slate-400 text-sm">
                    Zona reservada estrictamente para adultos (18+). Protegida por <strong>CheckAuth</strong> y <strong>CheckAge</strong>.
                </p>
            </div>
        </div>

        <div class="p-4 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-200">
            <p class="text-base font-semibold">
                ¡Acceso Autorizado por el Portero de Edad!
            </p>
            <p class="text-sm text-slate-300 mt-1">
                Bienvenido, <strong>{{ Auth::user()->name }}</strong>. Tu edad registrada (<strong>{{ Auth::user()->age }} años</strong>) cumple con el requisito mínimo legal para entrar al casino.
            </p>
        </div>
    </div>

    <!-- Mesas y Juegos Ficticios -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-amber-500/40 transition">
            <div class="text-3xl mb-2">🃏</div>
            <h3 class="text-lg font-bold text-white mb-1">Mesa de Blackjack VIP</h3>
            <p class="text-xs text-slate-400">
                Partidas exclusivas de alta apuesta y crupier en vivo las 24 horas.
            </p>
        </div>

        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-amber-500/40 transition">
            <div class="text-3xl mb-2">🎲</div>
            <h3 class="text-lg font-bold text-white mb-1">Ruleta Europea Clásica</h3>
            <p class="text-xs text-slate-400">
                La emoción de girar la ruleta con probabilidades estándar europeas.
            </p>
        </div>

        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-amber-500/40 transition">
            <div class="text-3xl mb-2">💎</div>
            <h3 class="text-lg font-bold text-white mb-1">Tragaperras Deluxe</h3>
            <p class="text-xs text-slate-400">
                Botes progresivos diarios para los jugadores más afortunados del resort.
            </p>
        </div>
    </div>

    <div class="text-center pt-4">
        <a href="{{ route('panel') }}" class="inline-block py-2.5 px-6 rounded-xl font-semibold bg-slate-700 hover:bg-slate-600 text-slate-200 transition">
            &larr; Volver a mi Habitación
        </a>
    </div>
</div>
@endsection

