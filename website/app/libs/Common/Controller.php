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

     public function loadView($context, $nameView){
         $pathFile = __DIR__ . '/../../views/' . $context . '/' . $nameView . '.php';
         if(file_exists($pathFile)){
             require_once $pathFile;
         }
         else{
             Core::http404();
         }
     }
 }
