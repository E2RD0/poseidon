<?php
require_once('functions.php');
template::getHeader('Iniciar sesión ~ Poseidón');
?>

  <main class="form container mb-5">
    <a href="<?= HOME_PATH?>store/shop" class="go-back"><i class="fas fa-arrow-left fa-lg mr-4"></i>Ir a la tienda</a>
    <div class="row">
    <div class="col-md-6 text-center form-container">
      <h1 class="form-title">Iniciar Sesión</h1>
      <p>Ingresa sesión para gestionar tus ordenes e información personal.</p>
      <form autocomplete="off" class="mt-5" action="" id="login-form" method="POST">
          <p class="form-error-label" id="errorEmail"></p>
          <input id="inputEmail" class="form-input" type="email" required name="email" placeholder="Correo Electrónico">

          <p class="form-error-label" id="errorContraseña"></p>
          <input id="inputContraseña" class="form-input" type="password" required name="password" placeholder="Contraseña">
          <div class="text-right"><a class="form-forgotten-pass" href="#">¿Olvidaste tu contraseña?</a></div>
          <!--<button class="btn btn--cta btn-primary form-submit my-4" type="submit">Acceder</button>-->
          <button id="login-submit" class="btn btn--cta btn-primary form-submit my-4" type="submit">Acceder</button>
        </form>
      <p class="form-text">¿Todavía no tienes cuenta? <a class="ml-sm-3" href="<?= HOME_PATH?>store/user/register">Regístrate</a></p>
    </div>
    </div>
  </main>

  <div class="modal fade twofa" id="2fa-modal" tabindex="-1" role="dialog" aria-labelledby="2fa-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Verificación en 2 pasos</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <form id="form">
      <div class="form__group form__pincode">
        <label>Ingresa el código de 6 dígitos de tu aplicación de autenticación</label>
        <input type="tel" name="pincode-1" maxlength="1" pattern="[\d]*" tabindex="1" placeholder="·" autocomplete="off">
        <input type="tel" name="pincode-2" maxlength="1" pattern="[\d]*" tabindex="2" placeholder="·" autocomplete="off">
        <input type="tel" name="pincode-3" maxlength="1" pattern="[\d]*" tabindex="3" placeholder="·" autocomplete="off">
        <input type="tel" name="pincode-4" maxlength="1" pattern="[\d]*" tabindex="4" placeholder="·" autocomplete="off">
        <input type="tel" name="pincode-5" maxlength="1" pattern="[\d]*" tabindex="5" placeholder="·" autocomplete="off">
        <input type="tel" name="pincode-6" maxlength="1" pattern="[\d]*" tabindex="6" placeholder="·" autocomplete="off">
      </div>
    </form>
        </div>
      </div>
    </div>
  </div>

<?php template::getSimpleFooter('login.js', '../../vendor/inputmask.min.js', '../../vendor/jquery.inputmask.min.js'); ?>
