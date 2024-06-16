<?php

namespace Nobir\TheBackendWizard\Traits;

trait PathToNamespaceExtract
{
    /**
     * Convert a file path to a namespace.
     */
    public function pathToNamespace(string $filePath, string $startFrom = 'database'): ?string
    {
        // Normalize the directory separators
        $normalizedPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filePath);

        // Find the starting point in the path
        $startPos = strpos($normalizedPath, DIRECTORY_SEPARATOR.$startFrom.DIRECTORY_SEPARATOR);

        if ($startPos !== false) {
            // The specified starting point was not found in the path
            $pseudo_path = substr($normalizedPath, $startPos + 1); // +1 to skip the leading directory separator
        } else {
            $pseudo_path = $normalizedPath;
        }

        // Extract the relevant part of the path

        // Remove the file extension
        $relativePathWithoutExtension = preg_replace('/\.php$/', '', $pseudo_path);

        // Convert directory separators to namespace separators
        $namespace = str_replace(DIRECTORY_SEPARATOR, '\\', $relativePathWithoutExtension);

        return Str()->title($namespace);
    }
}
