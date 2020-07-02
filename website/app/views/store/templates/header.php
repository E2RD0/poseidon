<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title><?php echo $s_title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/normalize.css">
  <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/bootstrap.min.css">
  <link href="<?= HOME_PATH ?>resources/css/all.min.css" rel="stylesheet">
  <link href="<?= HOME_PATH ?>resources/webfonts/fonts-tienda.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/tienda.css">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="header-main <?php if(!$s_index) echo'header-main--normal'?>">
    <nav class="container-fluid navbar navbar--main <?php if(!$s_index) echo 'navbar--normal'?>">
    <div class="container">
    <a href="<?= HOME_PATH ?>" class="navbar-brand"><img class="navbar__logo d-inline-block align-top" src="<?= HOME_PATH ?>resources/img/tienda/logo.svg" alt="Logo de Poseidón"></a>

    <div class="burger-container">
      <div id="burger">
        <div class="bar topBar"></div>
        <div class="bar btmBar"></div>
        <div class="bar lastBar"></div>
      </div>
    </div>


    <ul class="navbar__links">
      <?php
      require_once __DIR__ . '/../../../controllers/Categories.php';
      $controller = new \Categories;
      $result = [];
      $result = $controller->showCategories($result);
      if (isset($result['dataset'])) {
        foreach ($result['dataset'] as $row) {
          echo '<li><a href="'. HOME_PATH . 'store/shop#t-' . $row->categoria . '">' . $row->categoria . '</a></li>';
        }
      }
      ?>

    </ul>

    <ul class="navbar__links navbar__icons">
      <li><a href="#"><img src="<?= HOME_PATH ?>resources/img/tienda/icons/search.svg"></a></li>
      <li><a href="carrito.php"><img src="<?= HOME_PATH ?>resources/img/tienda/icons/cart.svg"></a></li>
      <li><a href="<?= HOME_PATH?>store/user/dashboard"><img src="<?= HOME_PATH ?>resources/img/tienda/icons/user.svg"></a></li>
    </ul>
    </div>
    </nav>

    <?php if($s_index){
      echo '
      <div class="container header__content">
        <div class="row">
        <div class="col-md-10">
            <h1 class="header__title">Domina las olas</h1>
            <p class="header__text">Explora nuestra variedad de tablas y equipo de surf.</p>
            <a class="btn btn-primary btn--cta" href="'.HOME_PATH . 'store/shop">Ir a tienda</a>
        </div>
        </div>
      </div>';
    } ?>
  </header>
