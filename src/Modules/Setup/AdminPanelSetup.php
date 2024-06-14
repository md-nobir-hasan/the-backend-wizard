<?php

namespace Nobir\TheBackendWizard\Modules\Setup;

use Illuminate\Support\Facades\Artisan;
use Nobir\TheBackendWizard\Interfaces\ModuleInterface;
use Nobir\TheBackendWizard\Modules\BaseModule;
use Nobir\TheBackendWizard\Services\PathManager;
use Nobir\TheBackendWizard\Traits\FileModifying;

class AdminPanelSetup extends BaseModule implements ModuleInterface
{
    use FileModifying;
    public $pathManager;

    public function __construct()
    {
        $this->pathManager = new PathManager();
    }

    public $path;

    public function command()
    {

    }

    public function run($data)
    {
        $database_seeder_path = database_path('migrations/DatabaseSeeder.php');
        $user_seeder_path = $this->pathManager->specificPathExtract($this->pathManager::$SEEDER_PATH_KEY) . "/UserSeeder.php";
        dd($user_seeder_path,database_path('seeders'));
        $user_seeder_namespace = $this->pathManager->extractNamespace($user_seeder_path);
        //User seeder Creation
        // $this->modify()
        // Artisan::call('vendor:publish', [
        //     '--tag' => 'backend-setup',
        // ]);
        // echo Artisan::output();

        //DatabaseSeeder modification

        $array_for_replace = [
            ['searching_text' => "}", 'inserting_position'=>2, 'inserting_text'=> "\t\t\t \$this->call([$user_seeder_namespace\\UserSeeder::class])"],
        ];
        dd($array_for_replace,$user_seeder_path,$user_seeder_namespace);
        $this->modify($database_seeder_path,$database_seeder_path,);
    }


}
