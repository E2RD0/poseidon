<?php
require_once('templates/dashboard_template.php');
dashboardTemplate::dashHead('Categorías');
dashboardTemplate::dashMenu('categorias');
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
                                        <a data-toggle="tab" href="#categorias" class="nav-link active dash__tab_title" aria-expanded="true">Categorías</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane active py-3 px-3 px-sm-0" id="categorias" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table dash__main_table w-100" id="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Categorí­a</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tabla de surf</td>
                                                <td class="td-actions text-center">
                                                    <div class="dropdown">
                                                        <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <button class="dropdown-item" type="button">
                                                                <span>
                                                                    <i class="fas fa-edit"></i>
                                                                    <p>Modíficar</p>
                                                                </span>
                                                            </button>
                                                            <div class="dropdown-divider"></div>
                                                            <button class="dropdown-item" type="button">
                                                                <span>
                                                                    <i class="fas fa-times"></i>
                                                                    <p>Eliminar</p>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Accesorios</td>
                                                <td class="td-actions text-center">
                                                    <div class="dropdown">
                                                        <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <button class="dropdown-item" type="button">
                                                                <span>
                                                                    <i class="fas fa-edit"></i>
                                                                    <p>Modíficar</p>
                                                                </span>
                                                            </button>
                                                            <div class="dropdown-divider"></div>
                                                            <button class="dropdown-item" type="button">
                                                                <span>
                                                                    <i class="fas fa-times"></i>
                                                                    <p>Eliminar</p>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Ropa</td>
                                                <td class="td-actions text-center">
                                                    <div class="dropdown">
                                                        <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <button class="dropdown-item" type="button">
                                                                <span>
                                                                    <i class="fas fa-edit"></i>
                                                                    <p>Modíficar</p>
                                                                </span>
                                                            </button>
                                                            <div class="dropdown-divider"></div>
                                                            <button class="dropdown-item" type="button">
                                                                <span>
                                                                    <i class="fas fa-times"></i>
                                                                    <p>Eliminar</p>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php dashboardTemplate::dashCategorias('add'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
dashboardTemplate::dashEnd();
?>
