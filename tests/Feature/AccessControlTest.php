<?php

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(UserSeeder::class);
});

describe('Rutas Públicas', function () {
    test('la página de inicio es de acceso libre', function () {
        $this->get('/')
            ->assertOk()
            ->assertSee('Bienvenido al Digital Resort Oasis');
    });

    test('la página de login es de acceso libre', function () {
        $this->get('/login')
            ->assertOk()
            ->assertSee('Iniciar Sesión en el Resort');
    });

    test('la página de registro es de acceso libre', function () {
        $this->get('/register')
            ->assertOk()
            ->assertSee('Registro de Huésped');
    });
});

describe('Portero de Autenticación (CheckAuth)', function () {
    test('un usuario no autenticado es redirigido a login al intentar entrar a panel', function () {
        $this->get('/panel')
            ->assertRedirect('/login');
    });

    test('un usuario no autenticado es redirigido a login al intentar entrar al casino', function () {
        $this->get('/casino')
            ->assertRedirect('/login');
    });

    test('un usuario no autenticado es redirigido a login al intentar entrar a admin', function () {
        $this->get('/admin')
            ->assertRedirect('/login');
    });
});

describe('Control de Acceso según Edad (CheckAge)', function () {
    test('un usuario adulto puede acceder al casino', function () {
        $adulto = User::where('email', 'adulto@resort.com')->first();

        $this->actingAs($adulto)
            ->get('/casino')
            ->assertOk()
            ->assertSee('Casino Royale');
    });

    test('un usuario menor de edad es redirigido a su panel con mensaje de acceso denegado al intentar entrar al casino', function () {
        $menor = User::where('email', 'menor@resort.com')->first();

        $this->actingAs($menor)
            ->get('/casino')
            ->assertRedirect('/panel')
            ->assertSessionHas('error', 'Acceso denegado: Debes ser mayor de edad');
    });
});

describe('Control de Acceso de Administrador (CheckAdmin)', function () {
    test('un usuario normal no puede acceder al panel de administración y recibe 403', function () {
        $adulto = User::where('email', 'adulto@resort.com')->first();

        $this->actingAs($adulto)
            ->get('/admin')
            ->assertForbidden();
    });

    test('un usuario administrador puede acceder a la oficina de dirección', function () {
        $admin = User::where('email', 'admin@resort.com')->first();

        $this->actingAs($admin)
            ->get('/admin')
            ->assertOk()
            ->assertSee('Oficina de Dirección');
    });
});

describe('Huéspedes en Habitación Privada', function () {
    test('cualquier usuario autenticado puede acceder a su habitación/panel', function () {
        $adulto = User::where('email', 'adulto@resort.com')->first();

        $this->actingAs($adulto)
            ->get('/panel')
            ->assertOk()
            ->assertSee('Habitación Privada del Huésped')
            ->assertSee($adulto->name);
    });
});

describe('Flujo de Autenticación', function () {
    test('iniciar sesión correctamente redirige al panel', function () {
        $this->post('/login', [
            'email' => 'adulto@resort.com',
            'password' => 'password',
        ])
            ->assertRedirect('/panel');

        $this->assertAuthenticated();
    });

    test('cerrar sesión desconecta al usuario y redirige al inicio', function () {
        $adulto = User::where('email', 'adulto@resort.com')->first();

        $this->actingAs($adulto)
            ->post('/logout')
            ->assertRedirect('/');

        $this->assertGuest();
    });
});
