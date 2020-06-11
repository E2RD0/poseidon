<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Reviews.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $rentalsController = new \Reviews;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'reviews':
                $result = $rentalsController->getProductReviews($_POST, $result);
                break;
            case 'productReviewData':
                $result = $rentalsController->getProductReviewData($_POST, $result);
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
