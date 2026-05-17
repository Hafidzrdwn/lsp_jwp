<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $education = [
            ['degree' => 'SMA'],
            ['degree' => 'SMK'],
            ['degree' => 'D1'],
            ['degree' => 'D2'],
            ['degree' => 'D3'],
            ['degree' => 'D4'],
            ['degree' => 'S1'],
            ['degree' => 'S2'],
            ['degree' => 'S3'],
        ];

        DB::table('educations')->insert($education);
    }
}
