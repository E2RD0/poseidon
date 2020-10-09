<?php
class User extends \Common\Controller
{
    public function __construct()
    {
         $this->model = $this->loadModel('Usuario');
    }

    public function register()
    {

        if($this->model->userCount()==0){
            $this->loadView('dashboard', 'registro', false);
        }
        else {
            Core::http404();
        }
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
