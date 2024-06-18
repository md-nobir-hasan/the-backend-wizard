<?php

namespace Nobir\TheBackendWizard\Services;

use Illuminate\Support\Facades\File;

class CleanBackendPanel
{
    public $pm;

    public function __construct()
    {
        $this->pm = new PathManager();
    }

    public function run()
    {
        $pathManager = $this->pm; // Assuming PathManager is a service container alias

        $paths = [
            $pathManager->specificPathExtract($pathManager::$ASSET_PATH_KEY),
            $pathManager->specificPathExtract($pathManager::$VIEW_PATH_KEY),
            // $pathManager->specificPathExtract($pathManager::$VIEW_COMPONENT_PATH_KEY),
            // $pathManager->specificPathExtract($pathManager::$COMPONENT_CLASS_PATH_KEY),
            $pathManager->specificPathExtract($pathManager::$CONTROLLER_PATH_KEY),
            $pathManager->specificPathExtract($pathManager::$ROUTE_PATH_KEY.'/backend.php'),
            $pathManager->specificPathExtract($pathManager::$SEEDER_PATH_KEY),
            $pathManager->specificPathExtract($pathManager::$MIGRATION_PATH_KEY),
            $pathManager->specificPathExtract($pathManager::$MODEL_PATH_KEY),
        ];

        foreach ($paths as $path) {
            if (File::exists($path)) {
                File::deleteDirectory($path);
                echo "Deleted: $path";
            } else {
                echo "Not found: $path";
            }
        }

        echo "\nBackend setup files cleanup complete.";
    }
}
