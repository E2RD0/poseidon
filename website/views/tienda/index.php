<?php 
require_once('functions.php');
template::getHeader('Poseidón ~ Tienda de surf', true);
?>

  <section class="section-products-tabs text-center">
    <header class="section-header">
      <h2 class="section-title text-center">Productos Destacados</h2>
      <ul class="nav justify-content-center nav-categorias" role="tablist">
          <li class="nav-item">
            <a data-toggle="tab" href="#tab-1" class="nav-link active" aria-expanded="true">Todos</a>
          </li>
          <li class="nav-item">
            <a data-toggle="tab" href="#tab-2" class="nav-link" aria-expanded="false">Tablas</a>
          </li>
          <li class="nav-item">
            <a data-toggle="tab" href="#tab-3" class="nav-link" aria-expanded="false">Ropa</a>
          </li>
          <li class="nav-item">
            <a data-toggle="tab" href="#tab-4" class="nav-link" aria-expanded="false">Accesorios</a>
          </li>
      </ul>
    </header>
    <div class="tab-content text-left container">
    <div class="tab-pane active" id="tab-1" role="tabpanel">
      <div class="products products-featured row">

      <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
        <a href="producto.php" class="product__link">
          <div class="product__image">
            <img width="300" height="300" src="img/products/1.jpg" class="" alt="" srcset=""/>
          </div>
          <h2 class="product__title">Tabla de surf 1</h2>
          <span class="product__price">$119.99</span>
        </a>
        <div class="product__rating">
          <div class="star-rating" title="Rated 0 out of 5"><span class="review-count">(0)</span></div>
        </div>
      </div>

      <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
        <a href="producto.php" class="product__link">
          <div class="product__image">
            <img width="300" height="300" src="img/products/2.jpg" class="" alt="" srcset=""/>
          </div>
          <h2 class="product__title">Traje de surfing</h2>
          <span class="product__price">$120.00</span>
        </a>
        <div class="product__rating">
          <div class="star-rating" title="Rated 0 out of 5"><span class="review-count">(0)</span></div>
        </div>
      </div>

      <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
        <a href="producto.php" class="product__link">
          <div class="product__image">
            <img width="300" height="300" src="img/products/3.jpg" class="" alt="" srcset=""/>
          </div>
          <h2 class="product__title">Hang up surfing</h2>
          <span class="product__price">$49.99</span>
        </a>
        <div class="product__rating">
          <div class="star-rating" title="Rated 0 out of 5"><span class="review-count">(0)</span></div>
        </div>
      </div>

      <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
        <a href="producto.php" class="product__link">
          <div class="product__image">
            <img width="300" height="300" src="img/products/4.jpg" class="" alt="" srcset=""/>
          </div>
          <h2 class="product__title">Tabla surf 2</h2>
          <span class="product__price">$200.00</span>
        </a>
        <div class="product__rating">
          <div class="star-rating" title="Rated 0 out of 5"><span class="review-count">(0)</span></div>
        </div>
      </div>


      </div>
    </div>

    <div class="tab-pane" id="tab-2" role="tabpanel">
      <div class="products products-featured row">

        <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
          <a href="producto.php" class="product__link">
            <div class="product__image">
              <img width="300" height="300" src="img/products/1.jpg" class="" alt="" srcset=""/>
            </div>
            <h2 class="product__title">Tabla de surf 1</h2>
            <span class="product__price">$119.99</span>
          </a>
          <div class="product__rating">
            <div class="star-rating" title="Rated 0 out of 5"><span class="review-count">(0)</span></div>
          </div>
        </div>

        <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
          <a href="producto.php" class="product__link">
            <div class="product__image">
              <img width="300" height="300" src="img/products/4.jpg" class="" alt="" srcset=""/>
            </div>
            <h2 class="product__title">Tabla surf 2</h2>
            <span class="product__price">$200.00</span>
          </a>
          <div class="product__rating">
            <div class="star-rating" title="Rated 0 out of 5"><span class="review-count">(0)</span></div>
          </div>
        </div>

        </div>
    </div>
    <div class="tab-pane" id="tab-3" role="tabpanel">
      <div class="products products-featured row">

        <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
          <a href="producto.php" class="product__link">
            <div class="product__image">
              <img width="300" height="300" src="img/products/2.jpg" class="" alt="" srcset=""/>
            </div>
            <h2 class="product__title">Traje de surfing</h2>
            <span class="product__price">$120.00</span>
          </a>
          <div class="product__rating">
            <div class="star-rating" title="Rated 0 out of 5"><span class="review-count">(0)</span></div>
          </div>
        </div>

        </div>
    </div>

    <div class="tab-pane" id="tab-4" role="tabpanel">
      <div class="products products-featured row">

        <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
          <a href="producto.php" class="product__link">
            <div class="product__image">
              <img width="300" height="300" src="img/products/3.jpg" class="" alt="" srcset=""/>
            </div>
            <h2 class="product__title">Hang up surfing</h2>
            <span class="product__price">$49.99</span>
          </a>
          <div class="product__rating">
            <div class="star-rating" title="Rated 0 out of 5"><span class="review-count">(0)</span></div>
          </div>
        </div>

        </div>
    </div>

    </div>
    <div class="position-relative container">
    <a class="btn-products-more btn btn--cta" href="tienda.php">Ver Todo</a>
    </div>
  </section>

  <?php template::getFooter();?>

