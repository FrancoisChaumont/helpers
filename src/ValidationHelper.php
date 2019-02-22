<?php

namespace FC\Helpers;

/**
 * Helper class to hold helper functions/methods for verification of all sorts
 */
class ValidationHelper
{
    // IP
    const IP_ALL = "all";
    const IP_V4 = "ipv4";
    const IP_V6 = "ipv6";

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
     * @param string $ipType type of ip address: ipv4, ipv6 or either (use one of those class constants: IP_V4, IP_V6 or IP_ALL)
     * @param boolean $discardPrivateRange discard private ip range
     * @param boolean $discardReservedRange discard reserved ip range
     * @return boolean true for correct format
     */
    public static function checkIpFormat(string $ip, string $ipType = self::IP_ALL, bool $discardPrivateRange = false, bool $discardReservedRange = false): bool
    {
        if ($ipType != self::IP_ALL && $ipType != self::IP_V4 && $ipType != self::IP_V6) {
            throw new \Exception("Paramater <ipType> must be one of the following: ValidationHelper::IP_ALL, ValidationHelper::IP_V4, ValidationHelper::IP_V6. <$ipType> given instead.");
        }

        $flags = 0;

        // init ip type flags
        if ($ipType == self::IP_V4) { $flags = $flags | FILTER_FLAG_IPV4; } 
        elseif ($ipType == self::IP_V6) { $flags = $flags | FILTER_FLAG_IPV6; }
        // init ip range flags
        if ($discardPrivateRange) { $flags = $flags | FILTER_FLAG_NO_PRIV_RANGE; }
        if ($discardReservedRange) { $flags = $flags | FILTER_FLAG_NO_RES_RANGE; }

        if ($flags != 0) {
            return filter_var($ip, FILTER_VALIDATE_IP, $flags);
        } else {
            return filter_var($ip, FILTER_VALIDATE_IP);
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
     * Date&Time validator for all formats
     *
     * @param $datetime date&time, date, time (full or partial), can be integer or string
     * @param string $format date/time format
     * @return bool true if validated, false otherwise
     */
    public static function validateDateTime($datetime, string $format = 'Y-m-d H:i:s'): bool
    {
        $d = \DateTime::createFromFormat($format, $datetime);
        
        return $d && $d->format($format) == $datetime;
    }
}

