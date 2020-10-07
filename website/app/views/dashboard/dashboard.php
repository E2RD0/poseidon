<?php
require_once('templates/dashboard_template.php');
dashboardTemplate::dashHead('Dashboard');
dashboardTemplate::dashMenu('dashboard');
?>

<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="col-12 dash__main_card">
                <div class="row my-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col d-flex flex-row justify-content-between">
                                <p class="dash__main_title p-0">Ordenes
                                    <span class="dash__main_indicator" id="orders_count"></span>
                                </p>
                                <span class="p-1">
                                    <button class="btn dash__main_button" type="button" onclick="location.href='dashboard/ordenes'">
                                        Ver todos
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr class="dash__div">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table dash__main_table w-100" id="table">
                                <thead>
                                    <tr>
                                        <th>No. de orden</th>
                                        <th>Nombre del cliente</th>
                                        <th>Dirección</th>
                                        <th>Total</th>
                                        <th class="text-center">Fecha de la compra</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <div id="dashboardSpinner" class="w-100 text-center">
                                    No hay ningún registro
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 col-sm-12 col-12 mt-4">
                <div class="col-12 dash__side_card1">
                    <div class="row">
                        <div class="col d-flex flex-row justify-content-between my-3">
                            <p class="dash__main_title p-0">Productos por agotarse</p>
                            <span class="p-1">
                                <button class="btn dash__main_button" type="button" onclick="location.href='dashboard/productos'">
                                    Ver todos
                                </button>
                            </span>
                        </div>
                    </div>
                    <hr class="dash__div">
                    <div id="productsSpinner">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-sm-12 mt-4">
                <div class="col-12 dash__side_card2">
                    <div class="row">
                        <div class="col d-flex flex-row justify-content-between my-3">
                            <p class="dash__main_title p-0">Gráficos</p>
                        </div>
                    </div>
                    <hr class="dash__div">
                    </hr>
                    <div class="row pt-0 pb-2">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <ul class="nav flex-column left-tabs" role="tablist">
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#nav-grafico1" class="nav-link side active" aria-expanded="true" id="nav-grafico1-tab" title="Productos más vendidos">Productos más vendidos</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#nav-grafico2" class="nav-link side" aria-expanded="true" id="nav-grafico2-tab" title="Productos con más comentarios">Productos con las mejores calificaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#nav-grafico3" class="nav-link side" aria-expanded="true" id="nav-grafico3-tab" title="Cantidad de productos por categoría">Cantidad de productos por categoría</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#nav-grafico4" class="nav-link side" aria-expanded="true" id="nav-grafico4-tab" title="Clientes nuevos en la última semana">Clientes nuevos en la última semana</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#nav-grafico5" class="nav-link side" aria-expanded="true" id="nav-grafico5-tab" title="Productos más vendidos" title="Clientes con más ordenes">Clientes con más órdenes</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-grafico1" role="tabpanel" aria-labelledby="nav-grafico1-tab">
                                            <canvas class="" id="grafico1" width="100%" height="54"></canvas>
                                            <button class="btn dash__table_button mt-4 mx-auto" type="button" onclick="productosMasVendidos()">Descargar reporte</button>
                                        </div>
                                        <div class="tab-pane fade" id="nav-grafico2" role="tabpanel" aria-labelledby="nav-grafico2-tab">
                                            <canvas class="" id="grafico2" width="100" height="54"></canvas>
                                        </div>
                                        <div class="tab-pane fade" id="nav-grafico3" role="tabpanel" aria-labelledby="nav-grafico3-tab">
                                            <canvas class="" id="grafico3" width="100" height="54"></canvas>
                                        </div>
                                        <div class="tab-pane fade" id="nav-grafico4" role="tabpanel" aria-labelledby="nav-grafico4-tab">
                                            <canvas class="" id="grafico4" width="100" height="54"></canvas>
                                            <button class="btn dash__table_button mt-4 mx-auto" type="button" onclick="clientesNuevos()">Descargar reporte</button>
                                        </div>
                                        <div class="tab-pane fade" id="nav-grafico5" role="tabpanel" aria-labelledby="nav-grafico5-tab">
                                            <canvas class="" id="grafico5" width="100" height="54"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
dashboardTemplate::dashModalOrden();
dashboardTemplate::dashEnd('dashboard.js');
?>
