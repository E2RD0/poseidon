<?php
require_once('functions.php');
template::getHeader('Regístrate ~ Poseidón');
?>

  <main class="form container mb-5">
    <a href="<?= HOME_PATH?>store/shop" class="go-back"><i class="fas fa-arrow-left fa-lg mr-4"></i>Ir a la tienda</a>
    <div class="row">
    <div class="col-md-6 text-center form-container">
      <h1 class="form-title">Crea una nueva cuenta para poder comprar en la tienda</h1>
      <p>Gestiona tus ordenes, alquileres, y se capaz de dar tu opinión respecto a los productos que has comprado.</p>
      <form autocomplete="off" class="mt-5" action="" id="register-form" method="POST">
        <p class="form-error-label" id="errorNombre"></p>
        <input class="form-input" id="inputNombre" type="text" required name="nombre" placeholder="Nombres">

        <p class="form-error-label" id="errorApellido"></p>
        <input class="form-input" id="inputApellido" type="text" required name="apellido" placeholder="Apellidos">

        <p class="form-error-label" id="errorEmail"></p>
        <input class="form-input" id="inputEmail" type="email" required name="email" placeholder="Correo Electrónico">

        <p class="form-error-label" id="errorContraseña"></p>
        <input class="form-input" id="inputContraseña" type="password" required name="password" placeholder="Contraseña">

        <p class="form-error-label" id="errorCheck"></p>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="check" name="checkCondiciones">
            <label class="custom-control-label" for="check">Acepto los términos de servicio y la política de privacidad</label>
        </div>
        <div class="g-recaptcha" data-sitekey="6LcGpNUZAAAAAE7YAJKT84Yas2YkUgr10nO9qcqw"></div>
        <!--<button class="btn btn--cta btn-primary form-submit my-4" type="submit">Regístrate</button>-->
        <button id="register-submit" class="btn btn--cta btn-primary form-submit my-4" type="submit">Regístrate</button>
      </form>
      <p class="form-text">¿Ya tienes una cuenta? <a class="ml-sm-3" href="<?= HOME_PATH?>store/user/login">Inicia sesión</a></p>
    </div>
    </div>
  </main>

  <?php template::getSimpleFooter('register.js', '../../vendor/api.js'); ?>
