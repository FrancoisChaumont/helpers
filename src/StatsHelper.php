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
     * @return string formatted percentage based on precision and adding thousand separator
     */
    public static function percentage(int $count, int $total, int $precision = 2): string
    {
        return number_format(round(($count / ($total <= 0 ? 1 : $total)) * 100, $precision), $precision);
    }
}

