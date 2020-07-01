<footer class="page-footer pt-4 px-md-4">
  <div class=" section-cta jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="display-6">Compra tablas de surf con <br>diseños llamativos y originales</h3>
      <a href="tienda.php#t-tablas" class="btn btn--cta btn-secondary">Ver catálogo de tablas</a>
    </div>
  </div>
<!-- Footer Links -->
<div class="container-fluid text-center text-md-left mb-5">
  <div class="row">
    <div class="col-lg-6 col-md-6 mt-md-0 mt-3">
      <a href="index.php"><img class="navbar__logo" src="<?= HOME_PATH ?>resources/img/tienda/logo.svg" alt="Logo de Poseidón"></a>
      <p class="footer__text my-4">Poseidón es una tienda de equipo de surf. <br>Usa nuestros productos y conviértete en el dios de las olas.</p>
      <ul class="footer__social list-unstyled">
        <li><a href="https://www.facebook.com"><i class="fab fa-facebook-f fa-lg"></i></a></li>
        <li><a href="https://twitter.com"><i class="fab fa-twitter fa-lg"></i></a></li>
        <li><a href="https://www.instagram.com"><i class="fab fa-instagram fa-lg"></i></a></li>
      </ul>
    </div>
    <hr class="clearfix w-100 d-md-none pb-3">
    <div class="col-lg-2 col-md-3 mb-md-0 mb-3">
      <h6 class="mb-md-4">Enlaces</h6>

      <ul class="list-unstyled footer__links">
        <li>
          <a href="dashboard.php">Mi cuenta</a>
        </li>
        <li>
          <a href="#">Acerca de</a>
        </li>
      </ul>

    </div>

    <div class="col-lg-2 col-md-3 mb-md-0 mb-3">
      <h6 class="mb-md-4">Información</h6>

      <ul class="list-unstyled footer__links">
        <li>
          <a href="#">Términos y condiciones</a>
        </li>
        <li>
          <a href="#">Política de privacidad</a>
        </li>
        <li>
          <a href="#">Política de devoluciones</a>
        </li>
      </ul>

    </div>

    <div class="col-lg-2 col-md-3 mb-md-0 mb-3 ml-md-auto mt-md-3 mt-lg-0">
      <h6 class="mb-md-4">Contacto</h6>

      <ul class="list-unstyled footer__links">
        <li>
          <a href="mailto:tienda@surf.com">tienda@surf.com</a>
        </li>
        <li>
          <a href="tel:+50376851477">Tel: +50376851477</a>
        </li>
      </ul>
    </div>

  </div>
</div>
<hr class="clearfix w-100 mb-0">
<div class="footer-copyright text-center py-4">©2020. Todos los derechos reservados.</div>
</footer>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="<?= HOME_PATH ?>resources/js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
<script src="<?= HOME_PATH ?>resources/js/plugins.js"></script>
<script src="<?= HOME_PATH ?>resources/js/vendor/bootstrap.min.js"></script>
<script> var HOME_PATH = "<?= HOME_PATH ?>" </script>
<script src="<?= HOME_PATH ?>resources/js/tienda.js"></script>
<script src="<?= HOME_PATH ?>resources/js/vendor/rater.min.js"></script>
<script src="<?= HOME_PATH ?>resources/js/vendor/sweetalert2.all.min.js"></script>
<script src="<?= HOME_PATH ?>resources/js/components.js"></script>
<script src="<?= HOME_PATH ?>resources/js/ajax/store/account.js"></script>
<?php
foreach ($ajax as $script) {
    echo '<script src="' . HOME_PATH . 'resources/js/ajax/store/' . $script .'"></script>';
}
 ?>
</body>

</html>
