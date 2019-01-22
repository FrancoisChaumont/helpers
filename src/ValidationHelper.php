<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for verification of all sorts
 */
class ValidationHelper
{
    /**
     * Verify if an email address is well formatted
     *
     * @param string $email email address
     * @return boolean true for correct format
     */
    public static function checkEmailFormat(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Verify if a url is well formatted
     *
     * @param string $url url
     * @return boolean true for correct format
     */
    public static function checkUrlFormat(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Verify if an ipv4 or ipv6 address is well formatted
     *
     * @param string $ip ipv4 or ipv6 address
     * @param boolean $discardPrivateRange discard private ip range
     * @param boolean $discardReservedRange discard reserved ip range
     * @return boolean true for correct format
     */
    public static function checkIpFormat(string $ip, $discardPrivateRange=false, $discardReservedRange=false): bool
    {
        if ($discardPrivateRange) {
            if ($discardReservedRange) {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE, FILTER_FLAG_NO_RES_RANGE);
            } else {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE);
            }
        } else {
            if ($discardReservedRange) {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE);
            } else {
                return filter_var($ip, FILTER_VALIDATE_IP);
            }
        }
    }

    /**
     * Verify if an ipv4 address is well formatted
     *
     * @param string $ip ipv4 address
     * @param boolean $discardPrivateRange discard private ip range
     * @param boolean $discardReservedRange discard reserved ip range
     * @return boolean true for correct format
     */
    public static function checkIpV4Format(string $ip, $discardPrivateRange=false, $discardReservedRange=false): bool
    {
        if ($discardPrivateRange) {
            if ($discardReservedRange) {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4, FILTER_FLAG_NO_PRIV_RANGE, FILTER_FLAG_NO_RES_RANGE);
            } else {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4, FILTER_FLAG_NO_RES_RANGE);
            }
        } else {
            if ($discardReservedRange) {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4, FILTER_FLAG_NO_RES_RANGE);
            } else {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
            }
        }
    }

    /**
     * Verify if an ipv6 address is well formatted
     *
     * @param string $ip ipv6 address
     * @param boolean $discardPrivateRange discard private ip range
     * @param boolean $discardReservedRange discard reserved ip range
     * @return boolean true for correct format
     */
    public static function checkIpV6Format(string $ip, $discardPrivateRange=false, $discardReservedRange=false): bool
    {
        if ($discardPrivateRange) {
            if ($discardReservedRange) {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6, FILTER_FLAG_NO_PRIV_RANGE, FILTER_FLAG_NO_RES_RANGE);
            } else {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6, FILTER_FLAG_NO_RES_RANGE);
            }
        } else {
            if ($discardReservedRange) {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6, FILTER_FLAG_NO_RES_RANGE);
            } else {
                return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
            }
        }
    }

    /**
     * Verify if an app ID is Android's
     *      - Android app lookup: https://play.google.com/store/apps/details?id=xxx
     *      - Android app ID documentation: https://developer.android.com/studio/build/application-id
     *
     * @param string $androidAppId app ID
     * @return boolean true if Android's
     */
    public static function isAndroidAppId(string $androidAppId)
    {
        $regex = '/^[a-z][a-z0-9_]*(\.[a-z][a-z0-9_]*)+$/i';

        if (preg_match($regex, $androidAppId)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Verify if an app ID is iOS' (iTunes app ID)
     *      - iTunes lookup: https://itunes.apple.com/lookup?id=xxx&media=software
     *      - iTunes lookup documentation: https://affiliate.itunes.apple.com/resources/documentation/itunes-store-web-service-search-api/#lookup
     *
     * @param string $iOsAppId app ID
     * @return boolean true if iOS'
     */
    public static function isIosAppId(string $iOsAppId)
    {
        $regex = '/^[0-9]{1,19}$/';

        if (preg_match($regex, $iOsAppId)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Verify if an app ID is Android's or iOS' (iTunes app ID)
     *
     * @param string $appId app ID
     * @return boolean true if Android's or iOS'
     */
    public static function isAndroidOrIosAppId(string $appId)
    {
        return (self::isAndroidAppId($appId) || self::isIosAppId($appId));
    }

    /**
     * Date&Time validator for all formats
     * 
     * Format list available here:
     * http://php.net/manual/en/function.date.php
     * http://php.net/manual/en/class.datetimeinterface.php#datetime.constants.types
     * http://php.net/manual/en/datetime.createfromformat.php
     * 
     * Usage:
     * validateDate('2012-02-28 12:12:12'); # true
     * validateDate('2012-02-28', 'Y-m-d'); # true
     * validateDate('28/02/2012', 'd/m/Y'); # true
     * validateDate('30/02/2012', 'd/m/Y'); # false
     * validateDate('14:50', 'H:i'); # true
     * validateDate('14:77', 'H:i'); # false
     * validateDate(14, 'H'); # true
     * validateDate('14', 'H'); # true
     * validateDate('2012-02-28T12:12:12+02:00', 'Y-m-d\TH:i:sP'); # true
     * validateDate('2012-02-28T12:12:12+02:00', DateTime::ATOM); # true
     * validateDate('Tue, 28 Feb 2012 12:12:12 +0200', 'D, d M Y H:i:s O'); # true
     * validateDate('Tue, 28 Feb 2012 12:12:12 +0200', DateTime::RSS); # true
     * validateDate('Tue, 27 Feb 2012 12:12:12 +0200', DateTime::RSS); # false
     * ...
     *
     * @param mixed $datetime date&time, date, time (full or partial), can be integer or string
     * @param string $format date/time format
     * @return void
     */
    public static function validateDateTime(mixed $datetime, string $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $datetime);
        
        return $d && $d->format($format) == $datetime;
    }
}
