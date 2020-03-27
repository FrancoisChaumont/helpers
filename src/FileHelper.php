<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for file management
 */
class FileHelper
{
    /**
     * Download a file from a source (URL or others)
     *
     * @param string $source source file name
     * @param string $destination destination file name
     * @return bool
     */
    public static function downloadFile(string $source, string $destination): bool
    {
        try {
            @$content = file_get_contents($source);
            if ($content) {
                @file_put_contents($destination, $content);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Expands the home directory alias '~' to the full path
     *
     * @param string $path the path to expand
     * @return string the expanded path
     */
    public static function expandHomeDirectory(string $path): string
    {
        $homeDirectory = getenv('HOME');

        if (empty($homeDirectory)) {
            $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
        }
        
        return str_replace('~', realpath($homeDirectory), $path);
    }
    
    /**
     * Empty a folder and delete it
     *
     * @param string $folder path to folder
     * @return void
     */
    public static function deleteFolder(string $folder)
    {
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($folder, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }

        rmdir($folder);
    }
    
    /**
     * Format a file size from bytes to human readable b, Mb, Gb, Tb, Pb
     *
     * @param int|string $bytes file size in bytes
     * @param integer $decimals number of decimals to display
     * @return string human readable file size
     */
    public static function fileSizeReadable($bytes, int $decimals = 2): string
    {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . @$sz[$factor];
    }
}

