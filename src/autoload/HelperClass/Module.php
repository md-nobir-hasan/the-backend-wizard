<?php

namespace Nobir\TheBackendWizard\HelperClass;

use Artisan;
use File;

class Module
{
    public array $commands_and_paths;

    private array $file_location;

    private string $command;

    private string $admin_name;

    private static $module = null;

    // Private constructor for Singleton pattern
    private function __construct($command_name)
    {
        $this->admin_name = config('nbackend.admin_name');
        $this->command = $command_name; // Set the command passed to constructor
        $path_role_permission_or_not = CommandName::with_or_without_role_permission_key();

        // Assuming CommandName::pakage_root_path is a method that retrieves paths
        $this->file_location = require CommandName::pakage_root_path('configs/filelocation.php');

        $this->commands_and_paths = $this->file_location[$this->admin_name][$this->command][$path_role_permission_or_not];
    }

    // Singleton creation method
    public static function create($command_name)
    {
        if (self::$module === null) {
            self::$module = new self($command_name); // Initialize the module with command
        }

        return self::$module;
    }

    // Publishes files using Artisan
    public function publish()
    {
        $command_name = $this->command;

        // Publish everything without theme
        Artisan::call('vendor:publish', [
            '--tag' => "backend-$command_name",
        ]);

        echo Artisan::output(); // Output Artisan results
    }

    // Replaces file content as defined in file paths
    public function contentReplace()
    {
        if (! isset($this->commands_and_paths['content_replace']) || count($this->commands_and_paths['content_replace']) < 1) {
            return 'No replaceable files';
        }

        $replace_files = $this->commands_and_paths['content_replace'];

        foreach ($replace_files as $package_path => $app_path) {
            try {
                $content = File::get($package_path);
                File::put($app_path, $content);
            } catch (\Exception $e) {
                // Log or handle the exception properly
                echo 'File operation failed: '.$e->getMessage();
            }
        }
    }

    // Mdify the files content as defined in file paths
    public function contentModify()
    {
        if (! isset($this->commands_and_paths['content_modify']) || count($this->commands_and_paths['content_modify']) < 1) {
            return 'Content modify not defined';
        }

        $content_mofify = $this->commands_and_paths['content_modify'];

        foreach ($content_mofify as $modify) {
            try {
                $content_app = File::get($modify['app_path']);
                $content_pakage = File::get($modify['pakage_path']);
                $replace = $modify['replace'];
                $content = str_replace($replace, $content_pakage."\n $replace", $content_app);

                File::put($modify['app_path'], $content);
            } catch (\Exception $e) {
                // Log or handle the exception properly
                echo 'File operation failed: '.$e->getMessage();
            }
        }
    }
}
