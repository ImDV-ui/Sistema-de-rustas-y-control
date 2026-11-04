<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Digital Resort') - Gestión de Accesos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col">
    <!-- Navbar Superior -->
    <header class="bg-slate-800/90 backdrop-blur border-b border-slate-700/80 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <span class="text-2xl">🌴</span>
                <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight text-emerald-400 hover:text-emerald-300 transition">
                    Digital Resort & Casino
                </a>
            </div>

            <!-- Navegación General -->
            <nav class="flex flex-wrap items-center gap-2">
                <a href="{{ route('home') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium {{ request()->routeIs('home') ? 'bg-emerald-600 text-white' : 'text-slate-300 hover:bg-slate-700' }}">
                    Inicio
                </a>
                <a href="{{ route('panel') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium {{ request()->routeIs('panel') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-700' }}" title="Habitación Privada (Requiere Auth)">
                    Habitación
                </a>
                <a href="{{ route('casino') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium {{ request()->routeIs('casino') ? 'bg-amber-600 text-white' : 'text-slate-300 hover:bg-slate-700' }}" title="Casino (Requiere Auth + 18)">
                    Casino (18+)
                </a>
                <a href="{{ route('admin') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin') ? 'bg-rose-600 text-white' : 'text-slate-300 hover:bg-slate-700' }}" title="Dirección (Requiere Admin)">
                    Dirección
                </a>

                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="ml-2 px-3 py-1.5 rounded-lg text-sm font-semibold bg-slate-700 hover:bg-red-600 text-slate-200 transition">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium {{ request()->routeIs('login') ? 'bg-emerald-600 text-white' : 'text-slate-300 hover:bg-slate-700' }}">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium {{ request()->routeIs('register') ? 'bg-emerald-600 text-white' : 'text-slate-300 hover:bg-slate-700' }}">
                        Registro
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Barra de Estado del Usuario & Accesos Rápidos de Prueba -->
    <div class="bg-slate-800 border-b border-slate-700 text-xs text-slate-300">
        <div class="max-w-6xl mx-auto px-4 py-2.5 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2.5 h-2.5 rounded-full {{ Auth::check() ? 'bg-emerald-500 animate-pulse' : 'bg-amber-500' }}"></span>
                @auth
                    <span>Usuario activo: <strong class="text-white">{{ Auth::user()->name }}</strong> | Edad: <strong class="text-white">{{ Auth::user()->age }} años</strong> | Rol: <span class="px-1.5 py-0.5 rounded text-[11px] font-semibold {{ Auth::user()->is_admin ? 'bg-rose-500/20 text-rose-300 border border-rose-500/30' : 'bg-blue-500/20 text-blue-300 border border-blue-500/30' }}">{{ Auth::user()->is_admin ? 'Administrador' : 'Cliente' }}</span></span>
                @else
                    <span>Estado: <strong class="text-amber-400">Invitado</strong> (Sin sesión activa)</span>
                @endauth
            </div>

            <!-- Botones de prueba rápida -->
            <div class="flex items-center gap-1.5">
                <span class="text-slate-400 hidden sm:inline">Prueba rápida:</span>
                <a href="{{ route('quick.login', 'admin') }}" class="px-2 py-1 rounded bg-slate-700 hover:bg-rose-600 text-slate-200 transition" title="is_admin=true, age=35">
                    🔑 Admin (35a)
                </a>
                <a href="{{ route('quick.login', 'adult') }}" class="px-2 py-1 rounded bg-slate-700 hover:bg-emerald-600 text-slate-200 transition" title="is_admin=false, age=25">
                    👤 Adulto (25a)
                </a>
                <a href="{{ route('quick.login', 'minor') }}" class="px-2 py-1 rounded bg-slate-700 hover:bg-amber-600 text-slate-200 transition" title="is_admin=false, age=16">
                    🧒 Menor (16a)
                </a>
            </div>
        </div>
    </div>

    <!-- Contenido Principal -->
    <main class="flex-grow max-w-6xl mx-auto px-4 py-8 w-full">
        <!-- Notificaciones Flash -->
        @if (session('error'))
            <div class="mb-6 p-4 rounded-xl bg-rose-500/15 border border-rose-500/40 text-rose-200 flex items-center gap-3">
                <span class="text-2xl">🚫</span>
                <div>
                    <h3 class="font-bold">Acceso Denegado</h3>
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/15 border border-emerald-500/40 text-emerald-200 flex items-center gap-3">
                <span class="text-2xl">✅</span>
                <div>
                    <h3 class="font-bold">Operación Exitosa</h3>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Pie de Página -->
    <footer class="bg-slate-800/60 border-t border-slate-700/80 py-4 text-center text-xs text-slate-400">
        Digital Resort Oasis &copy; {{ date('Y') }} - Sistema de Control de Accesos y Middlewares
    </footer>
</body>
</html>
