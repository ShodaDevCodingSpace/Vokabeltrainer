<?php

error_reporting(E_ALL ^ E_WARNING && E_NOTICE);

include_once '../system.php';
//include_once BASE_PATH.'vendor/autoload.php';

//include_once BASE_PATH.'app/functions/autoload.php';

define('SYSTEM_END', round(microtime(true) - SYSTEM_START,4));

include_once BASE_PATH.'app/ConnectDB.php';

$db = new MySQL();
$mysql = $db->getConnection();

include_once BASE_PATH.'router/index.php';
