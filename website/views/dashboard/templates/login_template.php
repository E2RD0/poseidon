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
                <link rel="stylesheet" href="resources/css/all.min.css">
                <link rel="stylesheet" href="resources/webfonts/fonts.css">
                <link rel="stylesheet" href="resources/css/normalize.css">
                <link rel="stylesheet" href="resources/css/bootstrap.min.css">
                <link rel="stylesheet" href="resources/css/main.css">
                <link rel="stylesheet" href="resources/css/custom.css">
            </head>

            <body>'
        );
    }

    public static function loginEnd()
    {
        echo(
            '</body>
            <script src="resources/js/vendor/jquery-3.4.1.min.js"></script>
            <script src="resources/js/vendor/bootstrap.bundle.min.js"></script>
            <script src="resources/js/plugins.js"></script>
            <script src="resources/js/main.js"></script>
            </html>'
        );
    }
}
