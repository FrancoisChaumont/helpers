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
}

