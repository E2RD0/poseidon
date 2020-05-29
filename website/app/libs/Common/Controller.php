<?php
namespace Common;

//base class for controllers; it loads models and views
 class Controller
 {
     //load a model
     public function loadModel($nameModel){
         require_once __DIR__ . '/../../models/' . $nameModel . '.php';
         return new $nameModel();
     }

     public function loadView($context, $nameView, $loginRequired = true, $data = []){
         $pathFile = __DIR__ . '/../../views/' . $context . '/' . $nameView . '.php';
         if(file_exists($pathFile)){
             session_start();
             $loggedIn = isset($_SESSION['user_id']);
             if($loginRequired){
                 if (!$loggedIn){
                     \Helpers\Url::redirect('user/login');
                 }
             }
             else{
                 if($loggedIn){
                     \Helpers\Url::redirect('dashboard');
                 }
             }
             require_once $pathFile;
         }
         else{
             Core::http404();
         }
     }
 }
