<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Super Admin',
            'email' => 'nobir.wd@gmail.com',
            'profession' => 'Student',
            'is_admin' =>true,
            'password' => Hash::make(123456),
        ];

        DB::table('users')->insert($data);
    }
}
