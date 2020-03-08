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
                                        <a
                                            data-toggle="tab"
                                            href="#alquileres"
                                            class="nav-link active dash__tab_title"
                                            aria-expanded="true">Sucursales</a>
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
                                                    <div class="grid_item">
                                                        <div class="grid_item__inner" style="width:43px; height: 26px; ">
                                                            <input id="menu-3" type="checkbox" style="display: none">
                                                            <label for="menu-3">
                                                                <div
                                                                    class="menu"
                                                                    style="transition: all 0.4s;position: relative;width: 43px;height: 43px;border-radius: 100%;cursor: pointer;">
                                                                    <div
                                                                        class="menu_part"
                                                                        style="
width: 6px;
height: 6px;
position: absolute;
background: #313d44;
right: 0;
margin: auto;
left: 0;
border-radius: 6px;
transition: all 0.4s cubic-bezier(0.5, 0, 0.3, 1.2);
width:23;top: calc(50% - ((11px)) + -2px);"></div>
                                                                    <div
                                                                        class="menu_part"
                                                                        style="
width: 6px;
height: 6px;
position: absolute;
background: #313d44;
right: 0;
margin: auto;
left: 0;
border-radius: 6px;
transition: all 0.4s cubic-bezier(0.5, 0, 0.3, 1.2);
width:23;top: calc(50% - ((11px)) + 6px);"></div>
                                                                    <div
                                                                        class="menu_part"
                                                                        style="
width: 6px;
height: 6px;
position: absolute;
background: #313d44;
right: 0;
margin: auto;
left: 0;
border-radius: 6px;
transition: all 0.4s cubic-bezier(0.5, 0, 0.3, 1.2);
width:23;top: calc(50% - ((11px)) + 14px);"></div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
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
                                        <a
                                            data-toggle="tab"
                                            href="#alquileres"
                                            class="nav-link active dash__tab_title"
                                            aria-expanded="true">Añadir una nueva sucursal</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4 col-12 text-right">
                                        <p>Nombre de la sucursal</p>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="col-sm">
                                            <div class="form-field">
                                                <div class="form-field__control">
                                                    <input id="correo" type="email" class="form-field__input" required="required"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-12 text-right">
                                        <p>Dirección</p>
                                    </div>
                                    <div class="col-md-8 col-12"></div>
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
