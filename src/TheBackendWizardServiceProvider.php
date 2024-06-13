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
        $this->commands([
            TheBackendWizardCommand::class,
        ]);
        $this->publishes([
            __DIR__ . '/template/config.php' => config_path('backend.php'),
        ],'backend-config');
    }
}
