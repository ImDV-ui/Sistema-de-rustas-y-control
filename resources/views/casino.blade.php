@extends('layouts.app')

@section('title', 'Casino Royale - Área de Adultos')

@section('content')
<div class="space-y-8">
    
    <!-- BANNER DE BIENVENIDA VIP CASINO ROYALE -->
    <div class="glass-card rounded-3xl p-6 sm:p-8 relative overflow-hidden border-amber-500/30 shadow-2xl shadow-amber-950/20">
        <!-- Glows dorados de fondo -->
        <div class="absolute -right-20 -top-20 w-72 h-72 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-72 h-72 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-amber-500 via-yellow-400 to-amber-600 flex items-center justify-center text-3xl shadow-lg shadow-amber-500/30 text-black">
                    🎰
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs uppercase tracking-widest text-amber-400 font-bold">Salón Exclusivo para Adultos</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">18+ Obligatorio</span>
                    </div>
                    <h1 class="text-2xl sm:text-4xl font-extrabold text-white font-display">
                        Casino Royale & Sala de Juegos
                    </h1>
                </div>
            </div>

            <div class="flex items-center gap-2 self-start sm:self-auto">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                    Mesa de Apuestas Activa
                </span>
            </div>
        </div>

        <!-- TARJETA DE VERIFICACIÓN DE EDAD POR EL MIDDLEWARE CHECKAGE -->
        <div class="p-4 rounded-2xl bg-amber-500/10 border border-amber-500/25 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-0.5">
                <p class="text-sm font-bold text-amber-300 flex items-center gap-2">
                    <span>🛡️</span> ¡Acceso Autorizado por el Portero de Edad!
                </p>
                <p class="text-xs text-slate-300">
                    Bienvenido, <strong class="text-white">{{ Auth::user()->name }}</strong>. Tu edad registrada (<strong class="text-amber-400">{{ Auth::user()->age }} años</strong>) cumple con el requisito mínimo legal para entrar al casino.
                </p>
            </div>
            <div class="text-[11px] font-mono px-3 py-1.5 rounded-xl bg-black/40 text-amber-300 border border-amber-500/20 shrink-0">
                Filtro: CheckAge (>= 18) OK
            </div>
        </div>
    </div>

    <!-- JACKPOT TICKER & ESTADÍSTICAS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="glass-card rounded-2xl p-4 border-amber-500/20 flex items-center gap-4">
            <div class="text-3xl">💰</div>
            <div>
                <div class="text-[10px] uppercase font-bold text-slate-400">Bote Progresivo Total</div>
                <div class="text-lg font-black text-amber-400 font-mono">1.482.950 €</div>
            </div>
        </div>
        <div class="glass-card rounded-2xl p-4 border-amber-500/20 flex items-center gap-4">
            <div class="text-3xl">🎲</div>
            <div>
                <div class="text-[10px] uppercase font-bold text-slate-400">Salas Habilitadas</div>
                <div class="text-lg font-black text-white font-mono">12 Mesas VIP</div>
            </div>
        </div>
        <div class="glass-card rounded-2xl p-4 border-amber-500/20 flex items-center gap-4">
            <div class="text-3xl">🥂</div>
            <div>
                <div class="text-[10px] uppercase font-bold text-slate-400">Cortesía de Bienvenida</div>
                <div class="text-lg font-black text-emerald-400 font-mono">Cóctel de Entrada</div>
            </div>
        </div>
    </div>

    <!-- MESAS DE JUEGO (REDISEÑADAS CON ESTILO LUXURY) -->
    <div>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-white font-display">Mesas de Alta Apuesta</h2>
            <span class="text-xs text-slate-400">Croupiers en directo</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Mesa 1 -->
            <div class="glass-card rounded-3xl p-6 border-white/5 hover:border-amber-500/40 transition group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                            🃏
                        </div>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-300 border border-emerald-500/20">En Vivo</span>
                    </div>
                    <h3 class="text-base font-bold text-white group-hover:text-amber-300 transition mb-1 font-display">
                        Mesa de Blackjack VIP
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Partidas exclusivas de alta apuesta y crupier en vivo las 24 horas con límites ampliados para socios.
                    </p>
                </div>
                <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Mínimo:</span>
                    <span class="font-mono font-bold text-amber-400">50 €</span>
                </div>
            </div>

            <!-- Mesa 2 -->
            <div class="glass-card rounded-3xl p-6 border-white/5 hover:border-amber-500/40 transition group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                            🎲
                        </div>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-300 border border-emerald-500/20">En Vivo</span>
                    </div>
                    <h3 class="text-base font-bold text-white group-hover:text-amber-300 transition mb-1 font-display">
                        Ruleta Europea Clásica
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        La emoción de girar la ruleta con probabilidades estándar europeas y vista multi-cámara en alta definición.
                    </p>
                </div>
                <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Mínimo:</span>
                    <span class="font-mono font-bold text-amber-400">10 €</span>
                </div>
            </div>

            <!-- Mesa 3 -->
            <div class="glass-card rounded-3xl p-6 border-white/5 hover:border-amber-500/40 transition group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                            💎
                        </div>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-amber-500/10 text-amber-300 border border-amber-500/20">Jackpot</span>
                    </div>
                    <h3 class="text-base font-bold text-white group-hover:text-amber-300 transition mb-1 font-display">
                        Tragaperras Deluxe
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Botes progresivos diarios para los jugadores más afortunados del resort, con tiradas especiales.
                    </p>
                </div>
                <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Mínimo:</span>
                    <span class="font-mono font-bold text-amber-400">1 €</span>
                </div>
            </div>

        </div>
    </div>

    <!-- RETORNO A SUITE -->
    <div class="flex items-center justify-center pt-4">
        <a href="{{ route('panel') }}" class="inline-flex items-center gap-2 py-3 px-6 rounded-2xl text-xs font-bold bg-white/5 hover:bg-white/10 text-slate-200 border border-white/10 transition">
            <span>&larr;</span> Volver a mi Habitación Privada
        </a>
    </div>

</div>
@endsection
