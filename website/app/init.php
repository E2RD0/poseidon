<?php

//Load libreries and dependencies
require __DIR__ . '/libs/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Valitron\Validator::langDir(__DIR__.'/libs/vendor/vlucas/valitron/lang');
Valitron\Validator::lang('es');

/*echo  $_ENV['DB_USER'];

$db = new Common\Database;
echo $db->test;*/
