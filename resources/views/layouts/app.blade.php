<!DOCTYPE html>
<html lang="es" class="h-full bg-[#0a0d14]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Digital Resort') - Grand Oasis & Casino</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#fbf8ea',
                            100: '#f5efc7',
                            200: '#ebdca8',
                            300: '#dfc266',
                            400: '#d4aa33',
                            500: '#c29323',
                            600: '#a3731b',
                            700: '#7f5319',
                            800: '#68431c',
                            900: '#58371c',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                        display: ['Outfit', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #07090e;
            background-image: 
                radial-gradient(at 0% 0%, rgba(212, 170, 51, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(59, 130, 246, 0.07) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(244, 63, 94, 0.05) 0px, transparent 50%);
            background-attachment: fixed;
        }
        .font-display { font-family: 'Outfit', sans-serif; }
        .glass-panel {
            background: rgba(18, 22, 33, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }
        .glass-card {
            background: linear-gradient(135deg, rgba(25, 30, 45, 0.8) 0%, rgba(15, 18, 28, 0.85) 100%);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-glow-gold {
            box-shadow: 0 0 25px -5px rgba(212, 170, 51, 0.15);
        }
    </style>
</head>
<body class="text-slate-200 min-h-screen flex antialiased selection:bg-amber-400 selection:text-black">

    <!-- SIDEBAR DE NAVEGACIÓN LATERAL -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 lg:w-80 glass-panel border-r border-white/10 flex flex-col justify-between transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        
        <!-- Parte Superior: Logo & Menú Principal -->
        <div class="p-6 overflow-y-auto">
            <!-- Brand Badge -->
            <div class="flex items-center justify-between mb-8 pb-5 border-b border-white/10">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-amber-500 via-amber-400 to-yellow-200 flex items-center justify-center text-xl shadow-lg shadow-amber-500/20 group-hover:scale-105 transition transform">
                        🏛️
                    </div>
                    <div>
                        <div class="text-xs uppercase tracking-widest text-amber-400 font-bold font-display">Grand Oasis</div>
                        <h1 class="text-base font-extrabold text-white tracking-tight leading-none group-hover:text-amber-200 transition">
                            Digital Resort
                        </h1>
                    </div>
                </a>

                <!-- Botón cerrar para móvil -->
                <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-white p-1">
                    ✕
                </button>
            </div>

            <!-- Navegación de Áreas -->
            <div class="space-y-1 mb-8">
                <p class="px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">Instalaciones</p>
                
                <a href="{{ route('home') }}" 
                   class="flex items-center justify-between px-3.5 py-3 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('home') ? 'bg-gradient-to-r from-amber-500/20 to-amber-500/5 text-amber-300 border border-amber-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-lg">🏝️</span>
                        <span>Recepción / Inicio</span>
                    </div>
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ request()->routeIs('home') ? 'bg-amber-400/20 text-amber-300' : 'bg-slate-800 text-slate-400' }}">Libre</span>
                </a>

                <a href="{{ route('panel') }}" 
                   class="flex items-center justify-between px-3.5 py-3 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('panel') ? 'bg-gradient-to-r from-blue-500/20 to-blue-500/5 text-blue-300 border border-blue-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-lg">🛏️</span>
                        <span>Habitación Privada</span>
                    </div>
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ request()->routeIs('panel') ? 'bg-blue-400/20 text-blue-300' : 'bg-blue-950/60 text-blue-400 border border-blue-500/20' }}">Auth</span>
                </a>

                <a href="{{ route('casino') }}" 
                   class="flex items-center justify-between px-3.5 py-3 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('casino') ? 'bg-gradient-to-r from-amber-500/20 to-amber-500/5 text-amber-300 border border-amber-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-lg">🎰</span>
                        <span>Casino Royale</span>
                    </div>
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ request()->routeIs('casino') ? 'bg-amber-400/20 text-amber-300' : 'bg-amber-950/60 text-amber-400 border border-amber-500/20' }}">18+</span>
                </a>

                <a href="{{ route('admin') }}" 
                   class="flex items-center justify-between px-3.5 py-3 rounded-xl text-sm font-semibold transition group {{ request()->routeIs('admin') ? 'bg-gradient-to-r from-rose-500/20 to-rose-500/5 text-rose-300 border border-rose-500/30' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <span class="text-lg">💼</span>
                        <span>Oficina Dirección</span>
                    </div>
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ request()->routeIs('admin') ? 'bg-rose-400/20 text-rose-300' : 'bg-rose-950/60 text-rose-400 border border-rose-500/20' }}">Admin</span>
                </a>
            </div>

            <!-- SIMULADOR RÁPIDO DE PERFILES (MOVIDO AL SIDEBAR) -->
            <div class="p-3.5 rounded-2xl bg-white/[0.03] border border-white/10 space-y-2.5">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Simulador de Porteros
                    </span>
                    <span class="text-[10px] text-slate-500">1-clic</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-tight">
                    Alterna instantáneamente de rol para poner a prueba las reglas de acceso:
                </p>
                <div class="grid grid-cols-1 gap-1.5 pt-1">
                    <a href="{{ route('quick.login', 'admin') }}" 
                       class="flex items-center justify-between px-2.5 py-2 rounded-xl text-xs font-semibold bg-rose-500/10 hover:bg-rose-500/20 text-rose-300 border border-rose-500/20 transition group">
                        <span class="flex items-center gap-2">
                            <span>🔑</span> Directora Ana
                        </span>
                        <span class="text-[10px] opacity-75 font-mono">35a • Admin</span>
                    </a>
                    <a href="{{ route('quick.login', 'adult') }}" 
                       class="flex items-center justify-between px-2.5 py-2 rounded-xl text-xs font-semibold bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-300 border border-emerald-500/20 transition group">
                        <span class="flex items-center gap-2">
                            <span>🍸</span> Huésped Carlos
                        </span>
                        <span class="text-[10px] opacity-75 font-mono">25a • Adulto</span>
                    </a>
                    <a href="{{ route('quick.login', 'minor') }}" 
                       class="flex items-center justify-between px-2.5 py-2 rounded-xl text-xs font-semibold bg-amber-500/10 hover:bg-amber-500/20 text-amber-300 border border-amber-500/20 transition group">
                        <span class="flex items-center gap-2">
                            <span>🥤</span> Joven Mateo
                        </span>
                        <span class="text-[10px] opacity-75 font-mono">16a • Menor</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Parte Inferior: Tarjeta de Huésped Activo -->
        <div class="p-4 border-t border-white/10 bg-black/20">
            @auth
                <div class="p-3.5 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 overflow-hidden">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr {{ Auth::user()->is_admin ? 'from-rose-500 to-amber-500' : 'from-blue-500 to-emerald-400' }} flex items-center justify-center font-bold text-white text-sm shrink-0 shadow-md">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div class="overflow-hidden">
                            <div class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</div>
                            <div class="text-[11px] text-slate-400 flex items-center gap-1.5">
                                <span>{{ Auth::user()->age }} años</span>
                                <span>•</span>
                                <span class="{{ Auth::user()->is_admin ? 'text-rose-400 font-semibold' : 'text-blue-400 font-semibold' }}">
                                    {{ Auth::user()->is_admin ? 'Director' : 'Cliente' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('logout') }}" method="POST" class="shrink-0">
                        @csrf
                        <button type="submit" title="Cerrar Sesión" class="w-8 h-8 rounded-lg bg-white/5 hover:bg-rose-500/20 text-slate-400 hover:text-rose-300 flex items-center justify-center transition border border-white/10">
                            🚪
                        </button>
                    </form>
                </div>
            @else
                <div class="space-y-2">
                    <div class="px-2 text-[11px] text-slate-400 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        <span>Modo: <strong>Invitado sin sesión</strong></span>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('login') }}" class="text-center py-2 px-3 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/30 transition">
                            Entrar
                        </a>
                        <a href="{{ route('register') }}" class="text-center py-2 px-3 rounded-xl text-xs font-bold bg-white/5 hover:bg-white/10 text-white border border-white/10 transition">
                            Registro
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </aside>

    <!-- FONDO OSCURO PARA MÓVIL AL ABRIR SIDEBAR -->
    <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden md:hidden"></div>

    <!-- ÁREA DE CONTENIDO PRINCIPAL (DESPLAZADA POR EL SIDEBAR EN DESKTOP) -->
    <div class="flex-1 md:pl-72 lg:pl-80 flex flex-col min-h-screen">
        
        <!-- HEADER SUPERIOR DE ACCIONES Y ESTADO -->
        <header class="glass-panel sticky top-0 z-30 border-b border-white/10 px-4 sm:px-8 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Botón hamburguesa móvil -->
                <button onclick="toggleSidebar()" class="md:hidden text-slate-300 hover:text-white p-2 rounded-xl bg-white/5 border border-white/10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Breadcrumb / Indicador de Ubicación -->
                <div class="flex items-center gap-2 text-xs font-medium text-slate-400">
                    <span class="text-amber-400">Grand Oasis</span>
                    <span>/</span>
                    <span class="text-white font-semibold capitalize">
                        @if(request()->routeIs('home')) Recepción Principal
                        @elseif(request()->routeIs('panel')) Habitación de Huésped
                        @elseif(request()->routeIs('casino')) Sala de Apuestas Royale
                        @elseif(request()->routeIs('admin')) Centro de Control & Dirección
                        @elseif(request()->routeIs('login')) Acceso a Llave Digital
                        @elseif(request()->routeIs('register')) Registro de Nuevo Huésped
                        @else Complejo
                        @endif
                    </span>
                </div>
            </div>

            <!-- ESTADO EN VIVO DE PORTEROS (MIDDLEWARES) -->
            <div class="flex items-center gap-3">
                <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/[0.03] border border-white/10 text-xs">
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span class="text-slate-400">Filtros Activos:</span>
                    <span class="font-mono text-emerald-400 font-bold">3 Middlewares</span>
                </div>

                @auth
                    <div class="text-xs px-3 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 font-semibold flex items-center gap-1.5">
                        <span>●</span> {{ Auth::user()->name }}
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-xs px-3 py-1.5 rounded-full bg-amber-500/20 border border-amber-500/30 text-amber-300 font-semibold hover:bg-amber-500/30 transition">
                        🔑 Iniciar Sesión
                    </a>
                @endauth
            </div>
        </header>

        <!-- CONTENEDOR PRINCIPAL -->
        <main class="flex-1 p-4 sm:p-8 max-w-7xl w-full mx-auto">
            
            <!-- ALERTAS FLASH CON ESTILO MODERNO -->
            @if (session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-200 flex items-start gap-3.5 shadow-xl shadow-rose-950/20 animate-fade-in">
                    <div class="w-9 h-9 rounded-xl bg-rose-500/20 border border-rose-500/30 flex items-center justify-center text-lg shrink-0">
                        🛡️
                    </div>
                    <div class="flex-1 pt-0.5">
                        <h3 class="font-bold text-rose-300 text-sm tracking-wide">Acceso Interceptado por Portero</h3>
                        <p class="text-xs text-rose-200/90 mt-0.5 leading-relaxed">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-200 flex items-start gap-3.5 shadow-xl shadow-emerald-950/20 animate-fade-in">
                    <div class="w-9 h-9 rounded-xl bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center text-lg shrink-0">
                        ✨
                    </div>
                    <div class="flex-1 pt-0.5">
                        <h3 class="font-bold text-emerald-300 text-sm tracking-wide">Operación Confirmada</h3>
                        <p class="text-xs text-emerald-200/90 mt-0.5 leading-relaxed">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- FOOTER ELEGANTE -->
        <footer class="glass-panel border-t border-white/10 py-5 px-6 sm:px-8 text-center sm:flex sm:justify-between sm:items-center text-xs text-slate-400">
            <div>
                Grand Oasis Digital Resort &copy; {{ date('Y') }} — Demostración de Middlewares en Laravel
            </div>
            <div class="mt-2 sm:mt-0 flex justify-center gap-4 text-slate-400">
                <span>CheckAuth</span>
                <span>•</span>
                <span>CheckAge</span>
                <span>•</span>
                <span>CheckAdmin</span>
            </div>
        </footer>
    </div>

    <!-- Script para Toggle de Sidebar en móvil -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
