<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Rentals.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $rentalsController = new \Rentals;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'show':
                $result = $rentalsController->showRentals($result);
                break;
            case 'generalDetails':
                $result = $rentalsController->getRentalGeneralDetails($_POST, $result);
                break;
            case 'specificDetails':
                $result = $rentalsController->getRentalDetails($_POST, $result);
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
