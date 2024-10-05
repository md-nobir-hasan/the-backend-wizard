<?php

namespace Nobir\TheBackendWizard;

use Illuminate\Support\ServiceProvider;
use Nobir\TheBackendWizard\Commands\TheBackendWizardCommand;

class TheBackendWizardServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the command
        $this->commands([
            TheBackendWizardCommand::class,
        ]);

        $config = config('nbackend') ?? ['theme' => 'taildash'];
        $theme_name = $config['theme'];

        // automatic publishing configure file
        $this->publishes([
            __DIR__.'/configs/config.php' => config_path('nbackend.php'), //configure files
        ]);

        //publishing configure file using command
        $this->publishes([
            __DIR__.'/configs/config.php' => config_path('nbackend.php'), //configure files
        ], 'backend-config');

        //publishing theme
        $this->publishes([
            __DIR__."/theme/$theme_name" => resource_path('views/backend'), //configure files
        ], 'backend-theme');

        //publishing setu
        $this->publishes([
            __DIR__.'/Modules/Setup' => base_path(), //configure files
        ], 'backend-setup');

    }
}
