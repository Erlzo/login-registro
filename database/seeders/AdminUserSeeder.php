<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'name' => 'Administrador',
            'lastname' => 'Sistema',
            'email' => 'admin@ejemplo.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'usuario',
            'name' => 'Usuario',
            'lastname' => 'Prueba',
            'email' => 'usuario@ejemplo.com',
            'password' => Hash::make('usuario123'),
            'role' => 'user',
        ]);
    }
}
