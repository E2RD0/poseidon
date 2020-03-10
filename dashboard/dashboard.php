<?php
require_once('core/helpers/dashboard_template.php');
dashboardTemplate::dashHead('Dashboard');
dashboardTemplate::dashMenu('dashboard');
?>

<main>
    <nav class="container-fluid position-absolute navbar navbar--main">
        <div class="container">
            <a href="#" class="navbar-brand"><img class="navbar__logo d-inline-block align-top" src="resources/img/poseidon-l.svg" alt="Logo de Poseidón"></a>
            <div class="burger-container">
                <div id="burger">
                    <div class="bar topBar"></div>
                    <div class="bar btmBar"></div>
                    <div class="bar lastBar"></div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="col-12 dash__main_card">
                <div class="row my-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col d-flex flex-row justify-content-between">
                                <p class="dash__main_title p-0">Ordenes
                                    <span class="dash__main_indicator">5</span>
                                </p>
                                <span class="p-1">
                                    <button class="btn dash__main_button" type="button" onclick="location.href='ordenes.php'">
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
                                        <th>Nombre del cliente</th>
                                        <th>Dirección</th>
                                        <th>Total</th>
                                        <th class="text-right">No. de orden</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Andrew Mike</td>
                                        <td>Develop</td>
                                        <td>€ 99,225</td>
                                        <td class="text-right">2013</td>
                                        <td class="td-actions text-right">
                                            <button class="btn dash__table_button" type="button" data-toggle="modal"
                                            data-target="#orden"
                                            id="modal_open">Detalles de la orden</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Design</td>
                                        <td>€ 89,241</td>
                                        <td class="text-right">2012</td>
                                        <td class="td-actions text-right">
                                            <button class="btn dash__table_button" type="button" data-toggle="modal"
                                            data-target="#orden"
                                            id="modal_open">Detalles de la orden</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alex Mike</td>
                                        <td>Design</td>
                                        <td>€ 92,144</td>
                                        <td class="text-right">2010</td>
                                        <td class="td-actions text-right">
                                            <button class="btn dash__table_button" type="button" data-toggle="modal"
                                            data-target="#orden"
                                            id="modal_open">Detalles de la orden</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mike Monday</td>
                                        <td>Marketing</td>
                                        <td>€ 49,990</td>
                                        <td class="text-right">2009</td>
                                        <td class="td-actions text-right">
                                            <button class="btn dash__table_button" type="button" data-toggle="modal"
                                            data-target="#orden"
                                            id="modal_open">Detalles de la orden</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Paul Dickens</td>
                                        <td>Communication</td>
                                        <td>€ 69,201</td>
                                        <td class="text-right">2008</td>
                                        <td class="td-actions text-right">
                                            <button class="btn dash__table_button" type="button" data-toggle="modal"
                                            data-target="#orden"
                                            id="modal_open">Detalles de la orden</button>
                                        </td>
                                    </tr>
                                </tbody>
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
                            <p class="dash__main_title p-0">Productos</p>
                            <span class="p-1">
                                <button class="btn dash__main_button" type="button" onclick="location.href='dashboard.php'">
                                    Ver todos
                                </button>
                            </span>
                        </div>
                    </div>
                    <hr class="dash__div">
                    <div class="row dash__side_card1_container">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <p class="dash__sc1_text">Tabla de surf X</p>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12 dash__bar">
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="dash__sc1c_text">5 restantes</p>
                        </div>
                    </div>
                    <div class="row dash__side_card1_container">
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <p class="dash__sc1_text">Tabla de surf X</p>
                        </div>
                        <div class="col-lg-9 c8ol-md-8 col-sm-12 col-12 dash__bar">
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="dash__sc1c_text">20 restantes</p>
                        </div>
                    </div>
                    <div class="row dash__side_card1_container">
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <p class="dash__sc1_text">Tabla de surf X</p>
                        </div>
                        <div class="col-lg-9 c8ol-md-8 col-sm-12 col-12 dash__bar">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="35"></div>
                            </div>
                            <p class="dash__sc1c_text">30 restantes</p>
                        </div>
                    </div>
                    <div class="row dash__side_card1_container">
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <p class="dash__sc1_text">Tabla de surf X</p>
                        </div>
                        <div class="col-lg-9 c8ol-md-8 col-sm-12 col-12 dash__bar">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20"></div>
                            </div>
                            <p class="dash__sc1c_text">20 restantes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-sm-12 mt-4">
                <div class="col-12 dash__side_card2">
                    <div class="row">
                        <div class="col d-flex flex-row justify-content-between my-3">
                            <p class="dash__main_title mr-auto p-0">Ventas</p>
                            <span class="align-self-center p-2">
                                <input placeholder="Desde: dd/mm/yyyy" type="text" name="fecha1" id="fecha1" class="form-control dash__input">
                            </span>
                            <span class="align-self-center p-2">
                                <input placeholder="Hasta: dd/mm/yyyy" type="text" name="fecha2" id="fecha2" class="form-control dash__input">
                            </span>
                        </div>
                    </div>
                    <hr class="dash__div"></hr>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="col-12">
                                <div id="canva" class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="card dash__graph">
                                        <div class="card-body">
                                            <canvas id="chBar"></canvas>
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
dashboardTemplate::dashModal();
dashboardTemplate::dashEnd();
?>
