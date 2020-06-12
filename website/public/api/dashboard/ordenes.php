<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Orders.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $ordersController = new \Orders;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'show':
                $result = $ordersController->showOrders($result);
                break;
            case 'orderCount':
                $result = $ordersController->getOrdersCount($result);
                break;
            case 'generalDetails':
                $result = $ordersController->getOrderGeneralDetails($_POST, $result);
                break;
            case 'specificDetails':
                $result = $ordersController->getOrderDetails($_POST, $result);
                break;
            case 'recentOrders':
                $result = $ordersController->getRecentOrders($result);
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