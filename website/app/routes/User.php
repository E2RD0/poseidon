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
}
