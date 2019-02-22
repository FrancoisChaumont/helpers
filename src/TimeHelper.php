<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for time management
 */
class TimeHelper
{
    //const TIME_IN_YEARS = 0;
    //const TIME_IN_MONTHS = 1;
    const TIME_IN_DAYS = 2;
    const TIME_IN_HOURS = 3;
    const TIME_IN_MINUTES = 4;
    const TIME_IN_HOURS_SHORT = 10;

    //static $years   =   'years';
    //static $months  =   'months';
    static $days    =   'days';
    static $hours   =   'hours';
    static $minutes =   'minutes';
    static $seconds =   'seconds';

    static $separator = " ";

    /**
     * Build a formatted time string (days, hours, minutes or hh:mm:ss)
     * Time labels are customizable to fit the language of your choice
     * The separator between time parts is also customizable 
     *
     * @param integer $seconds time in seconds
     * @param string $format constant from the TimeHelper class
     * @return string
     */
    public static function secondsToTime(int $seconds, int $format=self::TIME_IN_HOURS_SHORT): string
    {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");

        return $dtF->diff($dtT)->format(self::buildFormat($format));
    }

    /**
     * Build a format string for DateInterval
     * IMPROVE: years and months don't seem to adjust the remaining smaller units (e.g.: displays '367 days' instead '1 year 2 days')
     *
     * @param integer $format constant from the TimeHelper class
     * @return string
     */
    private static function buildFormat(int $format): string
    {
        switch ($format) {
            //case self::TIME_IN_YEARS        : $formatting = "%y ".self::$years.self::$separator."%m ".self::$months.self::$separator."%a ".self::$days.self::$separator."%h ".self::$hours.self::$separator."%i ".self::$minutes.self::$separator."%s ".self::$seconds; break;
            //case self::TIME_IN_MONTHS       : $formatting =                                     "%m ".self::$months.self::$separator."%a ".self::$days.self::$separator."%h ".self::$hours.self::$separator."%i ".self::$minutes.self::$separator."%s ".self::$seconds; break;
            case self::TIME_IN_DAYS         : $formatting =                                                                          "%a ".self::$days.self::$separator."%h ".self::$hours.self::$separator."%i ".self::$minutes.self::$separator."%s ".self::$seconds; break;
            case self::TIME_IN_HOURS        : $formatting =                                                                                                             "%h ".self::$hours.self::$separator."%i ".self::$minutes.self::$separator."%s ".self::$seconds; break;
            case self::TIME_IN_MINUTES      : $formatting =                                                                                                                                                 "%i ".self::$minutes.self::$separator."%s ".self::$seconds; break;

            case self::TIME_IN_HOURS_SHORT  : 
            default                         : $formatting = '%H:%I:%S';
        }

        return $formatting;
    }
}

