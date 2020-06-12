<?php
class Dashboard extends \Common\Controller{

  public function __construct(){
  }
  public function index(){
      $this->loadView('dashboard', 'dashboard');
  }
  public function ordenes(){
      $this->loadView('dashboard', 'ordenes');
  }
  public function alquileres(){
      $this->loadView('dashboard', 'alquileres');
  }
  public function sucursales(){
      $this->loadView('dashboard', 'sucursales');
  }
  public function categorias(){
      $this->loadView('dashboard', 'categorias');
  }
  public function productos(){
      $this->loadView('dashboard', 'productos');
  }
  public function clientes(){
      $this->loadView('dashboard', 'clientes');
  }
  public function usuarios(){
      $this->loadView('dashboard', 'usuarios');
  }
  public function opcionesgenerales(){
      $this->loadView('dashboard', 'opcionesgenerales');
  }
  public function user(){
      $this->loadView('dashboard', 'user');
  }
}
