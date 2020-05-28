<?php

class loginTemplate
{
    public static function loginHead($title)
    {
        echo(
            '<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <meta name="theme-color" content="#171717">
                <title>'.$title.'</title>
                <link rel="manifest" href="site.webmanifest">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/all.min.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/webfonts/fonts-dashboard.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/normalize.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/bootstrap.min.css">
                <link rel="stylesheet" href="' . HOME_PATH . 'resources/css/dashboard.css">
            </head>

            <body>'
        );
    }

    public static function loginEnd($ajax)
    {
        echo(
            '</body>
            <script src="' . HOME_PATH . 'resources/js/vendor/jquery-3.4.1.min.js"></script>
            <script src="' . HOME_PATH . 'resources/js/vendor/bootstrap.bundle.min.js"></script>
            <script src="' . HOME_PATH . 'resources/js/plugins.js"></script>
            <script src="' . HOME_PATH . 'resources/js/dashboard.js"></script>
            <script src="' . HOME_PATH . 'resources/js/vendor/sweetalert2.all.min.js"></script>
            <script> var HOME_PATH = "'. HOME_PATH .'" </script>
            <script src="' . HOME_PATH . 'resources/js/components.js"></script>
            <script src="' . HOME_PATH . 'resources/js/ajax/account.js"></script>
            <script src="' . HOME_PATH . 'resources/js/ajax/' .$ajax.'"></script>
            </html>'
        );
    }
}
