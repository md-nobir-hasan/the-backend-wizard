<?php

namespace Nobir\TheBackendWizard\Modules\Setup;

use Illuminate\Support\Facades\Artisan;
use Nobir\TheBackendWizard\Interfaces\ModuleInterface;
use Nobir\TheBackendWizard\Modules\BaseModule;
use Nobir\TheBackendWizard\Services\FileModifier;
use Nobir\TheBackendWizard\Services\PathManager;
use Nobir\TheBackendWizard\Traits\PathToNamespaceExtract;
use Nobir\TheBackendWizard\Traits\PublishFileDelete;

class AdminPanelSetup extends BaseModule implements ModuleInterface
{
    use PathToNamespaceExtract, PublishFileDelete;

    public $pm;

    public function __construct()
    {
        $this->pm = new PathManager();
    }

    public $path;

    public function command() {}

    public function run($data)
    {
        Artisan::call('vendor:publish', [
            '--tag' => 'backend-setup',
        ]);

        echo Artisan::output();

        //Modifiying route(web.php)
        $this->routeModification();

        //Modifiying model (User.php)
        $this->modelModification();

        //Modifiying migration (User.php)
        $this->DatabaseSeederModification();

        //Modifiying DatabaseSeeder
        $this->migrationModification();

        // //Modifiying AppServiceProvider
        $this->appServiceProviderModification();

        //Migration and Seeder
        $this->migrationAndSeeder();
    }

    public function routeModification()
    {
        $web_path = base_path('routes/web.php');
        // $web_path = $this->pm->specificPathExtract($this->pm::$ROUTE_PATH_KEY);

        (new FileModifier($web_path))->searchingText('<?php')
            ->insertAfter()->insertingText("\nrequire 'backend.php'; ")
            ->save($web_path);
    }

    public function modelModification()
    {
        $user_migration_path = app_path('models/User.php');
        // $user_migration_path = $this->pm->specificPathExtract($this->pm::$ROUTE_PATH_KEY);

        (new FileModifier($user_migration_path))->searchingText("'name',")
            ->insertAfter()->insertingText("\n\t\t'img',")
            ->save($user_migration_path);
    }

    public function migrationModification()
    {
        $user_migration_path = database_path('migrations/0001_01_01_000000_create_users_table.php');
        // $user_migration_path = $this->pm->specificPathExtract($this->pm::$ROUTE_PATH_KEY);

        (new FileModifier($user_migration_path))->searchingText("name');")
            ->insertAfter()->insertingText("\n\t\t\t\$table->string('img',500)->nullable();")
            ->save($user_migration_path);
    }

    public function DatabaseSeederModification()
    {
        $seeder_path = $this->pm->specificPathExtract($this->pm::$SEEDER_PATH_KEY);
        $user_seeder_path = $seeder_path.'/UserSeeder.php';
        $sidebar_seeder_path = $seeder_path.'/SidebarSeeder.php';
        $user_seeder_namespace = $this->pathToNamespace($user_seeder_path, 'database');
        $sidebar_seeder_namespace = $this->pathToNamespace($sidebar_seeder_path, 'database');
        $database_seeder_path = database_path('seeders/DatabaseSeeder.php');

        (new FileModifier($database_seeder_path))->searchingText('{', 2)
            ->insertAfter()->insertingText("\n\t\t\$this->call([\n\t\t\t\\$user_seeder_namespace::class,\n\t\t\t\\$sidebar_seeder_namespace::class\n\t\t]);")
            ->save($database_seeder_path);
    }

    public function appServiceProviderModification()
    {
        $app_service_provider_path = $this->pm->specificPathExtract($this->pm::$APP_SERVICE_PROVIDER_PATH_KEY);

        (new FileModifier($app_service_provider_path))->searchingText('App\Providers;')->insertAfter()->insertingText("\n\nuse Illuminate\Support\Facades\Cache;")
            ->searchingText('{', 3)->insertAfter()->insertingText("\n\t\t\$sidebar_lists = Cache::get('nsidebar') ?? [];\n\t\tview()->share('sidebar_lists',\$sidebar_lists);")
            ->save($app_service_provider_path);
        $this->migrationFolderLoading($app_service_provider_path);
    }

    public function migrationFolderLoading($app_service_provider_path)
    {
        $migration_prefix = $this->pm->pathPrefixExtract($this->pm::$MIGRATION_PATH_KEY, 'migrations');
        if ($migration_prefix) {
            (new FileModifier($app_service_provider_path))->searchingText('{', 3)->insertAfter()->insertingText("\n\t\t\$this->loadMigrationsFrom([\n\t\t\tdatabase_path('migrations'),\n\t\t\tdatabase_path('migrations/$migration_prefix'),\n\t\t]);")
                ->save();
        }
    }

    public function migrationAndSeeder()
    {
        try {
            Artisan::call('migrate');
            Artisan::call('db:seed');
            echo Artisan::output();
        } catch (\Exception $e) {
            echo "Migration and seeding can't be done";
        }
    }

    public function down()
    {
        // Reverse the Artisan vendor publish
        $this->reversePublishedFiles();

        // Reverse route modifications
        $this->reverseRouteModification();

        // Reverse model modifications
        $this->reverseModelModification();

        // Reverse migration modifications
        $this->reverseMigrationModification();

        // Reverse DatabaseSeeder modifications
        $this->reverseDatabaseSeederModification();

        // Reverse AppServiceProvider modifications
        $this->reverseAppServiceProviderModification();

        // Rollback migrations
        $this->rollbackMigrations();
    }

    protected function reversePublishedFiles()
    {
        $this->deletePublishedFiles([
            __DIR__.'/assets' => $this->pm->specificPathExtract($this->pm::$ASSET_PATH_KEY), //assets files
            __DIR__.'/views' => $this->pm->specificPathExtract($this->pm::$VIEW_PATH_KEY), //view files
            __DIR__.'/components' => $this->pm->specificPathExtract($this->pm::$VIEW_COMPONENT_PATH_KEY), //view component files
            __DIR__.'/component-class' => $this->pm->specificPathExtract($this->pm::$COMPONENT_CLASS_PATH_KEY), //view component class files
            __DIR__.'/Controllers' => $this->pm->specificPathExtract($this->pm::$CONTROLLER_PATH_KEY), //view files
            __DIR__.'/routes' => $this->pm->specificPathExtract($this->pm::$ROUTE_PATH_KEY), //view files
            __DIR__.'/seeder' => $this->pm->specificPathExtract($this->pm::$SEEDER_PATH_KEY), //view files
            __DIR__.'/migrations' => $this->pm->specificPathExtract($this->pm::$MIGRATION_PATH_KEY), //view files
            __DIR__.'/models' => $this->pm->specificPathExtract($this->pm::$MODEL_PATH_KEY), //view files
        ]);
    }

    protected function reverseRouteModification()
    {
        $web_path = base_path('routes/web.php');
        (new FileModifier($web_path))->searchingText("\nrequire 'backend.php'; ")
            ->delete()
            ->save();
    }

    protected function reverseModelModification()
    {
        $user_model_path = app_path('Models/User.php');
        (new FileModifier($user_model_path))->searchingText("\n\t\t'img',")
            ->delete()
            ->save();
    }

    protected function reverseMigrationModification()
    {
        $user_migration_path = database_path('migrations/0001_01_01_000000_create_users_table.php');
        (new FileModifier($user_migration_path))->searchingText("\n\t\t\t\$table->string('img',500)->nullable();")
            ->delete()
            ->save();
    }

    protected function reverseDatabaseSeederModification()
    {
        $seeder_path = $this->pm->specificPathExtract($this->pm::$SEEDER_PATH_KEY);
        $user_seeder_path = $seeder_path.'/UserSeeder.php';
        $sidebar_seeder_path = $seeder_path.'/SidebarSeeder.php';
        $user_seeder_namespace = $this->pathToNamespace($user_seeder_path, 'database');
        $sidebar_seeder_namespace = $this->pathToNamespace($sidebar_seeder_path, 'database');
        $database_seeder_path = database_path('seeders/DatabaseSeeder.php');
        (new FileModifier($database_seeder_path))->searchingText("\n\t\t\$this->call([\n\t\t\t\\$user_seeder_namespace::class,\n\t\t\t\\$sidebar_seeder_namespace::class\n\t\t]);")
            ->delete()
            ->save();
    }

    protected function reverseAppServiceProviderModification()
    {
        $app_service_provider_path = $this->pm->specificPathExtract($this->pm::$APP_SERVICE_PROVIDER_PATH_KEY);

        (new FileModifier($app_service_provider_path))->searchingText("\n\nuse Illuminate\Support\Facades\Cache;")
            ->delete()
            ->searchingText("\n\t\t\$sidebar_lists = Cache::get('nsidebar') ?? [];\n\t\tview()->share('sidebar_lists',\$sidebar_lists);")
            ->delete()
            ->save();
        $this->ReverseMigrationFolderLoading($app_service_provider_path);
    }

    public function ReverseMigrationFolderLoading($app_service_provider_path)
    {
        $migration_prefix = $this->pm->pathPrefixExtract($this->pm::$MIGRATION_PATH_KEY, 'migrations');
        if ($migration_prefix) {
            (new FileModifier($app_service_provider_path))->searchingText("\n\t\t\$this->loadMigrationsFrom([\n\t\t\tdatabase_path('migrations'),\n\t\t\tdatabase_path('migrations/$migration_prefix'),\n\t\t]);")
                ->delete()
                ->save();
        }
    }

    protected function rollbackMigrations()
    {
        try {
            Artisan::call('migrate:rollback');
            echo Artisan::output();
        } catch (\Exception $e) {
            echo "Migration rollback can't be done";
        }
    }
}
