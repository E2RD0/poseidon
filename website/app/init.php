<?php

//Load libreries and dependencies
require __DIR__ . '/libs/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/*echo  $_ENV['DB_USER'];

$db = new Common\Database;
echo $db->test;*/
