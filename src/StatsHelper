<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for stats management
 */
class StatsHelper
{
    /**
     * Calculation of a percentage
     *
     * @param integer $count count (???%)
     * @param integer $total total (100%)
     * @param integer $precision decimal to display (**.??%)
     * @return string percentage
     */
    public static function percentage(int $count, int $total, int $precision = 2): string
    {
        return number_format(round(($count / $total) * 100, $precision), $precision);
    }
}

