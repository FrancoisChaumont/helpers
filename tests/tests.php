<?php

require __DIR__ . "/../vendor/autoload.php";

$array = [ 
    "Hello" => "World",
    "Bonjour" => "le Monde"
];

\FC\Helpers\DebugHelper::var_export($array);

$r = \FC\Helpers\DebugHelper::var_dump_to_var($array);
echo $r;


