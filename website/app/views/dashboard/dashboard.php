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
                    <hr class="dash__div"></hr>
                    <div class="row pt-0 pb-2">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <nav class="d-sm-none d-md-none d-lg-block">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-item nav-link pb-0 active" id="nav-grafico1-tab" data-toggle="tab" href="#nav-grafico1" role="tab" aria-controls="nav-grafico1" aria-selected="true">
                                        <p title="Productos más vendidos">Productos más vendidos</p>
                                    </a>
                                    <a class="nav-item nav-link pb-0" id="nav-grafico2-tab" data-toggle="tab" href="#nav-grafico2" role="tab" aria-controls="nav-grafico2" aria-selected="false">
                                        <p title="Productos con más comentarios">Productos con las mejores calificaciones</p>
                                    </a>
                                    <a class="nav-item nav-link pb-0" id="nav-grafico3-tab" data-toggle="tab" href="#nav-grafico3" role="tab" aria-controls="nav-grafico3" aria-selected="false">
                                        <p title="Cantidad de productos por categoría">Cantidad de productos por categoría</p>
                                    </a>
                                    <a class="nav-item nav-link pb-0" id="nav-grafico4-tab" data-toggle="tab" href="#nav-grafico4" role="tab" aria-controls="nav-grafico4" aria-selected="false">
                                        <p title="Clientes nuevos en la última semana">Clientes nuevos en la última semana</p>
                                    </a>
                                    <a class="nav-item nav-link pb-0" id="nav-grafico5-tab" data-toggle="tab" href="#nav-grafico5" role="tab" aria-controls="nav-grafico5" aria-selected="false">
                                        <p title="Clientes con más ordenes">Clientes con más órdenes</p>
                                    </a>
                                </div>
                            </nav>
                            <nav class="d-sm-block d-md-block d-lg-none">
                                <nav class="nav nav-tabs flex-column flex-sm-row">
                                    <a class="flex-sm-fill text-sm-center nav-item nav-link active" title="Productos más vendidos" id="nav-grafico1-tab" data-toggle="tab" href="#nav-grafico1" role="tab" aria-controls="nav-grafico1" aria-selected="true">
                                        <p>Productos más vendidos</p>
                                    </a>
                                    <a class="flex-sm-fill text-sm-center nav-item nav-link" title="Productos con más comentarios" id="nav-grafico2-tab" data-toggle="tab" href="#nav-grafico2" role="tab" aria-controls="nav-grafico2" aria-selected="false">
                                        <p>Productos con las mejores calificaciones.</p>
                                    </a>
                                    <a class="flex-sm-fill text-sm-center nav-item nav-link" title="Cantidad de productos por categoría" id="nav-grafico3-tab" data-toggle="tab" href="#nav-grafico3" role="tab" aria-controls="nav-grafico3" aria-selected="false">
                                        <p>Cantidad de productos por categoría</p>
                                    </a>
                                    <a class="flex-sm-fill text-sm-center nav-item nav-link" title="Clientes nuevos en la última semana" id="nav-grafico4-tab" data-toggle="tab" href="#nav-grafico4" role="tab" aria-controls="nav-grafico4" aria-selected="false">
                                        <p>Clientes nuevos en la última semana</p>
                                    </a>
                                    <a class="flex-sm-fill text-sm-center nav-item nav-link" title="Clientes con más ordenes"id="nav-grafico5-tab" data-toggle="tab" href="#nav-grafico5" role="tab" aria-controls="nav-grafico5" aria-selected="false">
                                        <p>Clientes con más órdenes</p>
                                    </a>
                                </div>
                            </nav>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-grafico1" role="tabpanel" aria-labelledby="nav-grafico1-tab">
                                                <canvas class="" id="grafico1" width="100%" height="56"></canvas>
                                            </div>
                                            <div class="tab-pane fade" id="nav-grafico2" role="tabpanel" aria-labelledby="nav-grafico2-tab">
                                                <canvas class="" id="grafico2" width="100" height="60"></canvas>
                                            </div>
                                            <div class="tab-pane fade" id="nav-grafico3" role="tabpanel" aria-labelledby="nav-grafico3-tab">
                                                <canvas class="" id="grafico3" width="100" height="60"></canvas>
                                            </div>
                                            <div class="tab-pane fade" id="nav-grafico4" role="tabpanel" aria-labelledby="nav-grafico4-tab">
                                                <canvas class="" id="grafico4" width="100" height="60"></canvas>
                                            </div>
                                            <div class="tab-pane fade" id="nav-grafico5" role="tabpanel" aria-labelledby="nav-grafico5-tab">
                                                <canvas class="" id="grafico5" width="100" height="60"></canvas>
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
    </div>
</main>

<?php
dashboardTemplate::dashModalOrden();
dashboardTemplate::dashEnd('dashboard.js');
?>
