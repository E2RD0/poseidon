<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="theme-color" content="#171717">
        <title>404</title>
        <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/normalize.css">
        <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/bootstrap.min.css">
        <style>
            body {
                height: 100vh;
            }
        </style>
    </head>

    <body class="container">
        <div class="row h-100 d-flex align-items-center">
            <div class="col">
                <div class="col-12 mx-auto mb-5 mt-n5">
                    <img src="<?= HOME_PATH ?>resources/img/tienda/logo.svg" style="height:50px" class="img-fluid">
                </div>
                <div class="w-100"></div>
                <div class="col-12 d-flex justify-content-center">
                    <h2>Lo sentimos, no pudimos encontrar la página que has solicitado.</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-12 mt-4">
                    <a class="badge badge-pill badge-warning" href="javascript:history.back()"><h4 class="mx-3 my-2">Regresar</h4></a>
                </div>
            </div>
        </div>
    </body>
</html>
