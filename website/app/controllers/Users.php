<?php
class Users extends \Common\Controller{

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

  public function userCount($result){
    if ($this->usersModel->userCount()) {
        $result['status'] = 1;
        $result['message'] = 'Existe al menos un usuario registrado';
    }
    else {
        $result['exception'] = 'No existen usuarios registrados';
    }
    return $result;
  }

  private function login($user, $password){}
}
