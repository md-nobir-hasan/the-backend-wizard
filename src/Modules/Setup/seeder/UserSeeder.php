<?php

namespace Database\Seeders\Backend;

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
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456),
        ];

        DB::table('users')->insert($data);
    }
}
