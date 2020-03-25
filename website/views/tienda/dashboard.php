<?php 
require_once('functions.php');
template::getHeader('Dashboard ~ Poseidón');
?>

<div class="container user-dashboard">
    <div class="row">
    <aside class="col-md-4 col-lg-3 nav-dashboard mb-5 mb-md-0">
        <ul class="nav flex-md-row flex-column" role="tablist">
            <li class="nav-item">
              <a data-toggle="tab" href="#tab-1" class="nav-link active" aria-expanded="true"><img class="nav-icon" src="../../resources/img/tienda//icons/iconDashboard.png"> Dashboard</a>
            </li>
            <li class="nav-item">
              <a data-toggle="tab" href="#tab-2" class="nav-link" aria-expanded="false"><img class="nav-icon" src="../../resources/img/tienda//icons/iconOrdenes.png"> Ordenes</a>
            </li>
            <li class="nav-item">
              <a data-toggle="tab" href="#tab-3" class="nav-link" aria-expanded="false"><img class="nav-icon" src="../../resources/img/tienda//icons/iconAlquileres.png"> Alquileres</a>
            </li>
            <li class="nav-item">
              <a data-toggle="tab" href="#tab-4" class="nav-link" aria-expanded="false"><img class="nav-icon" src="../../resources/img/tienda//icons/iconCuenta.png"> Cuenta</a>
            </li>
        </ul>
    </aside>
    <main class="text-center col-md-8 col-lg-9 pt-3 mb-5">
    <div class="tab-content text-left container">
        <div class="tab-pane active" id="tab-1" role="tabpanel">
            <p>
                Hola Eduardo. (¿No eres tú? <a class="text-dark font-weight-bold" href="iniciarSesion.php">Cerrar sesión</a>)
            </p>
            <p>
                Desde tu cuenta puedes ver tus ordenes recientes, alquileres y también cambiar tu contraseña y datos personales.
            </p>
        </div>

        <div class="tab-pane" id="tab-2" role="tabpanel">
            <div class="table-responsive text-center">
            <table class="table-dashboard table table-borderless table-striped rounded">
                <thead>
                  <tr>
                    <th>Orden</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>Entregado</td>
                    <td>$420.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>Entregado</td>
                    <td>$420.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>Entregado</td>
                    <td>$420.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>Entregado</td>
                    <td>$420.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>Entregado</td>
                    <td>$420.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>Entregado</td>
                    <td>$420.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>Entregado</td>
                    <td>$420.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>Entregado</td>
                    <td>$420.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                </tbody>
            </table>
            </div>
            <nav class="my-3" aria-label="...">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" tabindex="-1">Anterior</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Siguiente</a>
                </li>
              </ul>
            </nav>
        </div>
        <div class="tab-pane" id="tab-3" role="tabpanel">
          <div class="table-responsive text-center">
            <table class="table-dashboard table table-borderless table-striped rounded">
                <thead>
                  <tr>
                    <th>Orden</th>
                    <th>Fecha Entrega</th>
                    <th>Fecha Devolución</th>
                    <th>Total</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#225</td>
                    <td>18 enero, 2020</td>
                    <td>18 febrero, 2020</td>
                    <td>$120.99</td>
                    <td><button class="btn btn-light">Ver Detalles</button></td>
                  </tr>
                </tbody>
            </table>
            </div>
            <nav class="my-3" aria-label="...">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" tabindex="-1">Anterior</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Siguiente</a>
                </li>
              </ul>
            </nav>
        </div>
    
        <div class="tab-pane" id="tab-4" role="tabpanel">
          <form class="mb-5">
            <div class="row">
              <div class="col-lg-6 mb-3">
                <input class="form-input" type="text" required name="name" placeholder="Nombres">
              </div>
              <div class="col-lg-6 mb-3">
                <input class="form-input" type="text" required name="lastname" placeholder="Apellidos">  
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <input class="form-input" type="email" required name="email" placeholder="Correo Electrónico">
              </div>
              <div class="col-lg-6 mb-3">
                <input class="form-input" type="tel" required name="tel" placeholder="Teléfono">
              </div>
            </div>
            <div class="row">
              <div class="col-12 mb-3">
                <input class="form-input" type="text" required name="address" placeholder="Dirección">
              </div>
            </div>
            <div class="text-center">
              <h5 class="mt-5 mb-4">Cambia tu contraseña</h5>
              <div class="row">
                <div class="col-lg-6 mb-3">
                  <input class="form-input" type="password" required name="pass" placeholder="Contraseña actual">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 mb-3">
                  <input class="form-input" type="password" required name="pass" placeholder="Contraseña nueva">
                </div>
                <div class="col-lg-6 mb-3">
                  <input class="form-input" type="password" required name="pass" placeholder="Repetir contraseña">
                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-5">
              <button class="col-md-6 btn btn--cta btn-primary">Actualizar</button>
            </div>
            </form>
        </div>
        </div>
  </main>
</div>
</div>

<?php template::getSimpleFooter();?>