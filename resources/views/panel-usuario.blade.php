@extends('layouts.app')

@section('title', 'Habitación del Huésped')

@section('content')
<div class="space-y-8">
    
    <!-- ENCABEZADO DE LA SUITE -->
    <div class="glass-card rounded-3xl p-6 sm:p-8 relative overflow-hidden border-blue-500/20">
        <div class="absolute -right-16 -top-16 w-56 h-56 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                    🛏️
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs uppercase tracking-widest text-blue-400 font-bold">Suite Privada #404</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/20 text-blue-300 border border-blue-500/30">Portero: CheckAuth</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-display">
                        Habitación Privada del Huésped
                    </h1>
                </div>
            </div>

            <div class="flex items-center gap-2 self-start sm:self-auto">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    Sesión Verificada
                </span>
            </div>
        </div>

        <p class="text-slate-300 text-sm leading-relaxed max-w-3xl">
            ¡Te damos la bienvenida a tu estancia, <strong class="text-white">{{ Auth::user()->name }}</strong>! Has superado con éxito el primer filtro de seguridad (<strong class="text-blue-300 font-semibold">CheckAuth</strong>). Esta estancia digital es privada y solo tú puedes visualizarla mientras tu sesión permanezca activa.
        </p>
    </div>

    <!-- GRID PRINCIPAL DE 2 COLUMNAS (LLAVE DIGITAL + CONSOLA DE TRÁNSITO) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- COLUMNA IZQUIERDA: LLAVE DE HABITACIÓN ESTILO TARJETA VIP -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- TARJETA FÍSICA DIGITAL -->
            <div class="relative p-6 rounded-3xl bg-gradient-to-br from-slate-900 via-indigo-950/80 to-slate-900 border border-white/15 shadow-2xl overflow-hidden group">
                <!-- Efecto de brillo metálico -->
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/5 to-white/0 opacity-0 group-hover:opacity-100 transition duration-700 pointer-events-none"></div>

                <div class="flex justify-between items-start mb-8">
                    <div>
                        <div class="text-[10px] uppercase tracking-widest text-amber-400 font-bold">Grand Oasis Resort</div>
                        <div class="text-xs text-slate-400 font-medium">Digital Keycard</div>
                    </div>
                    <div class="text-2xl">💳</div>
                </div>

                <div class="mb-6 font-mono text-sm tracking-widest text-slate-300">
                    •••• •••• •••• {{ str_pad(Auth::user()->id, 4, '0', STR_PAD_LEFT) }}
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs pt-4 border-t border-white/10">
                    <div>
                        <div class="text-[10px] uppercase text-slate-400">Huésped Titular</div>
                        <div class="font-bold text-white truncate">{{ Auth::user()->name }}</div>
                    </div>
                    <div>
                        <div class="text-[10px] uppercase text-slate-400">Edad Registrada</div>
                        <div class="font-bold {{ Auth::user()->age >= 18 ? 'text-emerald-400' : 'text-amber-400' }}">
                            {{ Auth::user()->age }} años ({{ Auth::user()->age >= 18 ? 'Mayor de edad' : 'Menor de edad' }})
                        </div>
                    </div>
                </div>
            </div>

            <!-- DETALLES DE LA CUENTA -->
            <div class="glass-card rounded-3xl p-6 border-white/5 space-y-3">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 flex items-center gap-2">
                    <span>📋</span> Ficha Técnica del Huésped
                </h3>
                
                <div class="divide-y divide-white/5 text-xs">
                    <div class="py-2.5 flex justify-between">
                        <span class="text-slate-400">Correo Electrónico:</span>
                        <span class="font-semibold text-slate-200">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="py-2.5 flex justify-between">
                        <span class="text-slate-400">Nivel de Credencial:</span>
                        <span class="font-semibold {{ Auth::user()->is_admin ? 'text-rose-400' : 'text-blue-400' }}">
                            {{ Auth::user()->is_admin ? '👑 Director Administrativo' : '👤 Huésped Estándar' }}
                        </span>
                    </div>
                    <div class="py-2.5 flex justify-between">
                        <span class="text-slate-400">Check-in Middleware:</span>
                        <span class="text-emerald-400 font-mono">App\Http\Middleware\CheckAuth</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- COLUMNA DERECHA: CONSOLA DE TRÁNSITO & PRUEBA DE PUERTAS -->
        <div class="lg:col-span-7 space-y-6">
            
            <div class="glass-card rounded-3xl p-6 sm:p-8 border-white/10">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-lg font-bold text-white font-display flex items-center gap-2">
                        <span>🧭</span> Tránsito hacia Otras Zonas del Resort
                    </h2>
                    <span class="text-xs text-slate-500 font-mono">Test de Middlewares</span>
                </div>
                <p class="text-xs text-slate-400 mb-6">
                    Desde tu suite puedes solicitar acceso a las demás áreas. Comprueba cómo actúan los porteros en función de tu perfil:
                </p>

                <div class="space-y-4">
                    
                    <!-- ENLACE AL CASINO CON PREDICCIÓN VISUAL DE PASO -->
                    <a href="{{ route('casino') }}" class="block p-4 rounded-2xl bg-white/[0.02] hover:bg-amber-500/10 border border-amber-500/20 hover:border-amber-500/40 transition group">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-lg group-hover:scale-110 transition">
                                    🎰
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-amber-300 group-hover:text-amber-200">
                                        Casino Royale & Sala VIP
                                    </h4>
                                    <div class="text-[11px] text-slate-400">Protegido por CheckAge (Edad mínima 18)</div>
                                </div>
                            </div>
                            
                            @if(Auth::user()->age >= 18)
                                <span class="text-[11px] font-bold text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-full border border-emerald-500/20 flex items-center gap-1">
                                    <span>🔓</span> Pase Permitido
                                </span>
                            @else
                                <span class="text-[11px] font-bold text-amber-400 bg-amber-500/10 px-2.5 py-1 rounded-full border border-amber-500/20 flex items-center gap-1">
                                    <span>🚫</span> Será Bloqueado ({{ Auth::user()->age }}a)
                                </span>
                            @endif
                        </div>
                        <p class="text-[11px] text-slate-400">
                            @if(Auth::user()->age >= 18)
                                Cumples con la mayoría de edad ({{ Auth::user()->age }} años). El middleware te permitirá cruzar a las mesas de juego.
                            @else
                                Tienes {{ Auth::user()->age }} años. Al hacer clic, el portero <code class="text-amber-300">CheckAge</code> denegará la entrada y te devolverá aquí con un mensaje de alerta.
                            @endif
                        </p>
                    </a>

                    <!-- ENLACE A DIRECCIÓN CON PREDICCIÓN VISUAL DE PASO -->
                    <a href="{{ route('admin') }}" class="block p-4 rounded-2xl bg-white/[0.02] hover:bg-rose-500/10 border border-rose-500/20 hover:border-rose-500/40 transition group">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-lg group-hover:scale-110 transition">
                                    💼
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-rose-300 group-hover:text-rose-200">
                                        Oficina de Dirección
                                    </h4>
                                    <div class="text-[11px] text-slate-400">Protegido por CheckAdmin (Requiere is_admin = true)</div>
                                </div>
                            </div>

                            @if(Auth::user()->is_admin)
                                <span class="text-[11px] font-bold text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-full border border-emerald-500/20 flex items-center gap-1">
                                    <span>👑</span> Acceso Directivo
                                </span>
                            @else
                                <span class="text-[11px] font-bold text-rose-400 bg-rose-500/10 px-2.5 py-1 rounded-full border border-rose-500/20 flex items-center gap-1">
                                    <span>⛔</span> Denegado (403)
                                </span>
                            @endif
                        </div>
                        <p class="text-[11px] text-slate-400">
                            @if(Auth::user()->is_admin)
                                Posees rango de administrador. El middleware <code class="text-rose-300">CheckAdmin</code> te dará acceso completo a la cúpula directiva.
                            @else
                                Tu cuenta es de huésped regular. Al hacer clic, el middleware <code class="text-rose-300">CheckAdmin</code> abortará la petición con código HTTP 403 Forbidden.
                            @endif
                        </p>
                    </a>

                </div>
            </div>

            <!-- AMENIDADES DE LA SUITE (ELEMENTOS NUEVOS PARA ENRIQUECER LA EXPERIENCIA) -->
            <div class="grid grid-cols-3 gap-3">
                <div class="p-3.5 rounded-2xl bg-white/[0.02] border border-white/5 text-center">
                    <div class="text-xl mb-1">🛎️</div>
                    <div class="text-xs font-bold text-slate-200">Room Service</div>
                    <div class="text-[10px] text-slate-500">24 horas disponible</div>
                </div>
                <div class="p-3.5 rounded-2xl bg-white/[0.02] border border-white/5 text-center">
                    <div class="text-xl mb-1">❄️</div>
                    <div class="text-xs font-bold text-slate-200">Climatización</div>
                    <div class="text-[10px] text-emerald-400">Confort 21°C</div>
                </div>
                <div class="p-3.5 rounded-2xl bg-white/[0.02] border border-white/5 text-center">
                    <div class="text-xl mb-1">📶</div>
                    <div class="text-xs font-bold text-slate-200">Wi-Fi 6 Resort</div>
                    <div class="text-[10px] text-blue-400">Fibra Óptica 1Gbps</div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
