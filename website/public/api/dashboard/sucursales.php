<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Branch.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $branchController = new \Branch;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'show':
                $result = $branchController->showBranches($result);
                break;
            case 'readOne':
                $result = $branchController->readOne($_POST, $result);
                break;
            case 'create':
                $result = $branchController->create($_POST, $result);
                break;
            case 'update':
                $result = $branchController->update($_POST, $result);
                break;
            case 'delete':
                $result = $branchController->delete($_POST, $result);
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
