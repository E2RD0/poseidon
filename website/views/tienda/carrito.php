<?php 
require_once('functions.php');
template::getHeader('Completar compra ~ Poseidón');
?>

  <main class="container cart-page mb-5 pb-5">
    <h2 class="table-cart-title mb-5">Carrito</h2>
    <div class="row cart-products mb-5 pb-5">
        <div class="col-12 p-0">
          <!-- Shopping cart table -->
          <div class="table-responsive cart-table">
            <table class="table">
              <thead>
                <tr class="text-center">
                  <th scope="col" class="border-0">
                    <div class="p-2 px-3 text-left">Producto</div>
                  </th>
                  <th scope="col" class="border-0">
                    <div class="py-2">Precio</div>
                  </th>
                  <th scope="col" class="border-0">
                    <div class="py-2">Cantidad</div>
                  </th>
                  <th scope="col" class="border-0">
                    <div class="py-2">Total</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded-circle shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Tabla blanca de caoba</a></h5><span class="text-muted font-weight-light">#261311</span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>$79.00</strong></td>
                  <td class="align-middle">
                    <div class='ctrl mx-auto' min="1" max="5">
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                        <input class='ctrl__counter-input' maxlength='10' type='text' value='1'>
                        <div class='ctrl__counter-num'>1</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </td>
                  <td class="align-middle"><strong>$79.00</strong></td>
                  <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fas fa-times"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-3_cexmhn.jpg" alt="" width="70" class="img-fluid rounded-circle shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Lumix camera lense</a></h5><span class="text-muted font-weight-light">#261311</span>
                      </div>
                    </div>
                  </th>
                  <td class="align-middle"><strong>$79.00</strong></td>
                  <td class="align-middle">
                    <div class='ctrl mx-auto' min="1" max="9">
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                        <input class='ctrl__counter-input' maxlength='10' type='text' value='1'>
                        <div class='ctrl__counter-num'>1</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </td>
                  <td class="align-middle"><strong>$79.00</strong></td>
                  <td class="align-middle"><a href="#" class="text-dark"><i class="fas fa-times"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-2_qxjis2.jpg" alt="" width="70" class="img-fluid rounded-circle shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Gray Nike running shoe</a></h5><span class="text-muted font-weight-light">#261311</span>
                      </div>
                    </div>
                    <td class="align-middle"><strong>$79.00</strong></td>
                    <td class="align-middle">
                        <div class='ctrl mx-auto' min="1" max="6">
                            <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                            <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='1'>
                            <div class='ctrl__counter-num'>1</div>
                            </div>
                            <div class='ctrl__button ctrl__button--increment'>+</div>
                        </div>
                    </td>
                    <td class="align-middle"><strong>$79.00</strong></td>
                    <td class="align-middle"><a href="#" class="text-dark"><i class="fas fa-times"></i></i></a>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End -->
          <div class="cart-actions mt-4 d-flex flex-column-reverse flex-md-row justify-content-between align-items-center p-3 px-md-0">
              <a href="tienda.php" class="go-back font-weight-bold"><i class="fas fa-arrow-left fa-lg mr-4"></i>Seguir comprando</a>
              <div class="d-flex align-items-center mb-5 mb-md-0">
                  <p class="my-0 mr-4">Costo total: <strong>$159.55</strong></p>
                  <a href="checkCompra.php" class="btn btn--cta btn-primary">Continuar</a>
              </div>
          </div>
        </div>
      </div>

    <h2 class="table-cart-title mb-5">Alquiler</h2>
    <div class="row cart-rent mb-5">
        <div class="col-12 p-0">
          <!-- Shopping cart table -->
          <div class="table-responsive cart-table">
            <table class="table">
              <thead>
                <tr class="text-center">
                  <th scope="col" class="border-0">
                    <div class="p-2 px-3 text-left">Producto</div>
                  </th>
                  <th scope="col" class="border-0">
                    <div class="py-2">Precio</div>
                  </th>
                  <th scope="col" class="border-0">
                    <div class="py-2">Número de días</div>
                  </th>
                  <th scope="col" class="border-0">
                    <div class="py-2">Total</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-3_cexmhn.jpg" alt="" width="70" class="img-fluid rounded-circle shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Traje de surfing</a></h5><span class="text-muted font-weight-light">#261311</span>
                      </div>
                    </div>
                  </th>
                  <td class="align-middle"><strong>$79.00</strong></td>
                  <td class="align-middle">
                    <div class='ctrl mx-auto' min="1" max="9">
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                        <input class='ctrl__counter-input' maxlength='10' type='text' value='1'>
                        <div class='ctrl__counter-num'>1</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </td>
                  <td class="align-middle"><strong>$79.00</strong></td>
                  <td class="align-middle"><a href="#" class="text-dark"><i class="fas fa-times"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-2_qxjis2.jpg" alt="" width="70" class="img-fluid rounded-circle shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Gray Nike running shoe</a></h5><span class="text-muted font-weight-light">#261311</span>
                      </div>
                    </div>
                    <td class="align-middle"><strong>$79.00</strong></td>
                    <td class="align-middle">
                        <div class='ctrl mx-auto' min="1" max="6">
                            <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                            <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='1'>
                            <div class='ctrl__counter-num'>1</div>
                            </div>
                            <div class='ctrl__button ctrl__button--increment'>+</div>
                        </div>
                    </td>
                    <td class="align-middle"><strong>$79.00</strong></td>
                    <td class="align-middle"><a href="#" class="text-dark"><i class="fas fa-times"></i></i></a>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End -->
          <div class="cart-actions mt-4 d-flex flex-column-reverse flex-md-row justify-content-between align-items-center p-3 px-md-0">
              <a href="tienda.php" class="go-back font-weight-bold"><i class="fas fa-arrow-left fa-lg mr-4"></i>Seguir comprando</a>
              <div class="d-flex align-items-center mb-5 mb-md-0">
                  <p class="my-0 mr-4">Costo total: <strong>$159.55</strong></p>
                  <a href="checkAlquiler.php" class="btn btn--cta btn-primary">Continuar</a>
              </div>
          </div>
        </div>
      </div>
</main>

<?php template::getSimpleFooter(); ?>
