<?php 
require_once('functions.php');
template::getHeader('Completar compra ~ Poseidón');
?>

  <main class="container checking-page mb-5 pb-5">
    <h2 class="table-cart-title mb-5">Entrega y detalles de pago</h2>
    <div class="row flex-column-reverse flex-lg-row mb-5 pb-5">
        <div class="col-lg-8">
            <div class="font-small d-flex">
                <img src="../../resources/img/tienda/icons/delivery.svg" alt="Camión de entrega" width="25">
                <div class="py-3 ml-3">
                <h3 class="font-small">Entrega en sucursal</h3>
                <p class="m-0">Recoge tu producto en nuestra tienda más cercana</p>
                </div>
            </div>
            <form class="my-5 row">
                <div class="col-md-4">
                    <label class="label-input font-weight-bold mb-3" for="inputeAddress">Seleccionar sucursal</label>
                    <input class="form-input" type="text" required name="address" id="inputeAddress">
                </div>
                <div class="col-md-4">
                    <label class="label-input font-weight-bold mb-3" for="inputeDate">Fecha de entrega</label>
                    <input class="form-input" type="date" required="" name="date" placeholder="DD/MM/YYYY" id="inputDate">
                </div>
                <div class="col-md-4">
                    <label class="label-input font-weight-bold mb-3" for="inputeDate">Fecha de devolución</label>
                    <input class="form-input" type="date" required="" name="date" placeholder="DD/MM/YYYY" id="inputDate">
                </div>
            </form>
            <div class="text-center text-sm-left">
                <a href="iniciarSesion.php" class="btn btn--cta btn-primary mb-4 mb-sm-0">Iniciar Sesión</a>
                <a href="registro.php" class="btn btn--cta mb-4 mb-sm-0">Registrarse</a>
            </div>
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0">
            <h6 class="mb-5">Tu carrito</h6>
            <div class="check-summary">
                <div class="d-flex align-items-center mb-5 justify-content-between">
                    <div class="d-flex">
                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded-circle shadow-sm">
                        <div class="d-flex flex-column align-middle justify-content-around px-3 check-title">
                        <h6 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Tabla blanca de...</a></h6><span class="text-muted font-weight-light">#261311</span>
                        </div>
                    </div>
                    <div class="ml-3">
                        <strong class="d-block">$79.00</strong>
                        <span class="text-muted font-weight-light">5 días</span>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-5 justify-content-between">
                    <div class="d-flex">
                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded-circle shadow-sm">
                        <div class="d-flex flex-column align-middle justify-content-around px-3 check-title">
                        <h6 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Tabla blanca de...</a></h6><span class="text-muted font-weight-light">#261311</span>
                        </div>
                    </div>
                    <div class="ml-3">
                        <strong class="d-block">$79.00</strong>
                        <span class="text-muted font-weight-light">5 días</span>
                    </div>
                </div>
            </div>
            <div class="text-center check-total">
                <p class="m-0">Costo Total: <strong class="ml-2">$160.00</strong></p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-column flex-md-row align-items-center">
        <a href="carrito.php" class="go-back font-weight-bold mb-md-0 mb-5"><i class="fas fa-arrow-left fa-lg mr-4"></i>Regresar</a>
        <div class="text-center">
            <a href="tienda.php" class="btn btn--cta mb-4 mb-sm-0">Volver a la tienda</a>
            <a href="#" class="btn btn--cta btn-primary mb-4 mb-sm-0">Confirmar</a>
        </div>
    </div>
</main>

<?php template::getSimpleFooter(); ?>