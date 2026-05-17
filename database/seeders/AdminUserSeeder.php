<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make 3 admin accounts with array and loops
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Hafidz Ridwan Cahya',
                'email' => 'hafidz@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Bima Fathoni',
                'email' => 'bima@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
