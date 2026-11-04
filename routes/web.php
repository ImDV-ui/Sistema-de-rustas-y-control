<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Públicas (Acceso Libre)
|--------------------------------------------------------------------------
*/
Route::view('/', 'home')->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/quick-login/{type}', [AuthController::class, 'quickLogin'])->name('quick.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas Privadas (Requieren Protección)
|--------------------------------------------------------------------------
*/
Route::middleware([CheckAuth::class])->group(function (): void {
    // Habitación del cliente: protegida únicamente por autenticación
    Route::view('/panel', 'panel-usuario')->name('panel');

    // Sala de juegos / Casino: protegida por autenticación y edad (>= 18)
    Route::view('/casino', 'casino')
        ->middleware([CheckAge::class])
        ->name('casino');

    // Oficina de dirección / Admin: protegida por autenticación y rol de administrador
    Route::view('/admin', 'panel-admin')
        ->middleware([CheckAdmin::class])
        ->name('admin');
});
