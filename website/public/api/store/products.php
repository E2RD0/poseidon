<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Products.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $productsController = new \Products;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);


    if (isset($_SESSION['client_id'])) {
        switch ($action) {
            case 'show':
                $result = $productsController->showProducts($result);
                break;
            case 'showFeatured':
                $result = $productsController->showFeaturedProducts($result);
                break;
            case 'info':
                $result = $productsController->getProductInfo($result);
                break;
            case 'reviews':
                $result = $productsController->getReviewsProduct($_POST, $result);
                break;
            case 'reviewsInfo':
                $result = $productsController->getReviewsInfo($_POST, $result);
                break;
            case 'newReview':
                $result = $productsController->newReview($_POST, $result);
                break;
            default:
                \Common\Core::http404();
        }
    }
    else{
        switch ($action) {
            case 'show':
                $result = $productsController->showProducts($result);
                break;
            case 'showFeatured':
                $result = $productsController->showFeaturedProducts($result);
                break;
            case 'info':
                $result = $productsController->getProductInfo($result);
                break;
            case 'reviews':
                $result = $productsController->getReviewsProduct($_POST, $result);
                break;
            case 'reviewsInfo':
                $result = $productsController->getReviewsInfo($_POST, $result);
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
