<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'id' => 1,
            'layout' => 'default',
            'primary_color' => null,
            'color_scheme' => 'dark',
            'sidebar_color' => 'sidebar-dark',
            'direction' => 'ltr',
        ];

        DB::table('theme_settings')->insert($data);
    }
}
