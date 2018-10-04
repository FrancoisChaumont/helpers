<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for array management
 */
class ArrayHelper
{
    /**
     * Deletes a row at specified index in array and return the new array
     *
     * @param integer $idx
     * @param array $array
     * @return null|array
     */
    public static function arrayDelete(int $idx, array $array): ?array
    {
        if (isset($array[$idx])) {
            unset($array[$idx]);
            if (is_array($array)) { 
                $array = array_values($array);
            } else {
                $array = null;
            }
        }

        return $array;
    }
    
    /**
     * array_map function for associative arrays
     *
     * @param callable $callback function to execute using key and value
     * @param array $array array to map
     * @return array
     */
    function array_map_assoc(callable $callback, array $array): array
    {
        $r = array();
        foreach ($array as $key=>$value) {
            $r[$key] = $callback($key,$value);
        }

        return $r;
    }
}

