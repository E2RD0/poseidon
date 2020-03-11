<?php
require_once('core/helpers/dashboard_template.php');
dashboardTemplate::dashHead('Sucursales');
dashboardTemplate::dashMenu('sucursales');
?>
<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="col-md-12 col-lg-12 p-0">
                                <ul class="nav nav-categorias" role="tablist">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#alquileres" class="nav-link active dash__tab_title" aria-expanded="true">Sucursales</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table dash__main_table w-100" id="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nombre</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Playa El Tunco</td>
                                                <td class="td-actions text-center">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Barra de Santiago</td>
                                                <td class="td-actions text-center">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>El puerto de la libertad</td>
                                                <td class="td-actions text-center">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="col-md-12 col-lg-12 p-0">
                                <ul class="nav nav-categorias" role="tablist">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#alquileres" class="nav-link active dash__tab_title" aria-expanded="true">Añadir una nueva sucursal</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                                <div class="row mt-4">
                                    <div class="col-md-4 col-12 text-lg-right">
                                        <p>Nombre de la sucursal</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-field">
                                            <div class="form-field__control">
                                                <input id="correo" type="email" class="dash__text_fields form-field__input" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 col-12 text-lg-right">
                                        <p>Dirección</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-field">
                                            <div class="form-field__control">
                                                <textarea id="exampleTextarea" class="form-field__textarea dash__text_fields"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 justify-content-md-end justify-content-center">
                                        <span class="mr-3">
                                            <button type="button" class="btn recover__button">Cancelar</button>
                                            <button type="button" class="btn main__button">Agregar sucursal</button>
                                        </span>
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
dashboardTemplate::dashEnd();
?>
