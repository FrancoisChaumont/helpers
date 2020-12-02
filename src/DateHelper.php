<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for date management
 */
class DateHelper
{
    /**
     * Calculate the time difference between UTC and specific timezone accounting for Daylight Saving Time
     * See https://www.php.net/manual/en/timezones.php for timezone details
     * 
     * @param string $date date to calculate time difference for
     * @param string $timezone target timezone
     * @return int|false [signed] time difference or false on failure
     */
    public static function utcTimeDifference(string $date, string $timezone)
    {
        $dateFormat = "Y-m-d";

        try {
            // init date and timezone
            if (!\FC\Helpers\ValidationHelper::validateDateTime($date, $dateFormat)) { throw new \Exception("Invalid date! Received '$date', expected format YYYY-MM-DD"); }
            
            // init timezone
            if (!in_array($timezone, \DateTimeZone::listIdentifiers())) { throw new \Exception("Invalid timezone! Received '$timezone'"); }

            // create UTC object
            $utcDate = \DateTime::createFromFormat(
                "$dateFormat G:i",
                "$date 00:00",
                new \DateTimeZone('UTC')
            );
            if (!$utcDate) { throw new \Exception("Failed to initialize UTC date! Expected format: YYYY-MM-DD"); }

            // clone UTC object and apply target timezone
            $targetDate = clone $utcDate;
            $targetDate->setTimeZone(new \DateTimeZone($timezone));

            // create UTC date from target timezone raw date/time
            $targetDateToUTC = \DateTime::createFromFormat(
                "$dateFormat G:i",
                $targetDate->format("$dateFormat H:i"),
                new \DateTimeZone('UTC')
            );

            // get interval in hours between UTC and target timezone
            $interval = $utcDate->diff($targetDateToUTC);

            // echo "UTC\t\t" . $utcDate->format("$dateFormat H:i") . PHP_EOL;
            // echo "$timezone\t" . $targetDateToUTC->format("$dateFormat H:i") . PHP_EOL;
            // echo "Interval (h)\t" . $interval->format('%r%h') . PHP_EOL;

            return $interval->format('%r%h');

        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

