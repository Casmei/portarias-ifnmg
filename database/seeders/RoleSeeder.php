<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'servidor', 'id' => UserRole::SERVIDOR],
            ['name' => 'gestor', 'id' => UserRole::GESTOR],
            ['name' => 'admin', 'id' => UserRole::ADMIN],
        ]);

    }
}
