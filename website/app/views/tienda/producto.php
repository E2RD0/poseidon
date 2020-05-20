<?php 
require_once('functions.php');
template::getHeader('Tabla blanca de caoba ~ Poseidón');
?>

  <main class="container product-page">
    <div class="product-breadcrumb mb-5">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item home"><a href="#"><img src="../../resources/img/tienda/icons/home.svg" alt="Ícono de casa"></a></li>
          <li class="breadcrumb-item"><a href="#">Tablas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tabla blanca de caoba</li>
        </ol>
      </nav>
    </div>
    <div class="row mb-5 pb-5">
        <div class="product-image col-md-6 mb-5 mb-md-0">
            <ul class="preview-thumbnail nav nav-tabs col-lg-2">
                <li class="active"><a data-target="#pic-1" data-toggle="tab"><div class="product-thumbnail img_1-1"></div></a></li>
                <li><a data-target="#pic-2" data-toggle="tab"><div class="product-thumbnail img_1-2"></div></a></li>
                <li><a data-target="#pic-3" data-toggle="tab"><div class="product-thumbnail img_1-3"></div></a></li>
            </ul>
            <div class="preview-pic pl-lg-0 tab-content col-lg-10">
                <div class="tab-pane active" id="pic-1"><img src="../../resources/img/tienda/producto.jpg" /></div>
                <div class="tab-pane" id="pic-2"><img src="https://farm4.staticflickr.com/3766/12953056854_b8cdf14f21.jpg" /></div>
                <div class="tab-pane" id="pic-3"><img src="https://farm8.staticflickr.com/7187/6895047173_d4b1a0d798.jpg" /></div>
              </div>
        </div>
        <div class="product-info col-md-6">
          <h1>Tabla blanca de caoba</h1>
          <p class="product-price">$389.99</p>
          <div class="product-description">
              <h4>Descripción</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a nulla nibh. Sed in sagittis sapien, ut semper lacus. Curabitur et facilisis lorem, viverra aliquam.</p>
          </div>
          <div class="product-actions mt-4">
            <p>Cantidad: </p>
            <div class="d-block mb-4 d-md-block d-lg-flex d-sm-flex">
            <div class='ctrl mr-3 mb-2 mb-sm-0 mb-md-2 mb-lg-0' min="1" max="12">
              <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
              <div class='ctrl__counter'>
                <input class='ctrl__counter-input' maxlength='10' type='text' value='1'>
                <div class='ctrl__counter-num'>1</div>
              </div>
              <div class='ctrl__button ctrl__button--increment'>+</div>
            </div>
            <!--<button class="btn btn--cta btn-primary">Añadir al carrito</button>-->
            <a href="carrito.php" class="btn btn--cta btn-primary">Añadir al carrito</a>

            </div>
            <!--<button class="btn btn--cta">Alquilar <i class="ml-2 fas fa-angle-right"></i></button>-->
            <a href="carrito.php" class="btn btn--cta">Alquilar <i class="ml-2 fas fa-angle-right"></i></a>
          </div>
        </div>
        <div class="product-review">
            <div class="product-reviews-summary"></div>
            <div class="product-reviews"></div>
        </div>
    </div>
    <div class="rating-section mt-5 pt-5 mb-5">
      <h2 class="text-center text-uppercase mb-5 pb-5">Reseñas (3)</h2>
      <div class="row">
      <div class="col-md-6 mb-5 mb-md-0">
        <div class="clearfix">
          <div class="rating">
            <h2 class="mb-1">4.5</h2>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <p><i class="far fa-user mr-2"></i> 14 opiniones</p>
          </div>
          <div class="rating-process">
            <div class="rating-right-part">
              <p><i class="fas fa-star mr-2"></i>5</p>
              <div class="progress-1"></div>
            </div>
            <div class="rating-right-part">
              <p><i class="fas fa-star mr-2"></i>4</p>
              <div class="progress-2"></div>
            </div>
            <div class="rating-right-part">
              <p><i class="fas fa-star mr-2"></i>3</p>
              <div class="progress-3"></div>
            </div>
            <div class="rating-right-part">
              <p><i class="fas fa-star mr-2"></i></i>2</p>
              <div class="progress-4"></div>
            </div>
            <div class="rating-right-part">
              <p><i class="fas fa-star mr-2"></i></i>1</p>
              <div class="progress-5"></div>
            </div>
          </div>
        </div>
        <div class="text-center mt-4"><button class="btn btn--cta btn-primary">Dar opinión</button></div>
      </div>
      <div class="col-md-6 user-ratings mt-4 mt-md-0">
          <div class="user-rating">
            <i class="fas fa-user-circle fa-3x mr-3"></i>
            <div>
              <h4 class="rating-username">Roberto Campos</h4>
              <div class="rating-score mb-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
              <p class="rating-comment">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
              </p>
            </div>
          </div>
          
          <div class="user-rating">
            <i class="fas fa-user-circle fa-3x mr-3"></i>
            <div>
              <h4 class="rating-username">María Martínez</h4>
              <div class="rating-score mb-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
              <p class="rating-comment">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              </p>
            </div>
          </div>

          <div class="user-rating">
            <i class="fas fa-user-circle fa-3x mr-3"></i>
            <div>
              <h4 class="rating-username">Laura Navas</h4>
              <div class="rating-score mb-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
              <p class="rating-comment">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
              </p>
            </div>
          </div>
      </div>
    </div>
    </div>
</main>

<?php template::getFooter(); ?>