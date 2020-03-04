<?php

class dashboardTemplate
{
    public static function dashHead($title)
    {
        echo(
            '<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <meta name="theme-color" content="#171717">
                <title>'.$title. '</title>
                <link rel="manifest" href="site.webmanifest">
                <link rel="stylesheet" href="resources/css/all.min.css">
                <link rel="stylesheet" href="resources/webfonts/fonts.css">
                <link rel="stylesheet" href="resources/css/normalize.css">
                <link rel="stylesheet" href="resources/css/bootstrap.min.css">
                <link rel="stylesheet" href="resources/css/main.css">
                <link rel="stylesheet" href="resources/css/custom.css">
            </head>

            <body class="dash__body">
                <div class="wrapper">'
        );
    }

    public static function dashEnd()
    {
        echo('</div>
            </body>
            <script src="resources/js/vendor/jquery-3.4.1.min.js"></script>
            <script src="resources/js/vendor/bootstrap.bundle.min.js"></script>
            <script src="resources/js/plugins.js"></script>
            <script src="resources/js/main.js"></script>
            </html>'
        );
    }

    public static function dashMenu(){
        echo('<header>
                <div class="toggle">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="dash__sidebar">
                    <img src="resources/img/poseidon-l.svg" alt="Logo Poseidon" class="img-fluid dash__logo">
                    <ul class="">
                        <li class="active">
                            <a href="#">
                                <span class="icon">
                                    <object data="resources/img/dashboard.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Dashboard</p>
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <span class="icon">
                                    <object data="resources/img/ordenes.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Ordenes</p>
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <span class="icon">
                                    <object data="resources/img/alquileres.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Alquileres</p>
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <span class="icon">
                                    <object data="resources/img/sucursales.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Sucursales</p>
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <span class="icon">
                                    <object data="resources/img/categorias.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Categorías</p>
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <span class="icon">
                                    <object data="resources/img/productos.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Productos</p>
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <span class="icon">
                                    <object data="resources/img/clientes.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Clientes</p>
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <span class="icon">
                                    <object data="resources/img/usuarios.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Usuarios</p>
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <span class="icon">
                                    <object data="resources/img/ajustes.svg" type="image/svg+xml"></object>
                                </span>
                                <span class="title">
                                    <p>Ajustes</p>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="div-transparent"></div>
                    <div class="dash__footer">
                        <ul>
                            <li>
                                <a href="">
                                    <span class="icon">
                                        <object data="resources/img/cuenta.svg" type="image/svg+xml"></object>
                                    </span>
                                    <span class="title">
                                        <p>Nombre de usuario</p>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon">
                                        <object data="resources/img/logout.svg" type="image/svg+xml"></object>
                                    </span>
                                    <span class="title">
                                        <p>Cerrar sesión</p>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>');
    }
}
