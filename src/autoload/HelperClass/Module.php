<?php

namespace Nobir\TheBackendWizard\HelperClass;

use Artisan;
use File;

class Module
{
    private array $content_replaceable_file_paths;

    private array $file_location;

    private string $command;

    private string $admin_name;

    private static $module = null;

    // Private constructor for Singleton pattern
    private function __construct($command_name)
    {
        $this->admin_name = config('nbackend.admin_name');
        $this->command = $command_name; // Set the command passed to constructor

        // Assuming CommandName::pakage_root_path is a method that retrieves paths
        $this->file_location = require CommandName::pakage_root_path('configs/filelocation.php');
        $this->content_replaceable_file_paths = $this->file_location[$this->admin_name][$this->command]['cp'];
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
    public function replaceContent()
    {
        foreach ($this->content_replaceable_file_paths as $package_path => $app_path) {
            try {
                $content = File::get($package_path);
                File::put($app_path, $content);
            } catch (\Exception $e) {
                // Log or handle the exception properly
                echo 'File operation failed: '.$e->getMessage();
            }
        }
    }
}
