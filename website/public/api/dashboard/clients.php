<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Clients.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $controller = new \Clients;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'show':
                $result = $controller->show($result);
                break;
            case 'type':
                $result = $controller->showTypes($result);
                break;
            case 'readOne':
                $result = $controller->readOne($_POST, $result);
                break;
            case 'update':
                $result = $controller->update($_POST, $result);
                break;
            case 'changeState':
                $result = $controller->changeState($_POST, $result);
                break;
            default:
                \Common\Core::http404();
        }
    }
    header('content-type: application/json; charset=utf-8');
	echo json_encode($result);
}
else {
    \Common\Core::http404();
}
