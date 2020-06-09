<?php

class dashboardTemplate
{
    public static function dashHead($title)
    {
        echo ('<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <meta name="theme-color" content="#171717">
                <title>' . $title . '</title>
                <link rel="manifest" href="site.webmanifest">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/all.min.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/webfonts/fonts-dashboard.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/normalize.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/bootstrap.min.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/Chart.min.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/datatables.min.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/basic.min.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/dropzone.min.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/dashboard.css">
            </head>

            <body class="dash__body">
                <div class="wrapper">');
    }

    public static function dashEnd($ajax)
    {
        echo ('</div>
            </body>
            <script src="' . HOME_PATH . 'resources/js/vendor/jquery-3.4.1.min.js"></script>
            <script src="' . HOME_PATH . 'resources/js/vendor/bootstrap.bundle.min.js"></script>
            <script src="' . HOME_PATH . 'resources/js/vendor/Chart.bundle.min.js"></script>
            <script src="' . HOME_PATH . 'resources/js/vendor/datatables.min.js"></script>
            <script src="' . HOME_PATH . 'resources/js/plugins.js"></script>
            <script src="' . HOME_PATH . 'resources/js/vendor/dropzone.min.js"></script>
            <script src="' . HOME_PATH . 'resources/js/dashboard.js"></script>
            <script src="' . HOME_PATH . 'resources/js/vendor/sweetalert2.all.min.js"></script>
            <script> var HOME_PATH = "'. HOME_PATH .'" </script>
            <script src="' . HOME_PATH . 'resources/js/components.js"></script>
            <script src="' . HOME_PATH . 'resources/js/ajax/account.js"></script>
            <script src="' . HOME_PATH . 'resources/js/ajax/' .$ajax.'"></script>
            </html>');
    }

    public static function dashMenu($page)
    {
        echo ('<header>
                <div class="dash__sidebar">
                    <div class="toggle">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <a href="dashboard.php">
                        <img src="' . HOME_PATH . 'resources/img/dashboard/poseidon-l.svg" alt="Logo Poseidon" class="img-fluid dash__logo">
                    </a>
                    <ul class="">' .
                        (($page == 'dashboard') ? '<li class="active">' : '<li class="">') . '
                            <a href="'. HOME_PATH . 'dashboard">
                                <span class="icon">
                                    <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 33" style="enable-background:new 0 0 33 33;" xml:space="preserve" width="33" height="33">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <rect class="st0" x="17.9" width="15.1" height="10.5" />
                                        <polygon class="st0" points="0,19.7 15.1,19.7 15.1,13.3 15.1,10.5 15.1,0 0,0 	" />
                                        <rect class="st0" x="17.9" y="13.3" width="15.1" height="19.7" />
                                        <rect class="st0" y="22.5" width="15.1" height="10.5" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Dashboard</p>
                                </span>
                            </a>
                        </li>' .
                        (($page == 'ordenes') ? '<li class="active">' : '<li class="">') . '
                            <a href="'. HOME_PATH . 'dashboard/ordenes">
                                <span class="icon">
                                    <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 38.5" style="enable-background:new 0 0 33 38.5;" xml:space="preserve" width="30" height="38.5">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <path class="st0" d="M32.6,12.8c-0.2-0.3-0.6-0.5-1-0.5h-6.9V8.3C24.7,3.7,21,0,16.5,0S8.2,3.7,8.2,8.3v4.1H1.3c-0.4,0-0.8,0.2-1,0.5
                                                        C0.1,13.1,0,13.5,0,13.9l2.3,19.7c0.3,2.8,2.6,4.9,5.5,4.9h17.4c2.8,0,5.2-2.1,5.5-4.9L33,13.9C33,13.5,32.9,13.1,32.6,12.8z
                                                        M11,8.3c0-3,2.5-5.5,5.5-5.5S22,5.2,22,8.3v4.1H11V8.3z M9.6,17.9c-0.8,0-1.4-0.6-1.4-1.4c0-0.8,0.6-1.4,1.4-1.4
                                                        c0.8,0,1.4,0.6,1.4,1.4C11,17.3,10.4,17.9,9.6,17.9z M23.1,22.8l-5.1,8c-0.7,1.1-2,1.1-2.7,0.3l-3.9-4c-0.6-0.6-0.5-1.4,0-2
                                                        c0.5-0.5,1.2-0.5,1.8-0.1l3,2.2l4.7-5.9c0.5-0.6,1.3-0.7,1.9-0.2C23.4,21.4,23.5,22.2,23.1,22.8z M23.4,17.9c-0.8,0-1.4-0.6-1.4-1.4
                                                        c0-0.8,0.6-1.4,1.4-1.4c0.8,0,1.4,0.6,1.4,1.4C24.7,17.3,24.1,17.9,23.4,17.9z" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Ordenes</p>
                                </span>
                            </a>
                        </li>' .
                        (($page == 'alquileres') ? '<li class="active">' : '<li class="">') . '
                            <a href="'. HOME_PATH . 'dashboard/alquileres">
                                <span class="icon">
                                    <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 30.7" style="enable-background:new 0 0 33 30.7;" xml:space="preserve" width="33" height="30.7">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <path class="st0" d="M31.9,0H1.2C0.5,0,0,0.5,0,1.2v28.3c0,0.7,0.5,1.2,1.2,1.2s1.2-0.5,1.2-1.2V2.4H12V6H7.1C6.5,6,5.9,6.5,5.9,7.2v16.4
                                                        c0,0.7,0.5,1.2,1.2,1.2h23.5c0.7,0,1.2-0.5,1.2-1.2V7.1c0-0.7-0.5-1.2-1.2-1.2h-4.9V2.4h6.1c0.7,0,1.2-0.5,1.2-1.2S32.5,0,31.9,0
                                                        L31.9,0z M27.3,15.4c0,0.5-0.4,0.9-0.9,0.9h-0.6V18c0,0.5-0.4,0.8-0.8,0.8c-0.5,0-0.8-0.3-0.8-0.8v-1.7H23V18
                                                        c0,0.5-0.4,0.8-0.8,0.8c-0.5,0-0.8-0.4-0.8-0.8v-1.7h-3.3c-0.4,1.6-1.9,2.9-3.7,2.9c-2.1,0-3.8-1.7-3.8-3.8s1.7-3.8,3.8-3.8
                                                        c1.8,0,3.3,1.2,3.7,2.9h8.4C26.9,14.4,27.3,14.8,27.3,15.4L27.3,15.4z M23.4,5.9h-9V2.4h9V5.9z" />
                                        <circle class="st0" cx="14.3" cy="15.4" r="1.9" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Alquileres</p>
                                </span>
                            </a>
                        </li>' .
                        (($page == 'sucursales') ? '<li class="active">' : '<li class="">') . '
                            <a href="'. HOME_PATH . 'dashboard/sucursales">
                                <span class="icon">
                                    <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 45.7" style="enable-background:new 0 0 33 45.7;" xml:space="preserve" width="33" height="34.95">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <path class="st0" d="M16.5,0L16.5,0C7.4,0,0,7.4,0,16.5c0,3.2,1,6.2,2.4,8.7l10.8,18.6c0.7,1.2,2,1.8,3.3,1.8c1.3,0,2.6-0.6,3.3-1.8l10.8-18.6
                                                        c1.4-2.5,2.4-5.5,2.4-8.7C33,7.4,25.6,0,16.5,0z M16.5,21.4c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6C22.5,18.7,19.8,21.4,16.5,21.4z" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Sucursales</p>
                                </span>
                            </a>
                        </li>' .
                        (($page == 'categorias') ? '<li class="active">' : '<li class="">') . '
                            <a href="'. HOME_PATH . 'dashboard/categorias">
                                <span class="icon">
                                    <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 50.2" style="enable-background:new 0 0 33 50.2;" xml:space="preserve" width="33" height="40.2">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <path class="st0" d="M3.3,10.5H1c-0.5,0-1,0.4-1,1v37.6c0,0.6,0.5,1,1,1h31c0.5,0,1-0.4,1-1V11.5c0-0.6-0.5-1-1-1h-2.3c0.1,0.4,0.1,0.8,0.1,1.2
                                                        v2.5c0,1.7-1.3,3-3,3H6.2c-1.6,0-3-1.3-3-3v-2.5C3.2,11.3,3.3,10.9,3.3,10.5z M15,24h13c0.6,0,1,0.4,1,1c0,0.5-0.4,1-1,1H15
                                                        c-0.5,0-1-0.5-1-1C14,24.4,14.4,24,15,24z M15,33.5h13c0.6,0,1,0.5,1,1s-0.4,1-1,1H15c-0.5,0-1-0.5-1-1S14.4,33.5,15,33.5z M15,43
                                                        h13c0.6,0,1,0.5,1,1c0,0.6-0.4,1-1,1H15c-0.5,0-1-0.4-1-1C14,43.5,14.4,43,15,43z M4.3,24c0.4-0.4,1-0.4,1.4,0L7,25.3l2.8-2.8
                                                        c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4l-3.5,3.5c-0.2,0.2-0.5,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3l-2.1-2C3.9,25,3.9,24.4,4.3,24
                                                        z M4.3,33.5c0.4-0.4,1-0.4,1.4,0L7,34.9l2.8-2.8c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4L7.7,37c-0.2,0.2-0.5,0.3-0.7,0.3
                                                        c-0.3,0-0.5-0.1-0.7-0.3l-2.1-2C3.9,34.5,3.9,33.9,4.3,33.5z M4.3,43c0.4-0.4,1-0.4,1.4,0L7,44.3l2.8-2.8c0.4-0.4,1-0.4,1.4,0
                                                        c0.4,0.4,0.4,1,0,1.4l-3.5,3.5c-0.2,0.2-0.5,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3l-2.1-2C3.9,44,3.9,43.4,4.3,43z" />
                                        <path class="st0" d="M17.1,0c-1.5-0.1-2.9,0.3-4,1.3s-1.7,2.4-1.7,3.8v0.4c0,1.1-0.9,2.1-2.1,2.1c-2.2,0-4.1,1.8-4.1,4.1v2.5c0,0.6,0.4,1,1,1
                                                        h20.7c0.5,0,1-0.4,1-1v-2.5c0-2.2-1.8-4.1-4.1-4.1c-1.1,0-2.1-0.9-2.1-2.1V5.2C21.8,2.6,19.7,0.3,17.1,0z" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Categorí­as</p>
                                </span>
                            </a>
                        </li>' .
                        (($page == 'productos') ? '<li class="active">' : '<li class="">') . '
                            <a href="productos.php">
                                <span class="icon">
                                    <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 33" style="enable-background:new 0 0 33 33;" xml:space="preserve" width="33" height="33">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <path class="st0" d="M7.7,29.1v2h5.9v-2H7.7z M15.7,18.3v-4.8c0-0.5-0.4-1-1-1h-1.6v1.5c0,0.5-0.4,1-1,1c-0.5,0-1-0.4-1-1v-1.5H9.6
                                                        c-0.5,0-1,0.4-1,1v4.8c0,0.5,0.4,1,1,1h5.2C15.3,19.3,15.7,18.8,15.7,18.3z M2.9,19.3V1c0-0.5,0.4-1,1-1h7v2.3c0,0.5,0.4,1,1,1
                                                        c0.5,0,1-0.4,1-1V0h7c0.5,0,1,0.4,1,1v4.8h-4.1c-0.5,0-1,0.4-1,1v3.9H7.7c-0.5,0-1,0.4-1,1v7.7L2.9,19.3z M28.4,7.7h-3.9
                                                        c0,0.5,0,1.2,0,1.7c0,0.5-0.4,1-1,1s-1-0.4-1-1c0-0.6,0-1.2,0-1.7h-3.9c-0.5,0-1,0.4-1,1v9.7c0,0.5,0.4,1,1,1h9.8c0.5,0,1-0.4,1-1
                                                        V8.6C29.4,8.1,28.9,7.7,28.4,7.7z M31.9,22.2v2.1c0,0.5-0.4,1-1,1h-9.5c-0.5,0-1-0.4-1-1v-2.1c0-0.5,0.4-1,1-1h3.8v1.4
                                                        c0,0.5,0.4,1,1,1c0.5,0,1-0.4,1-1v-1.4h3.8C31.5,21.2,31.9,21.6,31.9,22.2L31.9,22.2z M1.3,24.2v-2.1c0-0.5,0.4-1,1-1h15.3
                                                        c0.5,0,1,0.4,1,1v2.1c0,0.5-0.4,1-1,1H2.3C1.7,25.2,1.3,24.8,1.3,24.2z M19.4,29.1v2h5.9v-2H19.4z M31.1,29.1v2h1c0.5,0,1,0.4,1,1
                                                        c0,0.5-0.4,1-1,1H1c-0.5,0-1-0.4-1-1c0-0.5,0.4-1,1-1h1v-2H1c-0.5,0-1-0.4-1-1c0-0.5,0.4-1,1-1H32c0.5,0,1,0.4,1,1c0,0.5-0.4,1-1,1
                                                        H31.1z" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Productos</p>
                                </span>
                            </a>
                        </li>' .
                        (($page == 'clientes') ? '<li class="active">' : '<li class="">') . '
                            <a href="clientes.php">
                                <span class="icon">
                                    <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 28.8" style="enable-background:new 0 0 33 28.8;" xml:space="preserve" width="33" height="28.8">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <circle class="st0" cx="7.4" cy="4.8" r="4.8" />
                                        <path class="st0" d="M13.6,13.4c-0.9-1.5-2.5-2.5-4.4-2.5H5.6c-2.6,0-4.8,1.9-5.1,4.5L0,19.6c-0.1,0.6,0.3,1,0.8,1.2c2.1,0.5,4.3,0.7,6.6,0.7
                                                        c1.1,0,2.3-0.1,3.4-0.2l0.5-3.6C11.5,16,12.4,14.5,13.6,13.4z" />
                                        <path class="st0" d="M24.3,17.4l0.7,0l0.5-0.5c0.2-0.2,0.4-0.3,0.6-0.4c-0.8-1.8-2.6-3-4.7-3h-3.5c-2.6,0-4.8,1.9-5.1,4.5l-0.5,4.2
                                                        c-0.1,0.6,0.3,1,0.8,1.2c2.1,0.5,4.3,0.7,6.6,0.7c0.2,0,0.5,0,0.8,0c-0.2-0.9,0-1.9,0.6-2.6l0.5-0.5l0.1-0.7
                                                        C21.7,18.6,22.8,17.5,24.3,17.4z" />
                                        <circle class="st0" cx="19.6" cy="7.3" r="4.8" />
                                        <path class="st0" d="M32.7,22.3l-0.5-0.5c-0.2-0.2-0.3-0.5-0.3-0.8l-0.1-0.7c-0.1-0.7-0.6-1.3-1.4-1.4l-0.7-0.1c-0.3,0-0.6-0.1-0.8-0.3
                                                        L28.4,18c-0.6-0.5-1.4-0.5-1.9,0L26,18.5c-0.2,0.2-0.5,0.3-0.8,0.3l-0.7,0.1c-0.7,0.1-1.3,0.6-1.4,1.4L23,20.9
                                                        c0,0.3-0.1,0.6-0.3,0.8l-0.5,0.5c-0.5,0.6-0.5,1.4,0,1.9l0.5,0.5c0.2,0.2,0.3,0.5,0.3,0.8l0.1,0.7c0.1,0.7,0.6,1.3,1.4,1.4
                                                        l0.7,0.1c0.3,0,0.6,0.1,0.8,0.3l0.5,0.5c0.6,0.5,1.4,0.5,1.9,0l0.5-0.5c0.2-0.2,0.5-0.3,0.8-0.3l0.7-0.1c0.7-0.1,1.3-0.6,1.4-1.4
                                                        l0.1-0.7c0-0.3,0.1-0.6,0.3-0.8l0.5-0.5C33.1,23.6,33.1,22.8,32.7,22.3z M27.8,25.5v0.6c0,0.1,0,0.1-0.1,0.1h-0.6
                                                        c-0.1,0-0.1,0-0.1-0.1v-0.6c-0.6,0-1-0.5-1.1-1c0-0.1,0-0.1,0.1-0.1h0.6c0,0,0.1,0,0.1,0.1c0,0.2,0.2,0.3,0.4,0.3h0.5
                                                        c0.3,0,0.6-0.2,0.6-0.5c0-0.3-0.2-0.6-0.6-0.6h-0.3c-0.7,0-1.3-0.5-1.4-1.2c-0.1-0.7,0.5-1.4,1.1-1.5v-0.6c0-0.1,0-0.1,0.1-0.1
                                                        h0.6c0.1,0,0.1,0,0.1,0.1V21c0.6,0,1,0.5,1.1,1c0,0.1,0,0.1-0.1,0.1h-0.6c0,0-0.1,0-0.1-0.1c0-0.2-0.2-0.3-0.4-0.3h-0.5
                                                        c-0.3,0-0.6,0.2-0.6,0.5c0,0.3,0.2,0.6,0.6,0.6h0.4c0.8,0,1.4,0.7,1.3,1.5C28.9,24.9,28.4,25.4,27.8,25.5z" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Clientes</p>
                                </span>
                            </a>
                        </li>' .
                        (($page == 'usuarios') ? '<li class="active">' : '<li class="">') . '
                            <a href="usuarios.php">
                                <span class="icon">
                                    <svg version="1.1" class="icon__svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 32.8" style="enable-background:new 0 0 33 32.8;" xml:space="preserve" width="33" height="32.8">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <path class="st0" d="M16.6,0c4,0,7.4,3.3,7.4,7.4c0,4-3.4,7.4-7.4,7.4c-4.1,0-7.4-3.4-7.4-7.4C9.1,3.3,12.4,0,16.6,0z" />
                                        <path class="st0" d="M16.6,17.8c8.3,0,15,5.9,16.4,13.8c0.1,0.7-0.3,1.2-1,1.2H1c-0.6,0-1.1-0.6-1-1.2C1.4,23.7,8.3,17.8,16.6,17.8z" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Usuarios</p>
                                </span>
                            </a>
                        </li>' .
                        (($page == 'parametros') ? '<li class="active">' : '<li class="">') . '
                            <a href="parametros.php">
                                <span class="icon">
                                    <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 33" style="enable-background:new 0 0 33 33;" xml:space="preserve" width="33" height="33">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: #576271;
                                            }
                                        </style>
                                        <path class="st0" d="M14.4,0l-2.1,4.1l-1.9,0.6L6.2,3.1L3.1,6.2l1.7,4.3l-0.6,1.9L0,14.4v4.1l4.1,2.1c0.2,0.6,0.4,1.2,0.8,1.9l-1.9,4.3l3.1,3.1
                                                    l4.3-1.7l1.9,0.6l2.1,4.1h4.1l2.1-4.1c0.6-0.2,1.2-0.4,1.9-0.8l4.3,1.7l3.1-3.1l-1.7-4.3c0.2-0.6,0.6-1.2,0.8-1.9l3.9-1.9v-4.1
                                                    l-4.1-2.1c-0.2-0.6-0.4-1.2-0.8-1.9l1.9-4.3l-3.1-3.1l-4.3,1.7l-1.9-0.6L18.6,0L14.4,0L14.4,0z M16.5,10.3c3.5,0,6.2,2.7,6.2,6.2
                                                    s-2.7,6.2-6.2,6.2s-6.2-2.7-6.2-6.2S13,10.3,16.5,10.3z" />
                                    </svg>
                                </span>
                                <span class="title">
                                    <p>Parámetros</p>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="dash__footer">
                        <ul>' .
                        (($page == 'user') ? '<li class="active">' : '<li class="">') . '
                                <a href="user.php">
                                    <span class="icon">
                                        <svg class="icon__svg" width="33px" height="33px" data-name="Layer 2" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                                            <style type="text/css">
                                                .st0 {
                                                    fill-rule: evenodd;
                                                    clip-rule: evenodd;
                                                    fill: #576271;
                                                }
                                            </style>
                                            <path class="st0" d="m16 2a14.001 14.001 0 0 0 -10 23.8c0.33 0.33 0.67 0.64 1.03 0.94a10.427 10.427 0 0 0 1.13 0.85 13.957 13.957 0 0 0 15.68 0 10.427 10.427 0 0 0 1.1299 -0.85c0.36005-0.3 0.7-0.61 1.03-0.94a14.001 14.001 0 0 0 -10 -23.8zm9.6 21.2a10.021 10.021 0 0 0 -6.15 -6.58 5 5 0 1 0 -6.9 0 10.021 10.021 0 0 0 -6.15 6.58 12 12 0 1 1 19.2 0z" />
                                        </svg>
                                    </span>
                                    <span class="title">
                                        <p>Bryan</p>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void" onclick="logout();">
                                    <span class="icon">
                                        <svg class="icon__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33 33" style="enable-background:new 0 0 33 33;" xml:space="preserve" width="33" height="33">
                                            <style type="text/css">
                                                .st0 {
                                                    fill-rule: evenodd;
                                                    clip-rule: evenodd;
                                                    fill: #576271;
                                                }
                                            </style>
                                            <path class="st0" d="M0,6.4c0.1-0.3,0.1-0.6,0.2-0.9C0.9,2.4,3.7,0.1,6.9,0c0.9,0,1.9,0,2.8,0c1.6,0,2.8,1.2,2.8,2.8c0,1.5-1.2,2.8-2.7,2.9
                                                            c-0.8,0-1.7,0-2.5,0c-1.1,0-1.7,0.6-1.7,1.7c0,6.1,0,12.2,0,18.3c0,1.1,0.6,1.7,1.7,1.7c0.9,0,1.7,0,2.6,0c2,0.1,3.2,2.4,2.3,4.1
                                                            c-0.5,0.9-1.2,1.5-2.2,1.5c-1.2,0-2.5,0.1-3.7,0c-3.1-0.3-5.7-2.9-6.2-6c0-0.1,0-0.2-0.1-0.3C0,19.9,0,13.1,0,6.4z" />
                                            <path class="st0" d="M23.3,14.2c-0.1-0.1-0.2-0.2-0.3-0.3c-1.2-1.2-2.4-2.4-3.6-3.6c-1-1-1.1-2.5-0.3-3.6c0.8-1.1,2.3-1.6,3.5-1
                                                            c0.3,0.2,0.6,0.4,0.8,0.6c2.9,2.9,5.8,5.7,8.6,8.6c1.2,1.2,1.2,2.9,0,4.1c-2.8,2.8-5.6,5.6-8.4,8.4c-1.2,1.2-2.9,1.2-4.1,0
                                                            c-1.1-1.1-1.1-2.9,0.1-4c1.1-1.1,2.2-2.2,3.3-3.3c0.1-0.1,0.2-0.1,0.3-0.2l-0.1-0.1h-0.4c-3.9,0-7.7,0-11.6,0
                                                            c-1.4,0-2.5-0.9-2.8-2.1c-0.4-1.8,0.9-3.5,2.8-3.5c2.5,0,5,0,7.5,0L23.3,14.2L23.3,14.2z" />
                                        </svg>
                                    </span>
                                    <span class="title">
                                        <p>Cerrar sesión</p>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <nav class="container-fluid position-absolute navbar navbar--main bg-white shadow-sm">
                        <div class="container">
                            <a href="#" class="navbar-brand"><img class="navbar__logo d-inline-block align-top" src="' . HOME_PATH . 'resources/img/dashboard/poseidon-l.svg" alt="Logo de Poseidón"></a>
                            <div class="burger-container">
                                <div id="burger">
                                    <div class="bar topBar"></div>
                                    <div class="bar btmBar"></div>
                                    <div class="bar lastBar"></div>
                                </div>
                            </div>

                            <ul class="navbar__links">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="ordenes.php">Ordenes</a></li>
                                <li><a href="alquileres">Alquileres</a></li>
                                <li><a href="sucursales.php">Sucursales</a></li>
                                <li><a href="categorias.php">Categorías</a></li>
                                <li><a href="productos.php">Productos</a></li>
                                <li><a href="clientes.php">Clientes</a></li>
                                <li><a href="usuarios.php">Usuarios</a></li>
                                <li><a href="parametros.php">Parámetros</a></li>
                            </ul>

                            <ul class="navbar__links navbar__icons">
                                <li><a href="user.php"><img src="' . HOME_PATH . 'resources/img/dashboard/cuenta.svg"></a></li>
                                <li><a href="index.php"><img src="' . HOME_PATH . 'resources/img/dashboard/logout.svg"></a></li>
                            </ul>
                        </div>
                    </nav>
            </header>');
    }

    public static function dashModalOrden()
    {
        echo ('<div
                class="modal fade dash__full"
                id="orden"
                tabindex="-1"
                role="dialog"
                aria-labelledby="orden"
                aria-hidden="true"
                data-backdrop="static">
                <div
                    class="modal-dialog modal-dialog-centered modal-dialog-zoom mw-100 w-75"
                    role="document"
                    id="check_mq">
                    <div class="modal-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 d-flex flex-row justify-content-between mt-4 m-1">
                                    <h3 class="dash__modal_title p-0 ml-4">Orden No. 1</h3>
                                    <button
                                        type="button"
                                        class="close mr-5"
                                        data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="fas fa-times p-1"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="dash__modal_field">Cliente</p>
                                        </div>
                                        <div class="col-8">
                                            <p>Grand Marshal</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="dash__modal_field">Email</p>
                                        </div>
                                        <div class="col-8">
                                            <p>grandmarshal@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="dash__modal_field">TelÃ©fono</p>
                                        </div>
                                        <div class="col-8">
                                            <p>01718332233</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class=" dash__modal_field">DirecciÃ³n</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae beatae
                                                consequatur eveniet culpa omnis obcaecati quibusdam, sint dolore.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-4">
                            <table
                                class="table table-borderless table-responsive w-100 d-block d-md-table"
                                id="table">
                                <thead>
                                    <tr class="dash_modal_thead">
                                        <th scope="col">No.</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Pencil (2B)</td>
                                        <td>1 Dozen</td>
                                        <td>$9.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Sharpner</td>
                                        <td>1 single</td>
                                        <td>$15.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Drawing Paper</td>
                                        <td>1 quire</td>
                                        <td>$89.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>CAT5 Cable</td>
                                        <td>2 meter</td>
                                        <td>$99.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Sticky Notes</td>
                                        <td>2 packet</td>
                                        <td>$349.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Pencil (2B)</td>
                                        <td>1 Dozen</td>
                                        <td>$9.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Sharpner</td>
                                        <td>1 single</td>
                                        <td>$15.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Drawing Paper</td>
                                        <td>1 quire</td>
                                        <td>$89.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>CAT5 Cable</td>
                                        <td>2 meter</td>
                                        <td>$99.99</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Sticky Notes</td>
                                        <td>2 packet</td>
                                        <td>$349.99</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="dash__modal_bottom">
                            <div class="row m-3">
                                <div class="col-md-6 my-3">
                                    <div class="row flex-wrap">
                                        <div class="col-md-5 col-6">
                                            <p class="dash__modal_field">Fecha de compra</p>
                                        </div>
                                        <div class="col-md-7 col-6">
                                            <p>07/02/2020</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-6">
                                            <p class="dash__modal_field">Fecha de entrega</p>
                                        </div>
                                        <div class="col-md-7 col-6">
                                            <p>08/02/2020</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-3">
                                    <div class="row">
                                        <div class="col-md-8 col-6 dash__align">
                                            <p class="dash__modal_field">Subtotal
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <p>$565.95
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-6 dash__align">
                                            <p class="dash__modal_field">IVA (13%)
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <p>$73.58
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-6 dash__align">
                                            <p class="dash__modal_field">Total (+IVA)
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <p>$639.53
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dash__modal_footer mr-4">
                            <button type="button" class="ml-auto btn dash__modal_deny" data-dismiss="modal">Rechazar orden</button>
                            <button type="button" class="btn dash__modal_accept">Finalizar Orden</button>
                        </div>
                    </div>
                </div>
            </div>');
    }

    public static function dashModalAlquiler()
    {
        echo ('<div
                class="modal fade dash__full"
                id="alquiler"
                tabindex="-1"
                role="dialog"
                aria-labelledby="alquiler"
                aria-hidden="true"
                data-backdrop="static">
                <div
                class="modal-dialog modal-dialog-centered modal-dialog-zoom mw-100 w-75"
                role="document"
                id="check_mq">
                <div class="modal-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 d-flex flex-row justify-content-between mt-4 m-1">
                                <h3 class="dash__modal_title p-0 ml-4">Alquiler No. 1</h3>
                                <button
                                    type="button"
                                    class="close mr-5"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="fas fa-times p-1"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="dash__modal_field">Cliente</p>
                                    </div>
                                    <div class="col-8">
                                        <p>Grand Marshal</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="dash__modal_field">Email</p>
                                    </div>
                                    <div class="col-8">
                                        <p>grandmarshal@gmail.com</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="dash__modal_field">TelÃ©fono</p>
                                    </div>
                                    <div class="col-8">
                                        <p>01718332233</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class=" dash__modal_field">Sucursal</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </div>
                                <div class="row flex-wrap">
                                    <div class="col-md-5 col-6">
                                        <p class="dash__modal_field">Fecha de alquiler</p>
                                    </div>
                                    <div class="col-md-7 col-6">
                                        <p>10/02/2020</p>
                                    </div>
                                </div>
                                <div class="row flex-wrap">
                                    <div class="col-md-5 col-6">
                                        <p class="dash__modal_field">Fecha de devoluciÃ³n</p>
                                    </div>
                                    <div class="col-md-7 col-6">
                                        <p>09/02/2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center m-4">
                        <table
                            class="table table-borderless table-responsive w-100 d-block d-md-table"
                            id="table">
                            <thead>
                                <tr class="dash_modal_thead">
                                    <th scope="col">No.</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio de alquiler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Pencil (2B)</td>
                                    <td>1 Dozen</td>
                                    <td>$9.99</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Sharpner</td>
                                    <td>1 single</td>
                                    <td>$15.99</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Drawing Paper</td>
                                    <td>1 quire</td>
                                    <td>$89.99</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>CAT5 Cable</td>
                                    <td>2 meter</td>
                                    <td>$99.99</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Sticky Notes</td>
                                    <td>2 packet</td>
                                    <td>$349.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="dash__modal_bottom">
                        <div class="row m-3">
                            <div class="col-md-6 my-3">
                                <div class="row flex-wrap">
                                    <div class="col-md-5 col-6">
                                        <p class="dash__modal_field">Fecha de compra</p>
                                    </div>
                                    <div class="col-md-7 col-6">
                                        <p>07/02/2020</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-3">
                                <div class="row">
                                    <div class="col-md-8 col-6 dash__align">
                                        <p class="dash__modal_field">Subtotal
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <p>$565.95
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-6 dash__align">
                                        <p class="dash__modal_field">IVA (13%)
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <p>$73.58
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-6 dash__align">
                                        <p class="dash__modal_field">Total (+IVA)
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <p>$639.53
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dash__modal_footer mr-4">
                        <button type="button" class="ml-auto btn dash__modal_deny" data-dismiss="modal">Rechazar alquiler</button>
                        <button type="button" class="btn dash__modal_accept">Finalizar alquiler</button>
                    </div>
                </div>
            </div>
        </div>');
    }

    public static function dashSucursales($status)
    {
        echo ('<div class="col-md-6 col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <ul class="nav nav-categorias" role="tablist">
                        <li class="nav-item">
                            <a data-toggle="tab" href="#alquileres" class="nav-link active dash__tab_title" aria-expanded="true">
                                ' . (($status == 'add') ? 'Añadir una nueva sucursal' : 'Modificar una sucursal') . '
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                    <div class="row mt-4">
                        <div class="col-md-4 col-12 text-lg-right">
                            <p>Nombre de la sucursal</p>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-field">
                                <div class="form-field__control">
                                    <input id="text" type="text" class="dash__text_fields form-field__input" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 col-12 text-lg-right">
                            <p>Dirección</p>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-field">
                                <div class="form-field__control">
                                    <textarea id="exampleTextarea" class="form-field__textarea dash__text_fields"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <span class="ml-5">
                                <button type="button" class="btn recover__button">Cancelar</button>
                                <button type="button" class="btn main__button">
                                    ' . (($status == 'add') ? 'Añadir surcusal' : 'Modificar sucursal') . '
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        ');
    }

    public static function dashCategorias($status)
    {
        echo ('<div class="col-md-6 col-12">
                            <div class="col-md-12 col-lg-12 p-0">
                                <ul class="nav nav-categorias" role="tablist">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#alquileres" class="nav-link active dash__tab_title" aria-expanded="true">
                                            ' . (($status == 'add') ? 'Añadir una nueva categoría' : 'Modificar una categorí­a') . '
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                                <form id="categories-form" method="POST" action="">
                                <div class="row mt-4">
                                    <div class="col-md-4 col-12 text-lg-right">
                                        <p>Nombre de la categoría</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-field">
                                            <div class="form-field__control">
                                                <input id="inputCategoría" type="text" name="categoria" required class="dash__text_fields form-field__input" />
                                            </div>
                                            <p class="form-error-label" id="errorCategoría"></p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <span class="ml-5">
                                            <button type="button" id="categories-cancel" class="btn recover__button ' . (($status == 'add') ? 'd-none' : 'd-block') . '">Cancelar</button>
                                            <button type="submit" class="btn main__button" id="categories-submit">
                                                ' . (($status == 'add') ? 'Añadir categoría' : 'Modificar categorí­a') . '
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>');
    }

    public static function dashParametros($status)
    {
        echo ('<div class="col-md-6 col-12">
                            <div class="col-md-12 col-lg-12 p-0">
                                <ul class="nav nav-categorias" role="tablist">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#alquileres" class="nav-link active dash__tab_title" aria-expanded="true">
                                            ' . (($status == 'add') ? 'Añadir un nuevo parámetro' : 'Modificar un parámetro') . '
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                                <div class="row mt-4">
                                    <div class="col-md-4 col-12 text-lg-right">
                                        <p>Nombre del parámetro</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-field">
                                            <div class="form-field__control">
                                                <input id="text" type="text" class="dash__text_fields form-field__input" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 text-lg-right">
                                        <p>Parámetro</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-field">
                                            <div class="form-field__control">
                                                <input id="text" type="text" class="dash__text_fields form-field__input" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <span class="ml-5">
                                            <button type="button" class="btn recover__button">Cancelar</button>
                                            <button type="button" class="btn main__button">
                                                ' . (($status == 'add') ? 'Añadir parámetro' : 'Modificar parámetro') . '
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>');
    }
}
