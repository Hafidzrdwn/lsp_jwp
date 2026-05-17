<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'nik' => '3578012304950001',
                'full_name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'phone_number' => '081234567890',
                'gender' => 'Laki-laki',
                'birth_place' => 'Surabaya',
                'birth_date' => '1995-04-23',
                'religion' => 'Islam',
                'marital_status' => 'Kawin',
                'address' => 'Jl. Kertajaya Indah No. 45, Sukolilo',
                'city' => 'Surabaya',
                'join_date' => '2022-01-15',
                'employment_status' => 'Tetap',
                'basic_salary' => 12500000.00,
                'is_active' => true,
                'department_id' => 1, // Tech
                'position_id' => 3,   // Team Lead
                'education_id' => 7,  // S1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3515081211980002',
                'full_name' => 'Siti Aminah',
                'email' => 'siti.aminah@gmail.com',
                'phone_number' => '085678901234',
                'gender' => 'Perempuan',
                'birth_place' => 'Sidoarjo',
                'birth_date' => '1998-11-12',
                'religion' => 'Islam',
                'marital_status' => 'Belum Kawin',
                'address' => 'Perumahan Pondok Jati Blok A2, Sidoarjo',
                'city' => 'Sidoarjo',
                'join_date' => '2023-03-01',
                'employment_status' => 'Tetap',
                'basic_salary' => 8500000.00,
                'is_active' => true,
                'department_id' => 2, // HRD
                'position_id' => 2,   // Senior Staff
                'education_id' => 7,  // S1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3573021508000001',
                'full_name' => 'Kevin Pratama',
                'email' => 'kevin.p@gmail.com',
                'phone_number' => '081345678901',
                'gender' => 'Laki-laki',
                'birth_place' => 'Malang',
                'birth_date' => '2000-08-15',
                'religion' => 'Kristen',
                'marital_status' => 'Belum Kawin',
                'address' => 'Jl. Soekarno Hatta No. 12, Lowokwaru',
                'city' => 'Malang',
                'join_date' => '2024-02-10',
                'employment_status' => 'Kontrak',
                'basic_salary' => 6000000.00,
                'is_active' => true,
                'department_id' => 1, // Tech
                'position_id' => 1,   // Junior Staff
                'education_id' => 5,  // D3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3174092505900005',
                'full_name' => 'Diana Permatasari',
                'email' => 'diana.permatasari@gmail.com',
                'phone_number' => '082198765432',
                'gender' => 'Perempuan',
                'birth_place' => 'Jakarta',
                'birth_date' => '1990-05-25',
                'religion' => 'Islam',
                'marital_status' => 'Kawin',
                'address' => 'Apartemen Gunawangsa, MERR',
                'city' => 'Surabaya',
                'join_date' => '2020-11-01',
                'employment_status' => 'Tetap',
                'basic_salary' => 18000000.00,
                'is_active' => true,
                'department_id' => 4, // Marketing
                'position_id' => 4,   // Manager
                'education_id' => 8,  // S2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3578051701020003',
                'full_name' => 'Rizky Aditya',
                'email' => 'rizky.aditya@gmail.com',
                'phone_number' => '089512345678',
                'gender' => 'Laki-laki',
                'birth_place' => 'Gresik',
                'birth_date' => '2002-01-17',
                'religion' => 'Islam',
                'marital_status' => 'Belum Kawin',
                'address' => 'GKB Jl. Sumatera No. 8',
                'city' => 'Gresik',
                'join_date' => '2025-01-10',
                'employment_status' => 'Magang',
                'basic_salary' => 1500000.00,
                'is_active' => true,
                'department_id' => 5, // Sales
                'position_id' => 1,   // Junior
                'education_id' => 2,  // SMA/SMK
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3578070907930002',
                'full_name' => 'Agnes Monica Sari',
                'email' => 'agnes.sari@gmail.com',
                'phone_number' => '087856781234',
                'gender' => 'Perempuan',
                'birth_place' => 'Surabaya',
                'birth_date' => '1993-07-09',
                'religion' => 'Katolik',
                'marital_status' => 'Kawin',
                'address' => 'Jl. Darmo Permai II',
                'city' => 'Surabaya',
                'join_date' => '2021-05-20',
                'employment_status' => 'Tetap',
                'basic_salary' => 11000000.00,
                'is_active' => true,
                'department_id' => 3, // Finance
                'position_id' => 3,   // Team Lead
                'education_id' => 7,  // S1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3515101402990001',
                'full_name' => 'Dimas Anggara',
                'email' => 'dimas.anggara@gmail.com',
                'phone_number' => '081299998888',
                'gender' => 'Laki-laki',
                'birth_place' => 'Sidoarjo',
                'birth_date' => '1999-02-14',
                'religion' => 'Hindu',
                'marital_status' => 'Belum Kawin',
                'address' => 'Taman Pinang Indah C4/12',
                'city' => 'Sidoarjo',
                'join_date' => '2024-08-01',
                'employment_status' => 'Kontrak',
                'basic_salary' => 5500000.00,
                'is_active' => true,
                'department_id' => 6, // Ops
                'position_id' => 1,   // Junior
                'education_id' => 6,  // D4
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3578123010960004',
                'full_name' => 'Fiona Halim',
                'email' => 'fiona.halim@gmail.com',
                'phone_number' => '081122334455',
                'gender' => 'Perempuan',
                'birth_place' => 'Surabaya',
                'birth_date' => '1996-10-30',
                'religion' => 'Buddha',
                'marital_status' => 'Belum Kawin',
                'address' => 'Pakuwon City, San Antonio',
                'city' => 'Surabaya',
                'join_date' => '2023-09-15',
                'employment_status' => 'Tetap',
                'basic_salary' => 6500000.00,
                'is_active' => true,
                'department_id' => 5, // Sales
                'position_id' => 2,   // Senior Staff
                'education_id' => 7,  // S1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3573030412850001',
                'full_name' => 'Hendra Gunawan',
                'email' => 'hendra.g@gmail.com',
                'phone_number' => '081333444555',
                'gender' => 'Laki-laki',
                'birth_place' => 'Malang',
                'birth_date' => '1985-12-04',
                'religion' => 'Islam',
                'marital_status' => 'Cerai',
                'address' => 'Jl. Ijen Boulevard No. 88',
                'city' => 'Malang',
                'join_date' => '2019-03-10',
                'employment_status' => 'Tetap',
                'basic_salary' => 22000000.00,
                'is_active' => true,
                'department_id' => 1, // Tech
                'position_id' => 5,   // Gen Manager
                'education_id' => 8,  // S2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3578022802010007',
                'full_name' => 'Nabila Putri',
                'email' => 'nabila.putri@gmail.com',
                'phone_number' => '085711223344',
                'gender' => 'Perempuan',
                'birth_place' => 'Surabaya',
                'birth_date' => '2001-02-28',
                'religion' => 'Islam',
                'marital_status' => 'Belum Kawin',
                'address' => 'Rungkut Asri Timur Blok B',
                'city' => 'Surabaya',
                'join_date' => '2024-11-20',
                'employment_status' => 'Kontrak',
                'basic_salary' => 4500000.00,
                'is_active' => false,
                'department_id' => 4, // Marketing
                'position_id' => 1,   // Junior
                'education_id' => 7,  // S1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('employees')->insert($employees);
    }
}
