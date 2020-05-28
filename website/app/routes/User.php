<?php
class User extends \Common\Controller{

  public function __construct(){
      $this->usersModel = $this->loadModel('Usuario');
  }
  public function index(){
      $this->login();
      /*$userCount = $this->usersModel->userCount();
      if(!$userCount>0){
          $this->loadView('dashboard', 'index');
      }
      else {
          $this->loadView('dashboard', 'registro');
      }*/
  }
  public function register(){
      $this->loadView('dashboard', 'registro');
  }
  public function login(){
      $this->loadView('dashboard', 'index');
  }
}
