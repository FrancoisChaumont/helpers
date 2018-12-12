<?php

use FC\Helpers\DebugHelper;

require __DIR__ . "/../vendor/autoload.php";

$array = [ 
    "Hello" => "World",
    "Bonjour" => "le Monde"
];
DebugHelper::var_export($array);

echo PHP_EOL;

$r = DebugHelper::var_dump_to_var($array);
echo $r;

echo "\nDone.\n";
