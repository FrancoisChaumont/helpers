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
}

