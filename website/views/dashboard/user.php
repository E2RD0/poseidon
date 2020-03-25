<?php
require_once('core/helpers/dashboard_template.php');
dashboardTemplate::dashHead('Mi perfil');
dashboardTemplate::dashMenu('user');
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
                                        <a data-toggle="tab" href="#usuarios" class="nav-link active dash__tab_title" aria-expanded="true">Mi perfil</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active py-3 px-3 px-sm-0" id="agregarusuario" role="tabpanel">
                                    <div class="row my-5">
                                        <div class="col-12 col-lg-6 mx-md-auto">
                                            <div class="ml-lg-4">
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-3 ml-md-0">
                                                        <p class="text-md-right">Nombre(s)</p>
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-3 ml-md-0">
                                                        <p class="text-md-right">Apellido(s)</p>
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-3 ml-md-0">
                                                        <p class="text-md-right">Correo eléctronico</p>
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="text" type="email" class="dash__text_fields form-field__input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-3 ml-md-0">
                                                        <p class="text-md-right">Cambiar contraseña</p>
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="clave" type="password" class="dash__text_fields form-field__input" required id="recordar" data-toggle="collapse" href="#contra" role="button" aria-expanded="false" aria-controls="collapseExample" />
                                                                    <i class="fas fa-eye password__show"></i> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="contra">
                                                    <div class="row mt-4 ml-md-2">
                                                        <div class="col-12 col-md-3 ml-md-0">
                                                            <p class="text-md-right">Ingresa la nueva contraseña</p>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div class="col-12">
                                                                <div class="form-field">
                                                                    <div class="form-field__control">
                                                                        <input id="clave" type="password" class="dash__text_fields form-field__input" required />
                                                                        <i class="fas fa-eye password__show"></i> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4 ml-md-2">
                                                        <div class="col-12 col-md-3 ml-md-0">
                                                            <p class="text-md-right">Repite la contraseña</p>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div class="col-12">
                                                                <div class="form-field">
                                                                    <div class="form-field__control">
                                                                        <input id="clave" type="password" class="dash__text_fields form-field__input" required />
                                                                        <i class="fas fa-eye password__show"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center justify-content-md-end">
                                                    <div class="">
                                                        <div class="mr-md-5 text-center">
                                                            <button type="button" class="ml-auto btn recover__button" onclick="location.href='dashboard.php'">Cancelar</button>
                                                            <button type="button" class="btn main__button">Guardar cambios</button>
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
            </div>
        </div>
</main>
<?php
dashboardTemplate::dashEnd();
?>
