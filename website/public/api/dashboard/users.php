<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Users.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $userController = new \Users;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);


    if (isset($_SESSION['id_usuario'])) {
        switch ($action) {
            case 'logout':
                echo "string";
                break;
            default:
                \Common\Core::http404();
        }
    }
    else {
        switch ($action) {
            case 'userCount':
                $result = $userController->userCount($result);
                break;
            case 'register':
                $result = $userController->userRegister($_POST, $result);
                break;
            case 'login':
                $result = $userController->userLogin($_POST, $result);
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
