<?php

require_once __DIR__.'/../../../app/init.php';
require_once __DIR__.'/../../../app/controllers/Clients.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $controller = new \Clients();
    $result = ['status' => 0, 'message' => null, 'exception' => null, 'errors' => []];

        if (isset($_SESSION['client_id'])) {
            if (boolval($controller->checkIfOnline($_SESSION['client_email'])) == true) {
                switch ($action) {
                    case 'logout':
                        $result = $controller->clientLogout($result);
                        break;
                    case 'info':
                        $result = $controller->getClientInfo($_SESSION['client_id'], $result);
                        break;
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
                    case 'getOrders':
                        $result = $controller->getOrders($_SESSION['client_id'], $result);
                        break;
                    case 'factura':
                        $result = $controller->factura($_POST, $result);
                        break;
                    case '2fa':
                        $result = $controller->twoFactorAuth($_POST, $result, false);
                        break;
                    case 'save2fa':
                        $result = $controller->save2fa($_POST['secret'], $_SESSION['client_id'], $result);
                        break;
                    default:
                        \Common\Core::http404();
                }
            } else {
                $result = $controller->clientLogout($result);
            }
        } else {
            switch ($action) {
                case 'register':
                    $result = $controller->clientRegister($_POST, $result);
                    break;
                case 'login':
                    $result = $controller->clientLogin($_POST, $result);
                    break;
                case 'recoverPassword':
                    $result = $controller->clientRecoverPassword($_POST, $result);
                    break;
                case 'recoverCode':
                    $result = $controller->clientRecoverCode($_POST, $result);
                    break;
                case '2fa':
                    $result = $controller->twoFactorAuth($_POST, $result);
                    break;
                case '2fa-login':
                    $result = $controller->twoFactorAuthLogin($_POST, $result);
                    break;
                case 'logout':
                    $result = ['status' => -9, 'message' => null, 'exception' => null, 'errors' => []];
                    break;
                default:
                    \Common\Core::http404();
            }
        }
    header('content-type: application/json; charset=utf-8');
    echo json_encode($result);
} else {
    \Common\Core::http404();
}
