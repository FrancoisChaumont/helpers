<?php

use FC\Helpers\ValidationHelper;

require __DIR__ . "/../vendor/autoload.php";

$ip = "192.168.0.1";
echo "Check $ip format\n";
var_dump(ValidationHelper::checkIpFormat($ip));

$ip = "192.168.0.1";
echo "Check $ip format as ipv4\n";
var_dump(ValidationHelper::checkIpFormat($ip, ValidationHelper::IP_V4));

$ip = "192.168.0.1";
echo "Check $ip format as ipv6\n";
var_dump(ValidationHelper::checkIpFormat($ip, ValidationHelper::IP_V6));

$ip = "192.168.0.1";
echo "Check $ip format as ipv4 out of reserved range\n";
var_dump(ValidationHelper::checkIpFormat($ip, ValidationHelper::IP_V4, false, true));

$ip = "192.168.0.1";
echo "Check $ip format as ipv4 out of private range\n";
var_dump(ValidationHelper::checkIpFormat($ip, ValidationHelper::IP_V4, true, false));

