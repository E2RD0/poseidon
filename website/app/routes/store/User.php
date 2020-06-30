<?php
class User extends \Common\Controller
{
    public function __construct()
    {
    }

    public function register()
    {
        $this->loadView('store', 'registro', false);
    }

    public function login()
    {
        $this->loadView('store', 'iniciarSesion', false);
    }

    public function recoverPassword()
    {
        $this->loadView('dashboard', 'enviar-correo', false);
    }
    public function recoverCode($emailParameter)
    {
        DEFINE('EMAIL', $emailParameter);
        $this->loadView('dashboard', 'ingresar-codigo', false);
    }
    public function newPassword()
    {
        $this->loadView('dashboard', 'recuperar-clave', false);
    }
}
