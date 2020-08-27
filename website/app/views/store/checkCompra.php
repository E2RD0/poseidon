<?php
require_once('functions.php');
template::getHeader('Completar compra ~ Poseidón');
?>

<main class="container checking-page mb-5 pb-5">
    <form id="checking-form" method="POST" action="">
        <h2 class="table-cart-title mb-5">Entrega y detalles de pago</h2>
        <div class="row flex-column-reverse flex-lg-row mb-5 pb-5">
            <div class="col-lg-8">
                <div class="font-small d-flex">
                    <img src="../../resources/img/tienda/icons/delivery.svg" alt="Camión de entrega" width="25">
                    <div class="py-3 ml-3">
                        <h3 class="font-small">Entrega a domicilio</h3>
                        <p class="m-0">Elige donde se entregará tu producto</p>
                    </div>
                </div>
                <div class="my-5 row">
                    <div class="col-md-7">
                        <label class="label-input font-weight-bold mb-3" for="inputeAddress">Dirección de entrega</label>
                        <input class="form-input" type="text" required name="address" id="inputeAddress">
                    </div>
                    <div class="col-md-5">
                        <label class="label-input font-weight-bold mb-3" for="inputeDate">Fecha de entrega</label>
                        <input class="form-input" type="date" required name="date" placeholder="DD/MM/YYYY" id="inputDate">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h6 class="mb-5">Tu carrito</h6>
                <div class="check-summary overflow-auto" id="carrito">
                </div>
                <div class="text-center check-total">
                    <p class="m-0">Costo Total: <strong class="ml-2" id="total"></strong></p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between flex-column flex-md-row align-items-center">
            <a href="../shop/cart" class="go-back font-weight-bold mb-md-0 mb-5"><i class="fas fa-arrow-left fa-lg mr-4"></i>Regresar</a>
            <div class="text-center">
                <a href="../shop" class="btn btn--cta mb-4 mb-sm-0">Volver a la tienda</a>
                <button type="confirm" class="btn btn--cta btn-primary mb-4 mb-sm-0">Confirmar</button>
            </div>
        </div>
    </form>
</main>

<?php template::getSimpleFooter('checking.js'); ?>
