<?php
class Dashboard extends \Common\Controller{

  public function __construct(){
  }
  public function index(){
      $this->loadView('dashboard', 'dashboard');
  }
  public function usuarios(){
      $this->loadView('dashboard', 'usuarios');
  }
  public function categorias(){
      $this->loadView('dashboard', 'categorias');
  }
}
