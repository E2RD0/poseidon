<?php 
require_once('functions.php');
template::getHeader('Iniciar sesión ~ Poseidón');
?>

  <main class="form container mb-5">
    <a href="tienda.php" class="go-back"><i class="fas fa-arrow-left fa-lg mr-4"></i>Ir a la tienda</a>
    <div class="row">
    <div class="col-md-6 text-center form-container">
      <h1 class="form-title">Iniciar Sesión</h1>
      <p>Ingresa sesión para gestionar tus ordenes e información personal.</p>
      <form class="mt-5">
          <input class="form-input" type="email" required name="email" placeholder="Correo Electrónico">
          <input class="form-input" type="password" required name="pass" placeholder="Contraseña">
          <div class="text-right"><a class="form-forgotten-pass" href="#">¿Olvidaste tu contraseña?</a></div>
          <!--<button class="btn btn--cta btn-primary form-submit my-4" type="submit">Acceder</button>-->
          <a href="dashboard.php" class="btn btn--cta btn-primary form-submit my-4" type="submit">Acceder</a>
        </form>
      <p class="form-text">¿Todavía no tienes cuenta? <a class="ml-sm-3" href="registro.php">Regístrate</a></p>
    </div>
    </div>
  </main>

<?php template::getSimpleFooter(); ?>
