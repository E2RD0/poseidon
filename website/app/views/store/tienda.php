<?php
require_once('functions.php');
$funData = template::getHeader('Productos ~ Poseidón');
$categories = $funData['categories'];
?>

  <div class="container store-cards">
    <div class="row">
    <aside class="col-md-4 col-lg-3">
        <div class="card">
            <div class="card-body" id="categorias">
              <h5 class="card-title mb-4">Categoría</h5>
            <?php
            if (isset($categories['dataset'])) {
              $content = '';
              $num = 0;
              foreach ($categories['dataset'] as $row) {
                $num += $row->numproductos;
                $content = $content . '<div class="custom-control custom-checkbox checkbox-cat">
                <input type="radio" class="custom-control-input" id="check'. $row->categoria. '" name="categoryRadio" data-target="#'. $row->categoria. '">
                <label class="custom-control-label" for="check'. $row->categoria.'">'. $row->categoria.'<span class="cat-count">('. $row->numproductos.')</span></label>
                </div>';
              }
              echo '<div class="custom-control custom-checkbox checkbox-cat">
                    <input type="radio" class="custom-control-input" id="checkTodos" name="categoryRadio" data-target="#all" checked>
                    <label class="custom-control-label" for="checkTodos">Todos<span class="cat-count">('. $num.')</span></label>
                    </div>';
              echo $content;
            }
            ?>
            </div>
          </div>
          <div class="card price-range pb-3">
            <div class="card-body">
              <h5 class="card-title">Precio</h5>
              <div class="easy-basket-filter">
               <div class="easy-basket-filter-info">
                 <p class="iLower"><input id="inputRangeLow" type="text" class="easy-basket-lower" value="0" min="0" max="0" maxlength="5"></p>
                 <p class="iUpper"><input id="inputRangeHigh" type="text" class="easy-basket-upper" value="0" min="0" max="0" maxlength="5"></p>
               </div>

               <div class="easy-basket-filter-range">
                 <input id="priceRangeLow" type="range" class="lower range" step="1" min="0" max="0" value="0"/>
                 <input id="priceRangeHigh" type="range" class="upper range" step="1" min="0" max="0" value="0"/>
                 <div class="fill"></div>
               </div>
             </div>

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-search"></i> Búsqueda</h5>
              <input class="form-input" id="search" type="text" name="search"  placeholder="Búsqueda...">
            </div>
          </div>
    </aside>
  <main class="text-center col-md-8 col-lg-9">
    <div class="tab-content text-left container">
      <div class="w-100 text-center" id="spinner"></div>
        <div class="tab-pane active" id="all" role="tabpanel">
          <div class="products products-featured row">
            <div class="not-available d-none w-100 text-center m-5 ">No hay productos disponibles.</div>
        </div>
      </div>
      <?php
      if (isset($categories['dataset'])) {
        $content = '';
        foreach ($categories['dataset'] as $row) {
          echo '
          <div class="tab-pane" id="'. $row->categoria.'" role="tabpanel">
            <div class="products products-featured row">
              <div class="not-available d-none w-100 text-center m-5 ">No hay productos disponibles.</div>
            </div>
          </div>';
        }
      }
      ?>

        </div>
        <div class="position-relative container">
        <a id="loadMoreProducts" class="btn-products-more btn btn--cta" href="#">Cargar más</a>
        </div>
  </main>
</div>
</div>

<?php template::getFooter('products.js');?>
