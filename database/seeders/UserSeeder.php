<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Role;
use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUser::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'cpf' => '123.456.789.10',
            'role_id' => UserRole::ADMIN,
        ]);

        ModelsUser::create([
            'name' => 'Tiago de Castro Lima',
            'email' => 'casmei@protonmail.com',
            'password' => Hash::make('admin'),
            'cpf' => '123.456.739.10',
            'role_id' => UserRole::SERVIDOR,
        ]);
    }
}
