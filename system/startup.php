<?php

if (is_file(DIR_CLASS . 'registry.php')) {
	require_once(DIR_CLASS . 'registry.php');
} else {
    exit('Not exist file registry.php');
}

if (is_file(DIR_CLASS . 'db.php')) {
	require_once(DIR_CLASS . 'db.php');
} else {
    exit('Not exist file db.php');
}

if (is_file(DIR_CLASS . 'controller.php')) {
	require_once(DIR_CLASS . 'controller.php');
} else {
    exit('Not exist file controller.php');
}

$registry = new Registry();

$db = new DB(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
$registry->set('db', $db);

$controller = new Controller($registry);
$registry->set('controller', $controller);
