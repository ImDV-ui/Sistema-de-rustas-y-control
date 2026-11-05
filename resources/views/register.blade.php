@extends('layouts.app')

@section('title', 'Registro de Cuenta')

@section('content')
<div class="max-w-4xl mx-auto py-4">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
        
        <!-- FORMULARIO DE REGISTRO -->
        <div class="lg:col-span-7 glass-card p-8 sm:p-10 rounded-3xl relative overflow-hidden border-amber-500/20">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-2xl text-amber-400">
                    ✍️
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-amber-400">Emisión de Llave</span>
                    <h1 class="text-2xl font-extrabold text-white font-display">
                        Registro de Huésped
                    </h1>
                </div>
            </div>

            <p class="text-slate-400 text-xs sm:text-sm mb-6 leading-relaxed">
                Crea tu perfil de huésped. La edad que registres determinará los permisos de acceso que los porteros de seguridad te otorgarán.
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

            <form action="{{ url('/register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                        Nombre Completo
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 rounded-2xl bg-white/[0.04] border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm transition"
                        placeholder="Ej. Sofía Martínez">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                            Correo Electrónico
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 rounded-2xl bg-white/[0.04] border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm transition"
                            placeholder="sofia@ejemplo.com">
                    </div>

                    <div>
                        <label for="age" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5 flex items-center justify-between">
                            <span>Edad</span>
                            <span class="text-[10px] text-amber-400 font-normal">CheckAge evalúa esto</span>
                        </label>
                        <input type="number" id="age" name="age" value="{{ old('age') }}" min="1" max="120" required
                            class="w-full px-4 py-3 rounded-2xl bg-white/[0.04] border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm transition"
                            placeholder="Ej. 24">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                            Contraseña
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 rounded-2xl bg-white/[0.04] border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm transition"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                            Confirmar Contraseña
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-3 rounded-2xl bg-white/[0.04] border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm transition"
                            placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 rounded-2xl font-bold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-black text-sm transition shadow-xl shadow-amber-500/20 active:scale-[0.99] transform">
                    Emitir Llave y Crear Cuenta &rarr;
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-white/10 text-center text-xs text-slate-400">
                ¿Ya eres huésped registrado? <a href="{{ route('login') }}" class="text-amber-400 font-bold hover:underline">Inicia sesión aquí</a>
            </div>
        </div>

        <!-- EXPLICACIÓN DE POLÍTICA DE ACCESOS -->
        <div class="lg:col-span-5 glass-card p-6 sm:p-8 rounded-3xl border-white/10 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-amber-400 mb-4 pb-4 border-b border-white/10">
                    <span>💡</span> Guía de Registro de Edad
                </div>

                <div class="space-y-4 text-xs text-slate-400 leading-relaxed">
                    <p>
                        En esta aplicación de prueba, el campo <strong class="text-white">Edad</strong> es fundamental:
                    </p>

                    <div class="p-3.5 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 space-y-1">
                        <div class="font-bold">Si indicas 18 años o más:</div>
                        <p class="text-[11px] text-emerald-200/80">
                            El middleware <code class="text-emerald-300">CheckAge</code> te permitirá cruzar al <strong>Casino Royale</strong> sin restricciones.
                        </p>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-amber-500/10 border border-amber-500/20 text-amber-300 space-y-1">
                        <div class="font-bold">Si indicas menos de 18 años:</div>
                        <p class="text-[11px] text-amber-200/80">
                            El middleware <code class="text-amber-300">CheckAge</code> interceptará tu intento de entrar al casino y te retornará a la suite con una advertencia legal.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-6 p-4 rounded-2xl bg-white/[0.02] border border-white/5 text-[11px] text-slate-400 text-center">
                Todos los nuevos usuarios se registran como <strong class="text-slate-300">Huésped Estándar</strong> (is_admin = false).
            </div>
        </div>

    </div>
</div>
@endsection
