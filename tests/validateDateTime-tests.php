<?php

use FC\Helpers\ValidationHelper;

require __DIR__ . "/../vendor/autoload.php";

// Format list available here:
// http://php.net/manual/en/function.date.php
// http://php.net/manual/en/class.datetimeinterface.php#datetime.constants.types
// http://php.net/manual/en/datetime.createfromformat.php

var_dump(ValidationHelper::validateDateTime('2012-02-28 12:12:12')); # true
var_dump(ValidationHelper::validateDateTime('2012-02-30 12:12:12')); # false
var_dump(ValidationHelper::validateDateTime('2012-02-28', 'Y-m-d')); # true
var_dump(ValidationHelper::validateDateTime('28/02/2012', 'd/m/Y')); # true
var_dump(ValidationHelper::validateDateTime('30/02/2012', 'd/m/Y')); # false
var_dump(ValidationHelper::validateDateTime('14:50', 'H:i')); # true
var_dump(ValidationHelper::validateDateTime('14:77', 'H:i')); # false
var_dump(ValidationHelper::validateDateTime(14, 'H')); # true
var_dump(ValidationHelper::validateDateTime('14', 'H')); # true

var_dump(ValidationHelper::validateDateTime('2012-02-28T12:12:12+02:00', 'Y-m-d\TH:i:sP')); # true
var_dump(ValidationHelper::validateDateTime('2012-02-28T12:12:12+02:00', DateTime::ATOM)); # true

var_dump(ValidationHelper::validateDateTime('Tue, 28 Feb 2012 12:12:12 +0200', 'D, d M Y H:i:s O')); # true
var_dump(ValidationHelper::validateDateTime('Tue, 28 Feb 2012 12:12:12 +0200', DateTime::RSS)); # true
var_dump(ValidationHelper::validateDateTime('Tue, 27 Feb 2012 12:12:12 +0200', DateTime::RSS)); # false

echo "\nDone.\n";

