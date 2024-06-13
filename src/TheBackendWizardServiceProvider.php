<?php

namespace Nobir\TheBackendWizard;

use Illuminate\Support\ServiceProvider;
use Nobir\TheBackendWizard\Commands\TheBackendWizardCommand;
use Nobir\TheBackendWizard\Traits\PathManager;

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
        $pathManager = new PathManager();
        $this->commands([
            TheBackendWizardCommand::class,
        ]);

        //publishing configure file
        $this->publishes([
            __DIR__.'/template/config.php' => config_path('backend.php'), //configure files
        ]);

        //publishing backend setup file
        $this->publishes([
            __DIR__.'/Modules/Setup/assets' => $pathManager->specificPathExtract($pathManager::$ASSET_PATH_KEY), //assets files
            __DIR__.'/Modules/Setup/views' => $pathManager->specificPathExtract($pathManager::$VIEW_PATH_KEY), //view files
            __DIR__.'/Modules/Setup/Controllers' => $pathManager->specificPathExtract($pathManager::$CONTROLLER_PATH_KEY), //view files
        ], 'backend-setup');
    }
}
