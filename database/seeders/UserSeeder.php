<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Administrador mayor de edad
        User::updateOrCreate(
            ['email' => 'admin@resort.com'],
            [
                'name' => 'Administrador Resort',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'age' => 35,
            ]
        );

        // 2. Usuario normal mayor de edad
        User::updateOrCreate(
            ['email' => 'adulto@resort.com'],
            [
                'name' => 'Cliente Adulto',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'age' => 25,
            ]
        );

        // 3. Usuario normal menor de edad
        User::updateOrCreate(
            ['email' => 'menor@resort.com'],
            [
                'name' => 'Cliente Menor',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'age' => 16,
            ]
        );
    }
}
