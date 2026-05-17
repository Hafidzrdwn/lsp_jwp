<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'name' => 'Junior Staff',
                'level' => 'Staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Senior Staff',
                'level' => 'Senior',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Team Lead',
                'level' => 'Supervisor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Department Manager',
                'level' => 'Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'General Manager',
                'level' => 'General Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Director',
                'level' => 'Director',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Eksekusi insert data ke tabel positions
        DB::table('positions')->insert($positions);
    }
}
