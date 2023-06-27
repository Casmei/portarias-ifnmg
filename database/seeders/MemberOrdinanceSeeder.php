<?php

namespace Database\Seeders;

use App\Models\MemberOrdinance;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberOrdinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memberOrdinanceId = DB::table('member_ordinances')->insertGetId([
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ordinanceId = DB::table('ordinances')->insertGetId([
            'ordinance_number' => 123456,
            'initial_date' => '2023-06-01',
            'finish_date' => '2023-06-30',
            'campus_or_rectory' => 'Campus ABC',
            'description' => 'This is the description of ordinance 123456.',
            'visibility' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ordinances')
            ->where('id', $ordinanceId)
            ->update(['members_ordinances_id' => $memberOrdinanceId]);


        DB::table('member_ordinances')
        ->where('id', $memberOrdinanceId)
        ->update(['ordinance_id' => $ordinanceId]);
    }
}
