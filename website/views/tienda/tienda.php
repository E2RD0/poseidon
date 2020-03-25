<?php 
require_once('functions.php');
template::getHeader('Productos ~ Poseidón');
?>

  <div class="container store-cards">
    <div class="row">
    <aside class="col-md-4 col-lg-3">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4">Categoría</h5>
              <div class="custom-control custom-checkbox checkbox-cat">
                <input type="radio" class="custom-control-input" id="customCheck" name="categoryRadio" data-target="#all" checked>
                <label class="custom-control-label" for="customCheck">Todos<span class="cat-count">(5)</span></label>
            </div>

            <div class="custom-control custom-checkbox checkbox-cat">
                <input type="radio" class="custom-control-input" id="customCheck1" name="categoryRadio" data-target="#tablas">
                <label class="custom-control-label" for="customCheck1">Tablas<span class="cat-count">(2)</span></label>
            </div>
            <div class="custom-control custom-checkbox checkbox-cat">
                <input type="radio" class="custom-control-input" id="customCheck2" name="categoryRadio" data-target="#ropa">
                <label class="custom-control-label" for="customCheck2">Ropa<span class="cat-count">(1)</span></label>
            </div>
            <div class="custom-control custom-checkbox checkbox-cat">
                <input type="radio" class="custom-control-input" id="customCheck3" name="categoryRadio" data-target="#accesorios">
                <label class="custom-control-label" for="customCheck3">Accesorios<span class="cat-count">(1)</span></label>
            </div>
            </div>
          </div>
          <div class="card price-range pb-3">
            <div class="card-body">
              <h5 class="card-title">Precio</h5>
              <div class="easy-basket-filter">
               <div class="easy-basket-filter-info">
                 <p class="iLower"><input type="text" class="easy-basket-lower" value="0" min="0" max="5000" maxlength=6/></p>
                 <p class="iUpper"><input type="text" class="easy-basket-upper" value="5000" min="0" max="5000" maxlength=6/></p>
               </div>
               
               <div class="easy-basket-filter-range">
                 <input type="range" class="lower range" step="any" min="0" max="5000" value="0"/>
                 <input type="range" class="upper range" step="any" min="0" max="5000" value="5000"/>
                 <div class="fill"></div>
               </div>	
             </div>

            </div>
          </div>
    </aside>
  <main class="text-center col-md-8 col-lg-9">
    <div class="tab-content text-left container">
        <div class="tab-pane active" id="all" role="tabpanel">
          <div class="products products-featured row">
    
          <div class="product has-post-thumbnail featured col-lg-4 col-md-6">
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
    
          <div class="product has-post-thumbnail featured col-lg-4 col-md-6">
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
    
          <div class="product has-post-thumbnail featured col-lg-4 col-md-6">
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
    
          <div class="product has-post-thumbnail featured col-lg-4 col-md-6">
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
    
        <div class="tab-pane" id="tablas" role="tabpanel">
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
        <div class="tab-pane" id="ropa" role="tabpanel">
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
    
        <div class="tab-pane" id="accesorios" role="tabpanel">
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
        <a class="btn-products-more btn btn--cta" href="#">Cargar más</a>
        </div>
  </main>
</div>
</div>

<?php template::getFooter();?>