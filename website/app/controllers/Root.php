<?php
class Root extends \Common\Controller{

  public function __construct(){
      $this->loadView('dashboard', 'index');
  }
  public function index(){
  }
}
