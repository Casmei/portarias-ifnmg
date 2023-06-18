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
    }
}
