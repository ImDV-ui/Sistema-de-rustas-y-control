@extends('layouts.app')

@section('title', 'Bienvenido al Resort')

@section('content')
<div class="space-y-10">

    <!-- HERO SECTION CON LAYOUT SPLIT / DIVIDIDO -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
        
        <!-- Columna Izquierda: Bienvenida & Arquitectura de Acceso -->
        <div class="lg:col-span-7 glass-card p-8 sm:p-10 rounded-3xl relative overflow-hidden flex flex-col justify-between">
            <!-- Glow decorativo de fondo -->
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/20 text-amber-300 text-xs font-semibold mb-6">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                    Sistema Inteligente de Control de Accesos
                </div>

                <h1 class="text-3xl sm:text-5xl font-extrabold text-white font-display tracking-tight leading-tight mb-4">
                    <span class="bg-gradient-to-r from-amber-400 via-yellow-200 to-amber-500 bg-clip-text text-transparent">Bienvenido al Digital Resort Oasis</span>
                </h1>

                <p class="text-slate-300 text-base sm:text-lg leading-relaxed mb-8">
                    Tu estancia de lujo en un entorno tecnológico avanzado. Nuestro complejo opera bajo un sistema de porteros virtuales 
                    (<strong class="text-amber-300 font-semibold">Middlewares de Laravel</strong>) que inspeccionan en tiempo real cada solicitud 
                    para salvaguardar la privacidad, el cumplimiento legal y la alta dirección.
                </p>
            </div>

            <!-- Métricas / Indicadores rápidos -->
            <div class="grid grid-cols-3 gap-3 pt-6 border-t border-white/10">
                <div class="p-3 rounded-2xl bg-white/[0.03] border border-white/5">
                    <div class="text-xl font-extrabold text-amber-400 font-display">3</div>
                    <div class="text-[11px] text-slate-400 font-medium">Porteros Activos</div>
                </div>
                <div class="p-3 rounded-2xl bg-white/[0.03] border border-white/5">
                    <div class="text-xl font-extrabold text-blue-400 font-display">100%</div>
                    <div class="text-[11px] text-slate-400 font-medium">Protegido</div>
                </div>
                <div class="p-3 rounded-2xl bg-white/[0.03] border border-white/5">
                    <div class="text-xl font-extrabold text-rose-400 font-display">0ms</div>
                    <div class="text-[11px] text-slate-400 font-medium">Latencia Filtro</div>
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Tarjeta Interactiva de Credencial en Vivo -->
        <div class="lg:col-span-5 glass-card p-6 sm:p-8 rounded-3xl flex flex-col justify-between border-amber-500/20 relative">
            <div class="flex items-center justify-between mb-4 pb-4 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-lg text-black font-black shadow-md">
                        🪪
                    </div>
                    <div>
                        <div class="text-xs uppercase tracking-wider text-amber-400 font-bold">Estado de tu Llave</div>
                        <div class="text-sm font-bold text-white">
                            @auth {{ Auth::user()->name }} @else Huésped Anónimo @endauth
                        </div>
                    </div>
                </div>
                <span class="text-[11px] font-mono px-2 py-0.5 rounded-full {{ Auth::check() ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' : 'bg-slate-800 text-slate-400' }}">
                    {{ Auth::check() ? 'Autenticado' : 'Invitado' }}
                </span>
            </div>

            <!-- Semáforo de paso a las 3 zonas según sesión actual -->
            <div class="space-y-3 my-4">
                <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Permisos según tus credenciales actuales:</div>

                <!-- Habitación status -->
                <div class="p-3 rounded-xl bg-white/[0.03] border border-white/5 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <span class="text-base">🛏️</span>
                        <div>
                            <div class="text-xs font-bold text-slate-200">Habitación Privada</div>
                            <div class="text-[10px] text-slate-400">Portero: CheckAuth</div>
                        </div>
                    </div>
                    @auth
                        <span class="text-[11px] font-semibold text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded-md border border-emerald-500/20">
                            ✓ Acceso Libre
                        </span>
                    @else
                        <span class="text-[11px] font-semibold text-rose-400 bg-rose-500/10 px-2 py-0.5 rounded-md border border-rose-500/20">
                            ✕ Bloqueado
                        </span>
                    @endauth
                </div>

                <!-- Casino status -->
                <div class="p-3 rounded-xl bg-white/[0.03] border border-white/5 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <span class="text-base">🎰</span>
                        <div>
                            <div class="text-xs font-bold text-slate-200">Casino Royale</div>
                            <div class="text-[10px] text-slate-400">Porteros: CheckAuth + CheckAge</div>
                        </div>
                    </div>
                    @auth
                        @if(Auth::user()->age >= 18)
                            <span class="text-[11px] font-semibold text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded-md border border-emerald-500/20">
                                ✓ Mayor de Edad ({{ Auth::user()->age }}a)
                            </span>
                        @else
                            <span class="text-[11px] font-semibold text-amber-400 bg-amber-500/10 px-2 py-0.5 rounded-md border border-amber-500/20">
                                ✕ Bloqueado ({{ Auth::user()->age }}a &lt; 18)
                            </span>
                        @endif
                    @else
                        <span class="text-[11px] font-semibold text-rose-400 bg-rose-500/10 px-2 py-0.5 rounded-md border border-rose-500/20">
                            ✕ Requiere Sesión
                        </span>
                    @endauth
                </div>

                <!-- Dirección status -->
                <div class="p-3 rounded-xl bg-white/[0.03] border border-white/5 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <span class="text-base">💼</span>
                        <div>
                            <div class="text-xs font-bold text-slate-200">Oficina de Dirección</div>
                            <div class="text-[10px] text-slate-400">Porteros: CheckAuth + CheckAdmin</div>
                        </div>
                    </div>
                    @auth
                        @if(Auth::user()->is_admin)
                            <span class="text-[11px] font-semibold text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded-md border border-emerald-500/20">
                                ✓ Director Autorizado
                            </span>
                        @else
                            <span class="text-[11px] font-semibold text-rose-400 bg-rose-500/10 px-2 py-0.5 rounded-md border border-rose-500/20">
                                ✕ No es Admin (403)
                            </span>
                        @endif
                    @else
                        <span class="text-[11px] font-semibold text-rose-400 bg-rose-500/10 px-2 py-0.5 rounded-md border border-rose-500/20">
                            ✕ Solo Directiva
                        </span>
                    @endauth
                </div>
            </div>

            <!-- Botón de acción rápido -->
            @auth
                <a href="{{ route('panel') }}" class="w-full py-2.5 rounded-xl text-center text-xs font-bold bg-white/10 hover:bg-white/15 text-white transition border border-white/10">
                    Ir a Mi Habitación &rarr;
                </a>
            @else
                <a href="{{ route('login') }}" class="w-full py-2.5 rounded-xl text-center text-xs font-bold bg-amber-400 hover:bg-amber-300 text-black transition shadow-lg shadow-amber-400/20">
                    Iniciar Sesión con Llave de Huésped &rarr;
                </a>
            @endauth
        </div>
    </div>

    <!-- SECCIÓN DE INSTALACIONES (TARJETAS TOTALMENTE REDISEÑADAS) -->
    <div>
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-white font-display">Instalaciones del Resort</h2>
                <p class="text-slate-400 text-xs sm:text-sm">Pon a prueba el sistema haciendo clic para cruzar cada umbral:</p>
            </div>
            <span class="text-xs font-mono text-slate-500">Selecciona una puerta</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- TARJETA 1: HABITACIÓN PRIVADA -->
            <div class="glass-card rounded-3xl p-6 flex flex-col justify-between hover:border-blue-500/40 transition group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl group-hover:bg-blue-500/10 transition"></div>
                
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-2xl group-hover:scale-110 transition transform">
                            🛏️
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-blue-500/10 text-blue-300 border border-blue-500/20">
                            CheckAuth
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-white group-hover:text-blue-300 transition mb-2 font-display">
                        Habitación Privada
                    </h3>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed mb-6">
                        Área de descanso y privacidad exclusiva para huéspedes registrados. Si intentas entrar como invitado serás redirigido a la recepción de acceso.
                    </p>

                    <div class="p-3 rounded-xl bg-white/[0.02] border border-white/5 text-[11px] text-slate-400 space-y-1 mb-6">
                        <div class="flex justify-between">
                            <span>Filtro de Seguridad:</span>
                            <strong class="text-slate-300">Sesión iniciada</strong>
                        </div>
                        <div class="flex justify-between">
                            <span>Respuesta si falla:</span>
                            <span class="text-amber-400 font-mono">Redirect &rarr; /login</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('panel') }}" class="w-full py-3 px-4 rounded-xl text-center text-xs font-bold bg-blue-600 hover:bg-blue-500 text-white transition shadow-lg shadow-blue-600/20 group-hover:shadow-blue-500/30">
                    Entrar a la Habitación &rarr;
                </a>
            </div>

            <!-- TARJETA 2: CASINO ROYALE (18+) -->
            <div class="glass-card rounded-3xl p-6 flex flex-col justify-between hover:border-amber-500/40 transition group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 rounded-full blur-2xl group-hover:bg-amber-500/10 transition"></div>

                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-2xl group-hover:scale-110 transition transform">
                            🎰
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-amber-500/10 text-amber-300 border border-amber-500/20">
                            CheckAuth + CheckAge
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-white group-hover:text-amber-300 transition mb-2 font-display">
                        Casino Royale (18+)
                    </h3>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed mb-6">
                        Club de apuestas, ruleta y espectáculos nocturnos. El portero verificará tu documento de identidad para asegurar la mayoría de edad (18+).
                    </p>

                    <div class="p-3 rounded-xl bg-white/[0.02] border border-white/5 text-[11px] text-slate-400 space-y-1 mb-6">
                        <div class="flex justify-between">
                            <span>Filtro de Seguridad:</span>
                            <strong class="text-slate-300">Auth + Edad &ge; 18</strong>
                        </div>
                        <div class="flex justify-between">
                            <span>Respuesta si menor:</span>
                            <span class="text-amber-400 font-mono">Redirect + Error</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('casino') }}" class="w-full py-3 px-4 rounded-xl text-center text-xs font-bold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-black transition shadow-lg shadow-amber-500/20 group-hover:shadow-amber-500/30">
                    Entrar al Casino &rarr;
                </a>
            </div>

            <!-- TARJETA 3: OFICINA DE DIRECCIÓN -->
            <div class="glass-card rounded-3xl p-6 flex flex-col justify-between hover:border-rose-500/40 transition group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-rose-500/5 rounded-full blur-2xl group-hover:bg-rose-500/10 transition"></div>

                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-2xl group-hover:scale-110 transition transform">
                            💼
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-rose-500/10 text-rose-300 border border-rose-500/20">
                            CheckAuth + CheckAdmin
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-white group-hover:text-rose-300 transition mb-2 font-display">
                        Oficina de Dirección
                    </h3>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed mb-6">
                        Cúpula directiva donde se gestionan las políticas y finanzas del resort. El portero expulsará con código 403 Forbidden a cualquiera sin rol directivo.
                    </p>

                    <div class="p-3 rounded-xl bg-white/[0.02] border border-white/5 text-[11px] text-slate-400 space-y-1 mb-6">
                        <div class="flex justify-between">
                            <span>Filtro de Seguridad:</span>
                            <strong class="text-slate-300">is_admin = true</strong>
                        </div>
                        <div class="flex justify-between">
                            <span>Respuesta si cliente:</span>
                            <span class="text-rose-400 font-mono">Abort(403 Forbidden)</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin') }}" class="w-full py-3 px-4 rounded-xl text-center text-xs font-bold bg-rose-600 hover:bg-rose-500 text-white transition shadow-lg shadow-rose-600/20 group-hover:shadow-rose-500/30">
                    Acceso a Dirección &rarr;
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
