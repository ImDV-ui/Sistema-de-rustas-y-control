@extends('layouts.app')

@section('title', 'Oficina de Dirección - Administración')

@section('content')
<div class="space-y-8">
    
    <!-- ENCABEZADO DE MÁXIMA SEGURIDAD / DIRECCIÓN -->
    <div class="glass-card rounded-3xl p-6 sm:p-8 relative overflow-hidden border-rose-500/30 shadow-2xl shadow-rose-950/20">
        <!-- Glows rojizos de fondo -->
        <div class="absolute -right-20 -top-20 w-72 h-72 bg-rose-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-rose-600 to-rose-400 flex items-center justify-center text-3xl shadow-lg shadow-rose-500/30 text-white">
                    💼
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs uppercase tracking-widest text-rose-400 font-bold">Nivel 5 • Directorio General</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-500/20 text-rose-300 border border-rose-500/30">Admin Clearance</span>
                    </div>
                    <h1 class="text-2xl sm:text-4xl font-extrabold text-white font-display">
                        Oficina de Dirección y Control
                    </h1>
                </div>
            </div>

            <div class="flex items-center gap-2 self-start sm:self-auto">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-rose-400 animate-pulse"></span>
                    Terminal de Mando Central
                </span>
            </div>
        </div>

        <!-- TARJETA DE VERIFICACIÓN DE CREDENCIALES DE ADMINISTRADOR (CHECKADMIN) -->
        <div class="p-4 rounded-2xl bg-rose-500/10 border border-rose-500/25 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-0.5">
                <p class="text-sm font-bold text-rose-300 flex items-center gap-2">
                    <span>🛡️</span> ¡Acceso de Alta Seguridad Autorizado!
                </p>
                <p class="text-xs text-slate-300">
                    Bienvenido, Director(a) <strong class="text-white">{{ Auth::user()->name }}</strong>. Posees credenciales de administrador (<strong class="text-rose-400 font-mono">is_admin = true</strong>) para supervisar todas las operaciones del complejo.
                </p>
            </div>
            <div class="text-[11px] font-mono px-3 py-1.5 rounded-xl bg-black/40 text-rose-300 border border-rose-500/20 shrink-0">
                Filtro: CheckAdmin (is_admin == true) OK
            </div>
        </div>
    </div>

    <!-- PANELES DE SUPERVISIÓN Y CONTROL (MÓDULOS DE DIRECCIÓN) -->
    <div>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-white font-display">Módulos de Gestión Directiva</h2>
            <span class="text-xs text-slate-400 font-mono">Supervisión en vivo</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="glass-card rounded-3xl p-6 border-white/5 hover:border-rose-500/40 transition group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition">
                        📊
                    </div>
                    <h3 class="text-base font-bold text-white group-hover:text-rose-300 transition mb-1 font-display">
                        Métricas de Ocupación
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Control de capacidad de habitaciones, accesos al casino y aforo de zonas comunes del resort.
                    </p>
                </div>
                <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Capacidad Total:</span>
                    <span class="font-mono font-bold text-rose-400">87% Ocupado</span>
                </div>
            </div>

            <div class="glass-card rounded-3xl p-6 border-white/5 hover:border-rose-500/40 transition group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition">
                        🛡️
                    </div>
                    <h3 class="text-base font-bold text-white group-hover:text-rose-300 transition mb-1 font-display">
                        Registro de Porteros
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Historial de accesos bloqueados por minoría de edad o falta de privilegios de administrador.
                    </p>
                </div>
                <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Bloqueos Hoy:</span>
                    <span class="font-mono font-bold text-amber-400">14 Intercepciones</span>
                </div>
            </div>

            <div class="glass-card rounded-3xl p-6 border-white/5 hover:border-rose-500/40 transition group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition">
                        ⚙️
                    </div>
                    <h3 class="text-base font-bold text-white group-hover:text-rose-300 transition mb-1 font-display">
                        Ajustes de Infraestructura
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Gestión de políticas de acceso, roles y configuración de los middlewares del framework.
                    </p>
                </div>
                <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Estado Núcleo:</span>
                    <span class="font-mono font-bold text-emerald-400">Activo (v12)</span>
                </div>
            </div>

        </div>
    </div>

    <!-- AUDITORÍA DE EVENTOS DE PORTERÍA (ELEMENTO VISUAL NUEVO) -->
    <div class="glass-card rounded-3xl p-6 border-white/10 space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-bold text-white uppercase tracking-wider flex items-center gap-2">
                <span>⚡</span> Registro de Eventos en Tiempo Real (Log de Middlewares)
            </h3>
            <span class="text-[10px] font-mono text-slate-400">Live Traffic</span>
        </div>

        <div class="space-y-2 text-xs font-mono">
            <div class="p-2.5 rounded-xl bg-white/[0.02] border border-white/5 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-emerald-400">✓ PASS</span>
                    <span class="text-slate-300">CheckAdmin: Acceso autorizado a Dirección</span>
                </div>
                <span class="text-slate-500">Ahora mismo</span>
            </div>
            <div class="p-2.5 rounded-xl bg-white/[0.02] border border-white/5 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-amber-400">⚠️ INTERCEPT</span>
                    <span class="text-slate-300">CheckAge: Intento de menor en Casino Royale bloqueado</span>
                </div>
                <span class="text-slate-500">Hace 3 min</span>
            </div>
            <div class="p-2.5 rounded-xl bg-white/[0.02] border border-white/5 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-rose-400">⛔ 403 FORBIDDEN</span>
                    <span class="text-slate-300">CheckAdmin: Huésped sin rango intentó forzar /admin</span>
                </div>
                <span class="text-slate-500">Hace 12 min</span>
            </div>
        </div>
    </div>

    <!-- RETORNO A SUITE -->
    <div class="flex items-center justify-center pt-2">
        <a href="{{ route('panel') }}" class="inline-flex items-center gap-2 py-3 px-6 rounded-2xl text-xs font-bold bg-white/5 hover:bg-white/10 text-slate-200 border border-white/10 transition">
            <span>&larr;</span> Volver a mi Habitación
        </a>
    </div>

</div>
@endsection
