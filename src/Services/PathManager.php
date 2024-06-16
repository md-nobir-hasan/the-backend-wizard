<?php

namespace Nobir\TheBackendWizard\Services;

use Illuminate\Support\Facades\File;
use Nobir\TheBackendWizard\Traits\FileModifying;

class PathManager
{
    // use FileModifying;
    public $paths;

    public $default_paths;

    // Dynamically assigned keys
    public static $ASSET_PATH_KEY;

    public static $VIEW_PATH_KEY;

    public static $MIGRATION_PATH_KEY;

    public static $SEEDER_PATH_KEY;

    public static $CONTROLLER_PATH_KEY;

    public static $SERVICE_CLASS_PATH_KEY;

    public static $REQUESTS_PATH_KEY;

    public static $FACTORY_PATH_KEY;

    public static $ROUTE_PATH_KEY;
    public static $APP_SERVICE_PROVIDER_PATH_KEY;
    public static $COMPONENT_CLASS_PATH_KEY;
    public static $VIEW_COMPONENT_PATH_KEY;
    public static $MODEL_PATH_KEY;

    public function __construct()
    {
        //default path assign
        $this->default_paths = $this->defaultConfigPaths();
        $dpaths = $this->default_paths;

        //path key load from default configuration files
        foreach ($dpaths as $key => $value) {
            $const_key = strtoupper($key).'_KEY';
            self::${$const_key} = $key;
        }

        // config file is published or not is checking and the paths are assign
        if (file_exists(config_path('backend.php'))) {
            $this->paths = config('backend');
        } else {
            $this->paths = $this->defaultConfigPaths();
        }

    }

    public function defaultConfigPaths()
    {
        return include __DIR__.'/../template/config.php';
    }


    public function specificPathExtract($path_key)
    {
        if (isset($this->paths[$path_key])) {
            $path = $this->paths[$path_key];
            $this->dirHandling($path);

            return $path;
        } else {
            $dpath = $this->default_paths[$path_key];
            $this->dirHandling($dpath);
            echo "$path_key is not define in backend config file. Default path $dpath is used by default";

            return $dpath;
        }
    }

    public function dirHandling($path)
    {
        if (! File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }

   public function pathPrefixExtract($path_key, $startFrom){
        $path = $this->paths[$path_key];

        // Normalize the directory separators
        $normalizedPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);

        // Find the starting point in the path
        $startPos = strpos($normalizedPath, DIRECTORY_SEPARATOR . $startFrom . DIRECTORY_SEPARATOR);

        if ($startPos !== false) {
            // The specified starting point was not found in the path
            $pseudo_path = substr($normalizedPath, $startPos+ str($startFrom)->length()+2); // +1 to skip the leading directory separator
        } else {
            $pseudo_path = false;
        }

        return $pseudo_path;
    }
}
