<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for file management
 */
class JsonHelper
{
    /**
     * Verify if a given file is a valid JSON formatted file
     *
     * @param string $file
     * @return boolean
     */
    public static function isJson(string $file): bool
    {
        try {
            json_decode(file_get_contents($file));
            return (json_last_error() == JSON_ERROR_NONE);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Extract a json string from a string containing mixed values
     * ( e.g.: 'Hello World! { "key": "value", ... } Bonjour!' )
     *
     * @param string $mixedString
     * @return string return empty string if no json found or invalid
     */
    function extractJsonFromMixedString(string $mixedString): string
    {
        preg_match('~\{(?:[^{}]|(?R))*\}~', $mixedString, $matches);
        try {
            $r = $matches[0] ?? '';
        } catch (\Exception $e) {
            return '';
        }
        
        return $r;
    }
}

