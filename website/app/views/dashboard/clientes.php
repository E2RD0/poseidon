<?php
require_once('templates/dashboard_template.php');
dashboardTemplate::dashHead('Clientes');
dashboardTemplate::dashMenu('clientes');
?>

<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <ul class="nav nav-categorias" role="tablist">
                        <li class="nav-item">
                            <a id="tabClientes" data-toggle="tab" href="#alquileres" class="nav-link active dash__tab_title" aria-expanded="true">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a id="tabEdit" data-toggle="tab" href="#editarCliente" class="nav-link dash__tab_title" aria-expanded="true">Editar cliente</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table dash__main_table w-100" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellido(s)</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>En línea</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div id="spinner" class="w-100 text-center">
                          No hay ningún registro
                        </div>
                    </div>
                </div>
                <div class="tab-pane py-3 px-3 px-sm-0" id="editarCliente" role="tabpanel">
                    <form autocomplete="off" id="clients-form" method="post" action="" class="row my-5">
                        <div class="col-12 col-lg-6 mx-md-auto">
                            <div class="ml-lg-4">
                                <div class="row mt-4 ml-md-2">
                                    <div class="col-12 col-md-2 ml-md-0">
                                        <p class="text-md-right">Nombre(s)</p>
                                    </div>
                                    <div class="col-12 col-md-10 mt-md-2">
                                        <div class="col-12">
                                            <div class="form-field">
                                                <div class="form-field__control">
                                                    <input id="inputNombre" name="nombre" type="text" class="dash__text_fields form-field__input" />
                                                </div>
                                                <p class="form-error-label" id="errorNombre"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 ml-md-2">
                                    <div class="col-12 col-md-2 ml-md-0">
                                        <p class="text-md-right">Apellido(s)</p>
                                    </div>
                                    <div class="col-12 col-md-10 mt-md-2">
                                        <div class="col-12">
                                            <div class="form-field">
                                                <div class="form-field__control">
                                                    <input id="inputApellido" name="apellido" type="text" class="dash__text_fields form-field__input" />
                                                </div>
                                                <p class="form-error-label" id="errorApellido"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 ml-md-2">
                                    <div class="col-12 col-md-2 ml-md-0">
                                        <p class="text-md-right">Correo eléctronico</p>
                                    </div>
                                    <div class="col-12 col-md-10 mt-md-2">
                                        <div class="col-12">
                                            <div class="form-field">
                                                <div class="form-field__control">
                                                    <input name="email" id="inputEmail" type="email" class="dash__text_fields form-field__input" />
                                                </div>
                                                <p class="form-error-label" id="errorEmail"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 ml-md-2">
                                    <div class="col-12 col-md-2 ml-md-0">
                                        <p class="text-md-right">Dirección</p>
                                    </div>
                                    <div class="col-12 col-md-10 mt-md-2">
                                        <div class="col-12">
                                            <div class="form-field">
                                                <div class="form-field__control">
                                                    <textarea name="direccion" id="inputDirección" type="text" class="dash__text_fields form-field__input"></textarea>
                                                </div>
                                                <p class="form-error-label" id="errorDirección"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 ml-md-2">
                                    <div class="col-12 col-md-2 ml-md-0">
                                        <p class="text-md-right">Teléfono(s)</p>
                                    </div>
                                    <div class="col-12 col-md-10 mt-md-2">
                                        <div class="col-12">
                                            <div class="form-field">
                                                <div class="form-field__control">
                                                    <input id="inputTeléfono" name="telefono" type="text" class="dash__text_fields form-field__input" />
                                                </div>
                                                <p class="form-error-label" id="errorTeléfono"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-4 ml-md-2">
                                    <div class="col-12 col-md-2 ml-md-0">
                                        <p class="text-md-right">Estado</p>
                                    </div>
                                    <div class="col-12 col-md-10 mt-md-2">
                                        <div class="dropdown ml-3">
                                            <select class="custom-select" name="idEstadoCliente" id="inputEstado">
                                                <option selected value="">Selecciona...</option>
                                            </select>
                                            <p class="form-error-label" id="errorEstado"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center justify-content-md-end">
                                <div class="">
                                    <div class="mr-md-5 text-center">
                                        <button id="clients-cancel" type="button" class="ml-auto btn recover__button">Cancelar</button>
                                        <button id="clients-submit" type="submit" class="btn main__button">Actualizar cliente</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
dashboardTemplate::dashEnd('clients.js');
?>
