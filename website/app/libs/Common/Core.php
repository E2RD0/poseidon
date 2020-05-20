<?php
namespace Common;

class Core
{
    /*Map url /controller/method/parameter*/
    protected $currentController = 'paginas';
    protected $currentMethod = "index" ;
    protected $parametros = [];

    public function __construct(){
        $url = $this -> getUrl();
    }
    public function getUrl(){
        echo $_GET['url'];
    }
}
