<?php
class Root extends \Common\Controller{

  public function __construct(){
      //$this->usersModel = $this->loadModel('Usuario');
  }
  public function index(){
      Helpers\Url::redirect('user/login');
  }
}
