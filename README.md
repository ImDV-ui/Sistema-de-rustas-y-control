# 🌴 Digital Resort - Sistema de Navegación y Control de Accesos

Este proyecto implementa la estructura de navegación y el control de accesos de un **Digital Resort** utilizando el enrutamiento y los **Middlewares de Laravel 12 / PHP 8.4**.

---

## 📋 Requisitos del Proyecto Implementados

### 1. Base de Datos y Modelo de Usuario
- **Migración `users`**: Se añadieron los campos:
  - `is_admin` (booleano, por defecto `false`).
  - `age` (entero, edad del usuario).
- **Modelo `User`**: Atributos en `$fillable` y convertidos en `casts()` (`is_admin => 'boolean'`, `age => 'integer'`).
- **Seeder (`UserSeeder`)**: Tres usuarios creados con contraseña `password`:
  1. **Administrador mayor de edad**: `admin@resort.com` | Edad: 35 | `is_admin: true`
  2. **Cliente adulto**: `adulto@resort.com` | Edad: 25 | `is_admin: false`
  3. **Cliente menor de edad**: `menor@resort.com` | Edad: 16 | `is_admin: false`

---

### 2. Vistas Blade (Fase 1)
- **Públicas**:
  - `resources/views/home.blade.php`: Pantalla principal de bienvenida al resort con tarjetas informativas de cada zona.
  - `resources/views/login.blade.php`: Formulario de inicio de sesión con guía de credenciales de prueba.
  - `resources/views/register.blade.php`: Formulario de registro de cuentas (incluyendo campo de edad).
- **Privadas (Protegidas)**:
  - `resources/views/panel-usuario.blade.php`: Habitación del cliente con mensaje de bienvenida personalizado y ficha del huésped.
  - `resources/views/casino.blade.php`: Sala de juegos exclusiva para mayores de edad (18+).
  - `resources/views/panel-admin.blade.php`: Oficina de dirección exclusiva para administradores (`is_admin: true`).

---

### 3. Middlewares / "Los Porteros" (Fase 2)
1. **`CheckAuth` (`App\Http\Middleware\CheckAuth`)**:
   - Verifica si el usuario ha iniciado sesión con `Auth::check()`.
   - Si no está autenticado, lo redirige a `/login`.
2. **`CheckAdmin` (`App\Http\Middleware\CheckAdmin`)**:
   - Comprueba si el usuario autenticado tiene `is_admin === true`.
   - Si un usuario estándar intenta ingresar, deniega el acceso con error HTTP `403 Forbidden`.
3. **`CheckAge` (`App\Http\Middleware\CheckAge`)**:
   - Comprueba si el usuario autenticado tiene `age >= 18`.
   - Si un menor intenta acceder, lo redirige a su habitación (`/panel`) con el mensaje flash de sesión: `"Acceso denegado: Debes ser mayor de edad"`.

Los middlewares fueron registrados con sus correspondientes alias en `bootstrap/app.php` (`CheckAuth`, `CheckAdmin`, `CheckAge`).

---

### 4. Configuración de Rutas en `routes/web.php` (Fase 3)
| Ruta | Método | Acceso | Middlewares | Vista / Acción |
|---|---|---|---|---|
| `/` | GET | Libre | Ninguno | `home.blade.php` |
| `/login` | GET / POST | Libre | Ninguno | Formulario / Autenticación |
| `/register` | GET / POST | Libre | Ninguno | Formulario / Registro |
| `/panel` | GET | Privado | `CheckAuth` | `panel-usuario.blade.php` |
| `/casino` | GET | Privado | `CheckAuth`, `CheckAge` | `casino.blade.php` |
| `/admin` | GET | Privado | `CheckAuth`, `CheckAdmin` | `panel-admin.blade.php` |
| `/logout` | POST | Privado | Ninguno | Cierre de sesión y redirección |

---

## 🚀 Puesta en Marcha

1. **Instalar dependencias:**
   ```bash
   composer install
   ```
2. **Ejecutar migraciones y seeders:**
   ```bash
   php artisan migrate:fresh --seed
   ```
3. **Iniciar servidor local:**
   ```bash
   php artisan serve
   ```
   Abrir en el navegador: `http://localhost:8000`

---

## 🧪 Pruebas Automatizadas (Pest)

Se incluye una suite completa de pruebas en `tests/Feature/AccessControlTest.php` que verifica todas las restricciones y casos de uso:

```bash
php artisan test
```

---

## 📤 Entrega en GitHub

Para subir el proyecto a tu repositorio público de GitHub:

1. Crea un repositorio público en [GitHub](https://github.com/new) llamado por ejemplo `laravel-resort-middlewares`.
2. Ejecuta en tu terminal:
   ```bash
   git remote add origin https://github.com/TU_USUARIO/TU_REPOSITORIO.git
   git branch -M main
   git push -u origin main
   ```
