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
                    <tbody id="productosOrden">
                    </tbody>
                </table>
                <div id="productosSpinner" class="w-100 text-center">
                </div>
            </div>
            <!-- End -->
            <div class="cart-actions mt-4 d-flex flex-column-reverse flex-md-row justify-content-between align-items-center p-3 px-md-0">
                <a href="tienda.php" class="go-back font-weight-bold"><i class="fas fa-arrow-left fa-lg mr-4"></i>Seguir comprando</a>
                <div class="d-flex align-items-center mb-5 mb-md-0" id="cartEnd">
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
                    </tbody>
                </table>
                <div id="productosSpinner" class="w-100 text-center">
                </div>
            </div>
            <!-- End -->
            <div class="cart-actions mt-4 d-flex flex-column-reverse flex-md-row justify-content-between align-items-center p-3 px-md-0">
                <a href="tienda.php" class="go-back font-weight-bold"><i class="fas fa-arrow-left fa-lg mr-4"></i>Seguir comprando</a>
                <div class="d-flex align-items-center mb-5 mb-md-0">
                </div>
            </div>
        </div>
    </div>
</main>

<?php template::getSimpleFooter('cart.js'); ?>
