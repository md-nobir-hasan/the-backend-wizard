<?php

namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $n = [];
        if (Schema::hasTable('theme_settings')) {
            $n['theme_setting'] = DB::table('theme_settings')->first();
        }
        view()->share($n);

    }
}
