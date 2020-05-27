<?php
class User extends \Common\Controller{

  public function __construct(){
      $this->usersModel = $this->loadModel('Usuario');
  }
  public function index(){
      $userCount = $this->usersModel->userCount();
      if(!$userCount>0){
          $this->loadView('dashboard', 'index');
      }
      else {
          $this->loadView('dashboard', 'registro');
      }
      /*
      foreach ($data['users'] as $user) {
          echo $user->nombre;
      }
      */
  }
  public function register(){
      $this->loadView('dashboard', 'registro');
  }
  public function login(){
      $this->loadView('dashboard', 'index');
  }
}
