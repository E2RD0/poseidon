<?php
require_once('templates/dashboard_template.php');
dashboardTemplate::dashHead('Ordenes');
dashboardTemplate::dashMenu('ordenes');
?>

<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <ul class="nav nav-categorias" role="tablist">
                        <li class="nav-item">
                            <a data-toggle="tab" href="#ordenes" class="nav-link active dash__tab_title" aria-expanded="true">Ordenes</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane active py-3 px-3 px-sm-0" id="ordenes" role="tabpanel">
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
                            <div id="categoriesSpinner" class="w-100 text-center">
                                No hay ningún registro
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
dashboardTemplate::dashModalOrden();
dashboardTemplate::dashEnd('ordenes.js');
?>
