<?php
class Root extends \Common\Controller{

  public function __construct(){
  }
  public function index(){
      $data = [
          'test' => 'funciona'
      ];
      $this->loadView('dashboard', 'index', $data);
  }
}
