<?php
class User extends \Common\Controller
{
    public function __construct()
    {
    }

    public function register()
    {
        $this->loadView('store', 'registro', -1);
    }

    public function login()
    {
        $this->loadView('store', 'iniciarSesion', -1);
    }

    public function dashboard()
    {
        $this->loadView('store', 'dashboard');
    }

    public function recoverPassword()
    {
        $this->loadView('dashboard', 'enviar-correo', -1);
    }
    public function recoverCode($emailParameter)
    {
        DEFINE('EMAIL', $emailParameter);
        $this->loadView('dashboard', 'ingresar-codigo', -1);
    }
    public function newPassword()
    {
        $this->loadView('dashboard', 'recuperar-clave', -1);
    }
}
