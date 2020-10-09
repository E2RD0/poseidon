<?php
class User extends \Common\Controller
{
    public function __construct()
    {
    }

    public function register()
    {
        $this->loadView('dashboard', 'registro', false);
    }

    public function login()
    {
        $this->loadView('dashboard', 'index', false);
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
        if(isset($_COOKIE['email'])) {
            $this->loadView('dashboard', 'recuperar-clave', false);
        }
        else {
            Core::http404();
        }
    }
}
