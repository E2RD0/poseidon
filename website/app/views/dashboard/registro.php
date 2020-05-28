<?php
require_once 'templates/login_template.php';
loginTemplate::loginHead('Registro');
?>

<main class="main__bg">
    <div class="row justify-content-md-end m-0">
        <div class="main__login">
            <div class="row justify-content-center m-0">
                <div class="col-12 main__form text-center">
                    <img src="<?= HOME_PATH?>resources/img/dashboard/poseidon-l.svg" alt="logo poseidon" class="img-fluid">
                    <p class="main__message text-break">¡Bienvenido al sistema! Es necesario crear el primer usuario.
                    </p>
                </div>
                <div class="col-8">
                    <form action="" id="register-form" method="POST">
                      <div class="row main__rows">
                          <div class="col-sm">
                              <div class="form-field">
                                  <div class="form-field__control">
                                      <label for="inputNombre" class="form-field__label">Nombre</label>
                                      <input id="inputNombre" name="nombre" type="text" class="form-field__input" required />
                                  </div>
                                  <p class="form-error-label" id="errorNombre"></p>
                              </div>
                          </div>
                      </div>
                      <div class="row main__rows">
                          <div class="col-sm">
                              <div class="form-field">
                                  <div class="form-field__control">
                                      <label for="inputApellido" class="form-field__label">Apellido</label>
                                      <input id="inputApellido" name="apellido" type="text" class="form-field__input" required />
                                  </div>
                                  <p class="form-error-label" id="errorApellido"></p>
                              </div>
                          </div>
                      </div>
                        <div class="row main__rows">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="inputEmail" class="form-field__label">Correo electrónico</label>
                                        <input id="inputEmail" name="email" type="email" class="form-field__input" required />
                                    </div>
                                    <p class="form-error-label" id="errorEmail"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row main__form_pass">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="inputContraseña" class="form-field__label">Contraseña</label>
                                        <input id="inputContraseña" name="password" type="password" class="form-field__input" required />
                                        <i class="fas fa-eye password__show"></i>
                                    </div>
                                    <p class="form-error-label" id="errorContraseña"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button class="btn main__button" type="submit" id="register-submit">Registrarme</button>
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
loginTemplate::loginEnd('register.js');
?>
