<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Users.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $userController = new \Users;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'logout':
                $result = $userController->userLogout($result);
                break;
            case 'type':
                $result = $userController->showTypes($result);
                break;
            case 'show':
                $result = $userController->showUsers($result);
                break;
            case 'readOne':
                $result = $userController->readOne($_POST, $result);
                break;
            case 'create':
                $result = $userController->create($_POST, $result);
                break;
            case 'update':
                $result = $userController->update($_POST, $result);
                break;
            case 'delete':
                $result = $userController->delete($_POST, $result);
                break;
            case 'info':
                $result = $userController->getUserInfo($_SESSION['user_id'], $result);
                break;
            case 'updateUser':
                $result = $userController->updateUser($_POST, $result);
                break;
            case 'getSidebar':
                $result = $userController->getSidebarStatus($result);
                break;
            case 'setSidebar':
                $result = $userController->setSidebarStatus($_POST ,$result);
                break;
            case 'reporte':
                $result = $userController->reporteUsuarios($_POST, $result);
                break;
            case '2fa':
                $result = $userController->twoFactorAuth($_POST, $result, false);
                break;
            case 'save2fa':
                $result = $userController->save2fa($_POST['secret'], $_SESSION['user_id'], $result);
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
            case 'recoverPassword':
                $result = $userController->userRecoverPassword($_POST, $result);
                break;
            case 'recoverCode':
                $result = $userController->userRecoverCode($_POST, $result);
                break;
            case 'newPassword':
                $result = $userController->newPassword($_POST, $result);
                break;
            case 'logout':
                $result = ['status' => -9, 'message' => null, 'exception' => null, 'errors' => []];
                break;
            case '2fa':
                $result = $userController->twoFactorAuth($_POST, $result);
                break;
            case '2fa-login':
                $result = $userController->twoFactorAuthLogin($_POST, $result);
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
