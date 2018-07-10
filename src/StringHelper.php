<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for string management
 */
class StringHelper
{
    /**
     * Verify if a string starts with a given set of characters
     *
     * @param string $haystack
     * @param string $needle
     * @return boolean true if it does start with, false if not
     */
    public static function startsWith(string $haystack, string $needle): bool 
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    /**
     * Verify if a string ends with a given set of characters
     *
     * @param string $haystack
     * @param string $needle
     * @return boolean true if it does end with, false if not
     */
    public static function endsWith(string $haystack, string $needle): bool 
    {
        $length = strlen($needle);
        return $length === 0 || (substr($haystack, -$length) === $needle);
    }

    /**
     * Truncate x characters at the end of a string
     *
     * @param string $parCharString
     * @param integer $NbChar
     * @return string truncated string
     */
    public static function truncate(string $parCharString, int $NbChar)
    {
        return substr($parCharString, 0, strlen($parCharString) - $NbChar);
    }

    /**
     * Replace multiple spaces by one only in a given string
     *
     * @param string $s
     * @return string result string
     */
    public static function singleSpaceOnly(string $s)
    {
        return preg_replace('/\s+/', ' ', trim($s));
    }

    /**
     * Remove all spaces within a given string
     *
     * @param string $s
     * @return string result string
     */
    public static function noSpace(string $s) 
    {
        return preg_replace('/\s+/', '', trim(static::singleSpaceOnly($s)));
    }

    /**
     * Generate random hexadecimal string of any desired length
     *
     * @param string $length
     * @return string
     */
    function randomHexaDecimal(string $length): string
    {
        return bin2hex(random_bytes($length));
    }
}

