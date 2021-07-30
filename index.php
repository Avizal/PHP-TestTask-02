<?php

if (is_file('config.php')) {
	require_once('config.php');
} else {
    exit('Not exist file config.php');
}

if (is_file(DIR_SYSTEM . 'startup.php')) {
	require_once(DIR_SYSTEM . 'startup.php');
} else {
    exit('Not exist file startup.php');
}

if (DISPLAY_TIME) { $time_start = microtime(); }

$controller->start();

if (DISPLAY_TIME) { 
    $finish_start = microtime();

    echo PHP_EOL . 'Start time: ' . $time_start . PHP_EOL;
    echo PHP_EOL . 'Finish time: ' . $finish_start . PHP_EOL; 
    echo PHP_EOL . 'Result time: ' . ($finish_start - $time_start) . PHP_EOL; 
}