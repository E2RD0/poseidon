<?php
require_once('templates/dashboard_template.php');
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
                                            <form autocomplete="off" class="ml-lg-4" action="" method="post" id="settings-form">
                                              <div class="d-flex justify-content-center" id="spinnerSettings">
                                              <div class="spinner-grow" role="status" >
                                                <span class="sr-only">Loading...</span>
                                              </div>
                                              </div>
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-3 ml-md-0">
                                                        <p class="text-md-right">Nombre(s)</p>
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="inputNombre" name="nombre" type="text" class="dash__text_fields form-field__input" required />
                                                                </div>
                                                                <p class="form-error-label" id="errorNombre"></p>
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
                                                                    <input id="inputApellido" name="apellido" type="text" class="dash__text_fields form-field__input" required />
                                                                </div>
                                                                <p class="form-error-label" id="errorApellido"></p>
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
                                                                    <input id="inputEmail" name="email" type="email" class="dash__text_fields form-field__input" required />
                                                                </div>
                                                                <p class="form-error-label" id="errorEmail"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-3 ml-md-0">
                                                        <p class="text-md-right" id="pCambiarContraseña">Cambiar contraseña</p>
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="inputContraseña" name="password" type="password" class="dash__text_fields form-field__input" />
                                                                </div>
                                                                <p class="form-error-label" id="errorContraseña"></p>
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
                                                                        <input id="inputNuevaContraseña" name="newPassword" type="password" class="dash__text_fields form-field__input" />
                                                                    </div>
                                                                        <p class="form-error-label" id="errorNuevaContraseña"></p>
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
                                                                        <input id="inputNewPasswordR" name="newPasswordR" type="password" class="dash__text_fields form-field__input" />
                                                                        <i class="fas fa-eye password__show"></i>
                                                                    </div>
                                                                    <p class="form-error-label" id="errorNewPasswordR"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center  ">
                                                  <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="2fa-check" disabled>
                                                  <label class="custom-control-label" for="2fa-check">Activar verificación en 2 pasos.</label>
                                                  </div>
                                                </div>
                                                <div class="row justify-content-center justify-content-md-end">
                                                    <div class="">
                                                        <div class="mr-md-5 text-center">
                                                            <button type="button" class="ml-auto btn recover__button" onclick="redirect('dashboard', true)">Cancelar</button>
                                                            <button id="settings-submit" type="submit" class="btn main__button">Guardar cambios</button>
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
        </div>
</main>

<div class="modal fade twofa" id="2fa-modal" tabindex="-1" role="dialog" aria-labelledby="2fa-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Verificación en 2 pasos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <?php

          $tfa = new \RobThree\Auth\TwoFactorAuth;('Poseidon');
           $secret = $tfa->createSecret(160);
          ?>
        <img alt="Código QR" class="qr-image" src="<?= $tfa->getQRCodeImageAsDataUri('Poseidon', $secret) ?>">
        <p class="text-muted" id="secret"><?= chunk_split($secret, 4, ' ')?></p>
        <form id="form">
    <div class="form__group form__pincode">
      <label>Ingresa el código de 6 dígitos de tu aplicación de autenticación</label>
      <input type="tel" name="pincode-1" maxlength="1" pattern="[\d]*" tabindex="1" placeholder="·" autocomplete="off">
      <input type="tel" name="pincode-2" maxlength="1" pattern="[\d]*" tabindex="2" placeholder="·" autocomplete="off">
      <input type="tel" name="pincode-3" maxlength="1" pattern="[\d]*" tabindex="3" placeholder="·" autocomplete="off">
      <input type="tel" name="pincode-4" maxlength="1" pattern="[\d]*" tabindex="4" placeholder="·" autocomplete="off">
      <input type="tel" name="pincode-5" maxlength="1" pattern="[\d]*" tabindex="5" placeholder="·" autocomplete="off">
      <input type="tel" name="pincode-6" maxlength="1" pattern="[\d]*" tabindex="6" placeholder="·" autocomplete="off">
    </div>
    <div class="form__buttons">
      <button class="button-p button-p--primary" disabled id="save2fa">Continuar</button>
    </div>
  </form>
      </div>
    </div>
  </div>
</div>
<?php
dashboardTemplate::dashEnd('accountSettings.js', '../../vendor/inputmask.min.js', '../../vendor/jquery.inputmask.min.js');
?>
