<?php

namespace Database\Seeders\Backend;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('n_sidebars')->insert([
            [
                'title' => 'Dashboard',
                'access' => 'Dashboard',
                'route' => 'dashboard',
                'n_sidebar_id' => NULL,
                'is_parent' => true,
                'serial' => 1,
                'status' => 'Active'
            ],
        ]);
    }
}
