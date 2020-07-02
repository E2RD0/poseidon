<?php
require_once('functions.php');
template::getHeader('Poseidón ~ Tienda de surf', true);
?>

  <section class="section-products-tabs text-center">
    <header class="section-header">
      <h2 class="section-title text-center">Productos Destacados</h2>
      <ul class="nav justify-content-center nav-categorias" role="tablist">
          <li class="nav-item">
            <a data-toggle="tab" href="#tab-all" class="nav-link active" aria-expanded="true">Todos</a>
          </li>
      </ul>
    </header>
    <div id="productos-destacados" class="tab-content text-left container">
    <div class="tab-pane active" id="tab-all" role="tabpanel">
      <div class="products products-featured row">

        <div class="d-flex w-100 mb-3 justify-content-center" id="spinnerSettings">
          <div class="spinner-grow" role="status" >
            <span class="sr-only">Loading...</span>
          </div>
        </div>

      </div>
    </div>

    </div>
    <div class="position-relative container">
    <a class="btn-products-more btn btn--cta" href="<?= HOME_PATH?>store/shop">Ver Todo</a>
    </div>
  </section>

  <?php template::getFooter('products.js');?>
