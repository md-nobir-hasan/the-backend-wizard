<?php

namespace Nobir\TheBackendWizard\Modules\Setup;

use Illuminate\Support\Facades\Artisan;
use Nobir\TheBackendWizard\Interfaces\ModuleInterface;
use Nobir\TheBackendWizard\Modules\BaseModule;
use Nobir\TheBackendWizard\Services\FileModifier;
use Nobir\TheBackendWizard\Services\PathManager;
use Nobir\TheBackendWizard\Traits\PathToNamespaceExtract;

class AdminPanelSetup extends BaseModule implements ModuleInterface
{
    use PathToNamespaceExtract;

    public $pm;

    public function __construct()
    {
        $this->pm = new PathManager();
    }

    public $path;

    public function command()
    {
    }

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
        $sidebar_seeder_path = $seeder_path. '/SidebarSeeder.php';
        $user_seeder_namespace = $this->pathToNamespace($user_seeder_path, 'database');
        $sidebar_seeder_namespace = $this->pathToNamespace($sidebar_seeder_path, 'database');
        $database_seeder_path = database_path('seeders/DatabaseSeeder.php');

        (new FileModifier($database_seeder_path))->searchingText('{', 2)
            ->insertAfter()->insertingText("\n\t\t\t\$this->call([\n\t\t\t\t\\$user_seeder_namespace::class,\n\t\t\t\t\\$sidebar_seeder_namespace::class\n\t\t\t]);")
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
            Artisan::call('migrate:fresh --seed');
            echo Artisan::output();
        } catch (\Exception $e) {
            echo "Migration and seeding can't be done";
        }
    }
}
