<?php

//Load libreries and dependencies
require __DIR__ . '/libs/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_NAME', $_ENV['DB_NAME']);
define('HOME_PATH', $_ENV['HOME_PATH']);

Valitron\Validator::langDir(__DIR__.'/libs/vendor/vlucas/valitron/lang');
Valitron\Validator::lang('es');



/*echo  $_ENV['DB_USER'];

$db = new Common\Database;
echo $db->test;*/
