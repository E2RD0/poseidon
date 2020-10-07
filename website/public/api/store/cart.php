<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Orders.php';
require_once __DIR__ . '/../../../app/controllers/Clients.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $controller = new \Orders;
    $client = new \Clients;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);

    if (isset($_SESSION['client_id'])) {
        if (boolval($client->checkIfOnline($_SESSION['client_email'])) == true) {
            $client_id = array('idcliente' => $_SESSION['client_id']);
            $data = array_merge($_POST, $client_id);
            switch ($action) {
                case 'createDetail':
                    $result = $controller->createDetail($data, $result);
                    break;
                case 'readCart':
                    $result = $controller->readCart($client_id, $result);
                    break;
                case 'updateDetail':
                    $result = $controller->updateDetail($data, $result);
                    break;
                case 'delete':
                    $result = $controller->deleteDetail($data, $result);
                    break;
                case 'finishOrder':
                    $result = $controller->finishOrder($data, $result);
                    break;
                case 'getAddress':
                    $result = $controller->getAddress($client_id, $result);
                    break;
                default:
                    \Common\Core::http404();
            }
        } else {
            $result = $client->clientLogout($result);
        }
    } else {
        $result['exception'] = 'Debes iniciar sesión para agregar el producto al carrito';
        $result['status'] = -1;
    }
    header('content-type: application/json; charset=utf-8');
    echo json_encode($result);
} else {
    \Common\Core::http404();
}
