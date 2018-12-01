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
}

