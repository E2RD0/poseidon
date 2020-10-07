<?php

namespace Common;

//base class for controllers; it loads models and views
class Controller
{
    //load a model
    public function loadModel($nameModel)
    {
        require_once __DIR__ . '/../../models/' . $nameModel . '.php';
        return new $nameModel();
    }

    public function loadView($context, $nameView, $loginRequired = true, $data = [])
    {
        $pathFile = __DIR__ . '/../../views/' . $context . '/' . $nameView . '.php';
        if (file_exists($pathFile)) {
            session_start();
            $loggedInAdmin = isset($_SESSION['user_id']);
            $loggedInClient = isset($_SESSION['client_id']);
            if ($context == 'dashboard') {
                $_SESSION['user_lg_att'] = 0;
                if ($loginRequired) {
                    if (!$loggedInAdmin) {
                        \Helpers\Url::redirect('admin/user/login');
                    }
                } else {
                    if ($loggedInAdmin) {

                        \Helpers\Url::redirect('admin/dashboard');
                    }
                }
            } else {
                $_SESSION['client_lg_att'] = 0;
                if ($loginRequired === true) {
                    if (!$loggedInClient) {
                        \Helpers\Url::redirect('store/user/login');
                    }
                } elseif ($loginRequired === -1) {
                    if ($loggedInClient) {

                        \Helpers\Url::redirect('store/user/dashboard');
                    }
                }
            }
            require_once $pathFile;
        } else {
            Core::http404();
        }
    }
}
