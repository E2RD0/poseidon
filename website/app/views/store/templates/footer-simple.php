  <!-- Javascript -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="<?= HOME_PATH ?>resources/js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="<?= HOME_PATH ?>resources/js/plugins.js"></script>
  <script src="<?= HOME_PATH ?>resources/js/vendor/bootstrap.min.js"></script>
  <script> var HOME_PATH = "<?= HOME_PATH ?>" </script>
  <script src="<?= HOME_PATH ?>resources/js/tienda.js"></script>
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
