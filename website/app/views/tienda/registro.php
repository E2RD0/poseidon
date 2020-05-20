<?php 
require_once('functions.php');
template::getHeader('Regístrate ~ Poseidón');
?>

  <main class="form container mb-5">
    <a href="tienda.php" class="go-back"><i class="fas fa-arrow-left fa-lg mr-4"></i>Ir a la tienda</a>
    <div class="row">
    <div class="col-md-6 text-center form-container">
      <h1 class="form-title">Crea una nueva cuenta para poder comprar en la tienda</h1>
      <p>Gestiona tus ordenes, alquileres, y se capaz de dar tu opinión respecto a los productos que has comprado.</p>
      <form class="mt-5">
        <input class="form-input" type="text" required name="name" placeholder="Nombres">
        <input class="form-input" type="text" required name="lastname" placeholder="Apellidos">
        <input class="form-input" type="email" required name="email" placeholder="Correo Electrónico">
        <input class="form-input" type="password" required name="pass" placeholder="Contraseña">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
            <label class="custom-control-label" for="customCheck">Acepto los términos de servicio y la política de privacidad</label>
        </div>
        <!--<button class="btn btn--cta btn-primary form-submit my-4" type="submit">Regístrate</button>-->
        <a href="dashboard.php" class="btn btn--cta btn-primary form-submit my-4" type="submit">Regístrate</a>
      </form>
      <p class="form-text">¿Ya tienes una cuenta? <a class="ml-sm-3" href="iniciarSesion.php">Inicia sesión</a></p>
    </div>
    </div>
  </main>

  <?php template::getSimpleFooter(); ?>
  