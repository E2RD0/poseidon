<?php
class Users extends \Common\Controller{

  public function __construct(){
      $this->usersModel = $this->loadModel('Usuario');
  }
  public function index(){
      $users = $this->usersModel->getUsers();
      $data = [
          'users' => $users
      ];
      //$this->loadView('dashboard', 'usuarios', $data);
      /*
      foreach ($data['users'] as $user) {
          echo $user->nombre;
      }
      */
  }
  private function login($user, $password){}
}
