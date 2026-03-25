<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Cria o usuário admin padrão do sistema.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['login' => 'admin'],
            [
                'name' => 'Administrador',
                'login' => 'admin',
                'email' => 'admin@aconsult.com.br',
                'password' => Hash::make('aconsult@26'),
            ]
        );
    }
}
