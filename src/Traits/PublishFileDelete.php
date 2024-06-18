<?php

namespace Nobir\TheBackendWizard\Traits;

use Illuminate\Support\Facades\File;

trait PublishFileDelete
{
    /**
     * Synchronize files between views/backend and nobir/files.
     */
    public function synchronizeFiles($app_file_path, $pakage_file_path)
    {
        $backendDir = $app_file_path; // Adjust as per your directory structure
        $nobirDir = $pakage_file_path; // Adjust as per your directory structure

        // Get all files in views/backend
        $backendFiles = $this->listFilesRecursive($backendDir);

        // Get all files in nobir/files
        $nobirFiles = $this->listFilesRecursive($nobirDir);

        // Get relative paths of files
        $backendRelativePaths = $this->getRelativePaths($backendFiles, $backendDir);
        $nobirRelativePaths = $this->getRelativePaths($nobirFiles, $nobirDir);

        // Find files to delete from views/backend
        $filesToDelete = array_intersect($backendRelativePaths, $nobirRelativePaths);

        // Delete matching files from views/backend
        foreach ($filesToDelete as $file) {
            $fullPath = $backendDir.'/'.$file;
            File::delete($fullPath);
            echo 'Deleted file: '.$fullPath.'<br>';
        }

        echo 'Files synchronized successfully.';

        // You can add further logic or return a response as needed
    }

    /**
     * Recursively list all files in a directory.
     */
    private function listFilesRecursive($directory)
    {
        $files = [];

        $items = File::allFiles($directory);

        foreach ($items as $item) {
            if ($item->isFile()) {
                $files[] = $item->getPathname();
            } elseif ($item->isDir()) {
                $files = array_merge($files, $this->listFilesRecursive($item->getPathname()));
            }
        }

        return $files;
    }

    /**
     * Get relative paths for files.
     */
    private function getRelativePaths($files, $basePath)
    {
        $relativePaths = [];

        foreach ($files as $file) {
            $relativePaths[] = ltrim(str_replace($basePath, '', $file), '/');
        }

        return $relativePaths;
    }
}
