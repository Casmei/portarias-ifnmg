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
        $role = Role::where('id', UserRole::ADMIN)->first();

        ModelsUser::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'role_id' => $role->id,
        ]);
    }
}
