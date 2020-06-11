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
  public function opcionesgenerales(){
      $this->loadView('dashboard', 'opcionesgenerales');
  }
  public function ordenes(){
      $this->loadView('dashboard', 'ordenes');
  }
  public function alquileres(){
      $this->loadView('dashboard', 'alquileres');
  }
  public function productos(){
      $this->loadView('dashboard', 'productos');
  }
}
