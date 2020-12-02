<?php

use FC\Helpers\DateHelper;

require __DIR__ . "/../vendor/autoload.php";

echo "2020-09-03 Europe/Paris\t\t";
echo DateHelper::utcTimeDifference('2020-09-03', 'Europe/Paris') . PHP_EOL;

echo "2020-12-28 Europe/Paris\t\t";
echo DateHelper::utcTimeDifference('2020-12-28', 'Europe/Paris') . PHP_EOL;

echo "2020-12-28 America/Chicago\t";
echo DateHelper::utcTimeDifference('2020-12-28', 'America/Chicago') . PHP_EOL;

echo "2020-12-28 Unknown/Unknown\t";
echo DateHelper::utcTimeDifference('2020-12-28', 'Unknown/Unknown') . PHP_EOL;

echo "9999-99-99 America/New_York\t";
echo DateHelper::utcTimeDifference('9999-99-99', 'America/New_York') . PHP_EOL;

echo "\nDone.\n";

