<?php

class htmlSections {
    public static function getHeader($title) {
        echo '<!doctype html>
        <html lang="es">
        
        <head>
        <meta charset="utf-8">
        <title>'.$title.'</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        </head>
        
        <body>
        <!--[if IE]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        
        <header class="header-main header-main--normal">
            <nav class="container-fluid navbar navbar--main navbar--normal">
            <div class="container">
            <a href="#" class="navbar-brand"><img class="navbar__logo d-inline-block align-top" src="img/logo.svg" alt="Logo de Poseidón"></a>
        
            <div class="burger-container">
            <div id="burger">
                <div class="bar topBar"></div>
                <div class="bar btmBar"></div>
                <div class="bar lastBar"></div>
            </div>
            </div>
        
        
            <ul class="navbar__links">
            <li><a href="#">Tablas</a></li>
            <li><a href="#">Ropa</a></li>
            <li><a href="#">Accesorios</a></li>
            </ul>
        
            <ul class="navbar__links navbar__icons">
            <li><a href="#"><img src="img/icons/search.svg"></a></li>
            <li><a href="#"><img src="img/icons/cart.svg"></a></li>
            <li><a href="#"><img src="img/icons/user.svg"></a></li>
            </ul>
            </div>
            </nav>
        </header>';
    }

    public static function getFooter($title) {}
}