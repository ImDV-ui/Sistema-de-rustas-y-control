@extends('layouts.app')

@section('title', 'Inicio de Sesión')

@section('content')
<div class="max-w-4xl mx-auto py-4">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
        
        <!-- FORMULARIO DE ACCESO -->
        <div class="lg:col-span-7 glass-card p-8 sm:p-10 rounded-3xl relative overflow-hidden border-amber-500/20">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-2xl text-amber-400">
                    🔑
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-amber-400">Terminal de Acceso</span>
                    <h1 class="text-2xl font-extrabold text-white font-display">
                        Iniciar Sesión en el Resort
                    </h1>
                </div>
            </div>

            <p class="text-slate-400 text-xs sm:text-sm mb-6 leading-relaxed">
                Introduce las credenciales de tu tarjeta digital para ingresar a tus instalaciones y validar los permisos de tu perfil.
            </p>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <div class="flex items-center gap-2">
                            <span>🚫</span>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                        Correo Electrónico
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-2xl bg-white/[0.04] border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm transition"
                        placeholder="tu-correo@resort.com">
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                        Contraseña
                    </label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 rounded-2xl bg-white/[0.04] border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm transition"
                        placeholder="••••••••">
                </div>

                <button type="submit" class="w-full py-3.5 px-4 rounded-2xl font-bold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-black text-sm transition shadow-xl shadow-amber-500/20 active:scale-[0.99] transform">
                    Validar Llave y Entrar &rarr;
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-white/10 text-center text-xs text-slate-400">
                ¿Aún no tienes suite registrada? <a href="{{ route('register') }}" class="text-amber-400 font-bold hover:underline">Regístrate como nuevo huésped</a>
            </div>
        </div>

        <!-- PANEL LATERAL DE USUARIOS DEMO PARA PRUEBAS -->
        <div class="lg:col-span-5 glass-card p-6 sm:p-8 rounded-3xl border-white/10 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4 pb-4 border-b border-white/10">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-300 flex items-center gap-2">
                        <span>🧪</span> Perfiles de Prueba Rápida
                    </span>
                    <span class="text-[10px] font-mono text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded-full border border-emerald-500/20">Seeded</span>
                </div>
                <p class="text-xs text-slate-400 mb-4 leading-relaxed">
                    Haz clic en cualquiera de estos perfiles para iniciar sesión instantáneamente sin rellenar el formulario:
                </p>

                <div class="space-y-3">
                    <a href="{{ route('quick.login', 'admin') }}" class="block p-3.5 rounded-2xl bg-rose-500/10 hover:bg-rose-500/20 border border-rose-500/25 transition group">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-xs font-bold text-rose-300 group-hover:text-rose-200">👑 Directora Ana (Admin)</span>
                            <span class="text-[10px] font-mono text-rose-400">35 años</span>
                        </div>
                        <div class="text-[11px] text-slate-400 font-mono">admin@resort.com</div>
                        <div class="text-[10px] text-rose-300/80 mt-1">Acceso total: Habitación, Casino y Dirección</div>
                    </a>

                    <a href="{{ route('quick.login', 'adult') }}" class="block p-3.5 rounded-2xl bg-emerald-500/10 hover:bg-emerald-500/20 border border-emerald-500/25 transition group">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-xs font-bold text-emerald-300 group-hover:text-emerald-200">🍸 Carlos López (Adulto)</span>
                            <span class="text-[10px] font-mono text-emerald-400">25 años</span>
                        </div>
                        <div class="text-[11px] text-slate-400 font-mono">adulto@resort.com</div>
                        <div class="text-[10px] text-emerald-300/80 mt-1">Acceso a Habitación y Casino (Bloqueado en Admin)</div>
                    </a>

                    <a href="{{ route('quick.login', 'minor') }}" class="block p-3.5 rounded-2xl bg-amber-500/10 hover:bg-amber-500/20 border border-amber-500/25 transition group">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-xs font-bold text-amber-300 group-hover:text-amber-200">🥤 Mateo García (Menor)</span>
                            <span class="text-[10px] font-mono text-amber-400">16 años</span>
                        </div>
                        <div class="text-[11px] text-slate-400 font-mono">menor@resort.com</div>
                        <div class="text-[10px] text-amber-300/80 mt-1">Acceso solo a Habitación (Bloqueado por CheckAge)</div>
                    </a>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-white/5 text-[11px] text-slate-500 text-center font-mono">
                Contraseña común para manual: password
            </div>
        </div>

    </div>
</div>
@endsection
