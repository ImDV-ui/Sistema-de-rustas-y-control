@extends('layouts.app')

@section('title', 'Habitación del Cliente')

@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-blue-900/40 via-slate-800 to-slate-800 p-8 rounded-2xl border border-blue-500/30">
        <div class="flex items-center gap-4 mb-4">
            <span class="text-4xl">🛏️</span>
            <div>
                <h1 class="text-3xl font-extrabold text-blue-300">
                    Habitación Privada del Huésped
                </h1>
                <p class="text-slate-400 text-sm">
                    Zona privada y segura. Acceso protegido mediante el middleware <strong>CheckAuth</strong>.
                </p>
            </div>
        </div>

        <div class="mt-4 p-4 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-200">
            <p class="text-lg">
                ¡Bienvenido a tu habitación, <strong>{{ Auth::user()->name }}</strong>!
            </p>
            <p class="text-sm text-slate-300 mt-1">
                Esperamos que estés disfrutando de tu estancia en nuestro resort. Aquí tienes el control de tus servicios y comodidades.
            </p>
        </div>
    </div>

    <!-- Ficha del Huésped -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700">
            <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span>📋</span> Datos de tu Llave de Habitación
            </h2>
            <dl class="space-y-3 text-sm">
                <div class="flex justify-between py-1 border-b border-slate-700">
                    <dt class="text-slate-400">Nombre del Huésped:</dt>
                    <dd class="font-semibold text-slate-200">{{ Auth::user()->name }}</dd>
                </div>
                <div class="flex justify-between py-1 border-b border-slate-700">
                    <dt class="text-slate-400">Correo Electrónico:</dt>
                    <dd class="font-semibold text-slate-200">{{ Auth::user()->email }}</dd>
                </div>
                <div class="flex justify-between py-1 border-b border-slate-700">
                    <dt class="text-slate-400">Edad Registrada:</dt>
                    <dd class="font-semibold {{ Auth::user()->age >= 18 ? 'text-emerald-400' : 'text-amber-400' }}">
                        {{ Auth::user()->age }} años ({{ Auth::user()->age >= 18 ? 'Mayor de edad' : 'Menor de edad' }})
                    </dd>
                </div>
                <div class="flex justify-between py-1">
                    <dt class="text-slate-400">Tipo de Acceso:</dt>
                    <dd class="font-semibold {{ Auth::user()->is_admin ? 'text-rose-400' : 'text-blue-400' }}">
                        {{ Auth::user()->is_admin ? 'Directivo / Administrador' : 'Huésped Estándar' }}
                    </dd>
                </div>
            </dl>
        </div>

        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 flex flex-col justify-between">
            <div>
                <h2 class="text-lg font-bold text-white mb-2 flex items-center gap-2">
                    <span>🧭</span> Explorar otras Zonas del Resort
                </h2>
                <p class="text-sm text-slate-400 mb-4">
                    Comprueba en tiempo real la acción de los middlewares de control de acceso:
                </p>
                <div class="space-y-2">
                    <a href="{{ route('casino') }}" class="block p-3 rounded-xl bg-slate-700/60 hover:bg-amber-600/20 border border-amber-500/30 transition text-sm">
                        <span class="font-bold text-amber-300">🎰 Ir al Casino (18+)</span>
                        <p class="text-xs text-slate-400 mt-0.5">Protegido por CheckAge. Si eres menor de edad serás devuelto aquí.</p>
                    </a>
                    <a href="{{ route('admin') }}" class="block p-3 rounded-xl bg-slate-700/60 hover:bg-rose-600/20 border border-rose-500/30 transition text-sm">
                        <span class="font-bold text-rose-300">💼 Ir a Dirección General</span>
                        <p class="text-xs text-slate-400 mt-0.5">Protegido por CheckAdmin. Solo usuarios con is_admin=true.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

