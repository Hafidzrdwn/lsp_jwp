<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Teknologi Informasi', 'code' => 'IT', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sumber Daya Manusia', 'code' => 'HR', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Keuangan', 'code' => 'FIN', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pemasaran', 'code' => 'MKT', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Penjualan', 'code' => 'SAL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Operasional', 'code' => 'OPS', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('departments')->insert($departments);
    }
}
