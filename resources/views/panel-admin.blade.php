@extends('layouts.app')

@section('title', 'Oficina de Dirección - Administración')

@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-rose-950/60 via-slate-900 to-rose-950/40 p-8 rounded-2xl border border-rose-500/40">
        <div class="flex items-center gap-4 mb-4">
            <span class="text-4xl">💼</span>
            <div>
                <h1 class="text-3xl font-extrabold text-rose-300">
                    Oficina de Dirección y Control
                </h1>
                <p class="text-slate-400 text-sm">
                    Área de máxima seguridad reservada exclusivamente para directores del resort. Protegida por <strong>CheckAuth</strong> y <strong>CheckAdmin</strong>.
                </p>
            </div>
        </div>

        <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-200">
            <p class="text-base font-semibold">
                ¡Acceso de Alta Seguridad Autorizado!
            </p>
            <p class="text-sm text-slate-300 mt-1">
                Bienvenido, Director(a) <strong>{{ Auth::user()->name }}</strong>. Posees credenciales de administrador (<strong>is_admin = true</strong>) para supervisar todas las operaciones del complejo.
            </p>
        </div>
    </div>

    <!-- Módulos de Dirección -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-rose-500/40 transition">
            <div class="text-3xl mb-2">📊</div>
            <h3 class="text-lg font-bold text-white mb-1">Métricas de Ocupación</h3>
            <p class="text-xs text-slate-400">
                Control de capacidad de habitaciones, accesos al casino y aforo de zonas comunes.
            </p>
        </div>

        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-rose-500/40 transition">
            <div class="text-3xl mb-2">🛡️</div>
            <h3 class="text-lg font-bold text-white mb-1">Registro de Porteros</h3>
            <p class="text-xs text-slate-400">
                Historial de accesos bloqueados por minoría de edad o falta de privilegios.
            </p>
        </div>

        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-rose-500/40 transition">
            <div class="text-3xl mb-2">⚙️</div>
            <h3 class="text-lg font-bold text-white mb-1">Ajustes de Infraestructura</h3>
            <p class="text-xs text-slate-400">
                Gestión de políticas de acceso, roles y configuración de los middlewares.
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

