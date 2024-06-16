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
        // $this->modify()
        // Artisan::call('vendor:publish', [
        //     '--tag' => 'backend-setup',
        // ]);
        // echo Artisan::output();

        //Modifiying DatabaseSeeder
        $this->routeModification();

        //Modifiying DatabaseSeeder
        $this->DatabaseSeederModification();

        //Modifiying DatabaseSeeder
        // $this->DatabaseSeederModification();



    }

    public function routeModification(){
        $web_path = base_path('routes/web.php');
        // $web_path = $this->pm->specificPathExtract($this->pm::$ROUTE_PATH_KEY);


        (new FileModifier($web_path))->searchingText('<?php')
            ->insertAfter()->insertingText("\n require './backend.php'; ")
            ->save($web_path);
    }

    public function DatabaseSeederModification(){
        $user_seeder_path = $this->pm->specificPathExtract($this->pm::$SEEDER_PATH_KEY) . "/UserSeeder.php";
        $user_seeder_namespace = $this->pathToNamespace($user_seeder_path, 'database');
        $database_seeder_path = database_path('seeders/DatabaseSeeder.php');

        (new FileModifier($database_seeder_path))->searchingText('{', 2)
            ->insertAfter()->insertingText("\n\t\t\t\$this->call(\\$user_seeder_namespace::class);")
            ->save($database_seeder_path);

    }
}
