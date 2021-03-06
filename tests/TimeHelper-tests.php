<?php

use FC\Helpers\TimeHelper;

require __DIR__ . "/../vendor/autoload.php";


$format = TimeHelper::TIME_IN_HOURS_SHORT;
echo TimeHelper::secondsToTime(12345, $format) . PHP_EOL;

$format = TimeHelper::TIME_IN_HOURS;
echo TimeHelper::secondsToTime((int)(3600 + 185), $format) . PHP_EOL;

TimeHelper::$hours = "heures";
TimeHelper::$minutes = "minutes";
TimeHelper::$seconds = "secondes";

$format = TimeHelper::TIME_IN_MINUTES;
echo TimeHelper::secondsToTime(87, $format) . PHP_EOL;

echo "\nDone.\n";

