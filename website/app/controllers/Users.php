<?php
class Users{
  public $id;
  public $nombre;
  public $apellido;
  public $email;
  public $password;
  public $idTipo;


  public function __construct(){
      //echo 'Controlador usuarios';
  }
  public function index(){
  }
  private function login($user, $password){}
}
