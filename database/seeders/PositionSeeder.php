<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            ['name' => 'Reitor', 'id' => 1],
            ['name' => 'Coordenador', 'id' => 2],
            ['name' => 'Professor', 'id' => 3],
        ]);

        DB::table('funcaos')->insert([
            ['name' => 'Diretor Geral', 'id' => 1],
            ['name' => 'Diretor', 'id' => 2],
            ['name' => 'Secretario Geral', 'id' => 3],
            ['name' => 'Secretario', 'id' => 4]
        ]);
    }
}
