<?php

require_once __DIR__ . '/../../../app/init.php';
require_once __DIR__ . '/../../../app/controllers/Categories.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $categoriesController = new \Categories;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors'=> []);


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'show':
                $result = $categoriesController->showCategories($result);
                break;
            case 'readOne':
                $result = $categoriesController->readOne($_POST, $result);
                break;
            case 'create':
                $result = $categoriesController->create($_POST, $result);
                break;
            case 'update':
                $result = $categoriesController->update($_POST, $result);
                break;
            case 'delete':
                $result = $categoriesController->delete($_POST, $result);
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
