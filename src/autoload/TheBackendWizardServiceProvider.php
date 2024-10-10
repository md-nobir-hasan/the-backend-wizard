<?php

namespace Nobir\TheBackendWizard;

use Illuminate\Support\ServiceProvider;
use Nobir\TheBackendWizard\Commands\TheBackendWizardCommand;

use Nobir\TheBackendWizard\HelperClass\CommandName;

class TheBackendWizardServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }
    protected function publishFile($admin_name, $module_name)
    {
        return $this->publishes([
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/model") => app_path('Models'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/migration") => database_path('migrations'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/seeder") => database_path('seeders'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/factory") => database_path('factories'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/route") => base_path('routes'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/middleware") => app_path('Http/Middleware'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/controller") => app_path('Http/Controllers'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/requests") => app_path('Http/Requests'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/service") => app_path('Http/Service'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/view") => resource_path('views'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/component") => resource_path('views/component'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/component-class") => app_path('View/Components'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/asset") => public_path(),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/mail-class") => app_path('Mail'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/notification-class") => app_path('Notifications'),
            CommandName::pakage_admin_path("$admin_name/$module_name/publish/image") => storage_path("app/public/$admin_name"),
        ], "backend-$module_name");

    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the command
        $this->commands(commands: [
            TheBackendWizardCommand::class,
        ]);

        // automatic publishing configure file
        $this->publishes([
            __DIR__ . '/configs/config.php' => config_path('nbackend.php'), //configure files
        ]);


        //publishing configure file using command
        $this->publishes([
            __DIR__ . '/configs/config.php' => config_path('nbackend.php'), //configure files
        ], 'backend-config');


        $config = config('nbackend') ?? ['admin_name' => 'taildash'];
        $admin_name = $config['admin_name'];


        // Publishing the modules under the admin that is define in the congfig file

        //setup module publishing
        $this->publishFile($admin_name, CommandName::SETUP);
    }
}
