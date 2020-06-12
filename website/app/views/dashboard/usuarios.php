<?php
require_once('templates/dashboard_template.php');
dashboardTemplate::dashHead('Usuarios');
dashboardTemplate::dashMenu('usuarios');
?>
<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="col-md-12 col-lg-12 p-0">
                                <ul class="nav nav-categorias justify-content-center justify-content-lg-start" role="tablist">
                                    <li class="nav-item">
                                        <a id="tabUsuarios" data-toggle="tab" href="#usuarios" class="nav-link active dash__tab_title" aria-expanded="true">Usuarios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="tabEdit" data-toggle="tab" href="#agregarusuario" class="nav-link dash__tab_title" aria-expanded="true">Agregar un usuario</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active py-3 px-3 px-sm-0" id="usuarios" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table dash__main_table w-100" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nombre(s)</th>
                                                    <th>Apellido(s)</th>
                                                    <th>Correo</th>
                                                    <th>Tipo</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <div id="usersSpinner" class="w-100 text-center">
                                          No hay ningún registro
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane py-3 px-3 px-sm-0" id="agregarusuario" role="tabpanel">
                                    <form id="users-form" method="post" action="" class="row my-5">
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
                                                        <p class="text-md-right">Contraseña</p>
                                                    </div>
                                                    <div class="col-12 col-md-10 mt-md-2">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input name="password" id="inputContraseña" type="password" class="dash__text_fields form-field__input" />
                                                                </div>
                                                                <p class="form-error-label" id="errorContraseña"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-4 ml-md-2">
                                                    <div class="col-12 col-md-2 ml-md-0">
                                                        <p class="text-md-right">Tipo de usuario</p>
                                                    </div>
                                                    <div class="col-12 col-md-10 mt-md-2">
                                                        <div class="dropdown ml-3">
                                                            <select class="custom-select" name="idTipoUsuario" id="inputTipo">
                                                                <option selected value="">Selecciona...</option>
                                                            </select>
                                                            <p class="form-error-label" id="errorTipo"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center justify-content-md-end">
                                                <div class="">
                                                    <div class="mr-md-5 text-center">
                                                        <button id="users-cancel" type="button" class="ml-auto btn recover__button d-none">Cancelar</button>
                                                        <button id="users-submit" type="submit" class="btn main__button">Agregar usuario</button>
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
            </div>
        </div>
    </div>
</main>
<?php
dashboardTemplate::dashEnd('users.js');
?>
