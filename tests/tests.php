<?php

require __DIR__ . "/../vendor/autoload.php";

$array = [ 
    "Hello" => "World",
    "Bonjour" => "le Monde"
];

\FC\DebugHelper::var_export($array);

$r = \FC\DebugHelper::var_dump_to_var($array);
echo $r;


