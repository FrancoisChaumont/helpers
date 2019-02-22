<?php 

// NOTE: 
    // - iTunes lookup: https://itunes.apple.com/lookup?id=xxx&media=software
    // - iTunes lookup documentation: https://affiliate.itunes.apple.com/resources/documentation/itunes-store-web-service-search-api/#lookup
    // - Android app lookup: https://play.google.com/store/apps/details?id=xxx
    // - Android app ID documentation: https://developer.android.com/studio/build/application-id
    
use FC\Helpers\ValidationHelper;

require __DIR__ . "/../vendor/autoload.php";

$ids = [
    // valid Android
    "m.u.d.c",
    "me.unfollowers.droid",
    "me_.unfollowers.droid",
    "me.unfo11llowers.droid",
    "me11.unfollowers.droid",
    "m11e.unfollowers.droid",
    "me.unfollowers23.droid",
    "me.unfollowers.droid23d",
    "me.unfollowers_.droid",
    "me.unfollowers.droid_",
    "me.unfollowers.droid32",
    // valid iOS
    "1",
    "12",
    "123",
    "1234567890",
    "1234567890123456789",

    // invalid Android or iOS
    "me._unfollowers.droid",
    "1me.unfollowers.droid",
    "me.unfollowers._droid",
    "me.unfollowers_._droid",
    "me.unfollowers.droid/",
    "me:.unfollowers.droid",
    ":me.unfollowers.droid",
    "me.unfollowers.dro;id",
    "me.unfollowe^rs.droid",
    "me.unfollowers.droid.",
    "me.unfollowers..droid",
    "me.unfollowers.droid._",
    "me.unfollowers.11212",
    "me.1.unfollowers.11212",
    "me..unfollowers.11212",
    "abc",
    "abc.",
    ".abc",
    "12345678901234567890",
    "123456789012345678901234"
];

echo "Check Android app IDs:\n";

foreach ($ids as $appId) {
    if (ValidationHelper::isAndroidAppId($appId)) {
        echo '✔' . "\t" . $appId . PHP_EOL;
    } else {
        echo '✘' . "\t" . $appId . PHP_EOL;
    }
}

echo PHP_EOL;
echo "Check iOS app IDs:\n";

foreach ($ids as $appId) {
    if (ValidationHelper::isIosAppId($appId)) {
        echo '✔' . "\t" . $appId . PHP_EOL;
    } else {
        echo '✘' . "\t" . $appId . PHP_EOL;
    }
}

echo "\nDone.\n";

