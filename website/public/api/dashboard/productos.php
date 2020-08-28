<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Products.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $productsController = new \Products;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'show':
                $result = $productsController->showProducts($result);
                break;
            case 'create':
                $result = $productsController->create($_POST, $result);
                break;
            case 'productQuantities':
                $result = $productsController->getProductQuantities($result);
                break;
            case 'delete':
                $result = $productsController->delete($_POST, $result);
                break;
            case 'mostSold':
                $result = $productsController->mostSoldChart($_POST, $result);
                break;
            case 'productsByCategory':
                $result = $productsController->productsByCategoryChart($_POST, $result);
                break;
            case 'masvendidos':
                $result = $controller->reporteProductosMasVendidos($_POST, $result);
                break;
            case 'productos':
                $result = $controller->reporteProductos($_POST, $result);
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
