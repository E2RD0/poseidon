<?php
require_once 'templates/login_template.php';
loginTemplate::loginHead('Iniciar Sesión');
?>

<main class="main__bg">
    <div class="row justify-content-md-end m-0">
        <div class="main__login">
            <div class="row justify-content-center m-0">
                <div class="col-12 main__form text-center">
                    <img src="<?= $_ENV['HOME_PATH']?>resources/img/dashboard/poseidon-l.svg" alt="logo poseidon" class="img-fluid">
                    <p class="main__message text-break">¡Bienvenido al sistema! Es necesario crear el primer usuario.
                    </p>
                </div>
                <div class="col-8">
                    <form action="" id="register-form" method="POST">
                      <div class="row main__rows">
                          <div class="col-sm">
                              <div class="form-field">
                                  <div class="form-field__control">
                                      <label for="name" class="form-field__label">Nombre</label>
                                      <input id="name" name="nombre" type="text" class="form-field__input" required />
                                  </div>
                                  <p class="form-error-label" id="errorNombre"></p>
                              </div>
                          </div>
                      </div>
                      <div class="row main__rows">
                          <div class="col-sm">
                              <div class="form-field">
                                  <div class="form-field__control">
                                      <label for="lastname" class="form-field__label">Apellido</label>
                                      <input id="lastname" name="apellido" type="text" class="form-field__input" required />
                                  </div>
                                  <p class="form-error-label" id="errorApellido"></p>
                              </div>
                          </div>
                      </div>
                        <div class="row main__rows">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="correo" class="form-field__label">Correo electrónico</label>
                                        <input id="correo" name="email" type="email" class="form-field__input" required />
                                    </div>
                                    <p class="form-error-label" id="errorEmail"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row main__form_pass">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="clave" class="form-field__label">Contraseña</label>
                                        <input id="clave" name="password" type="password" class="form-field__input" required />
                                        <i class="fas fa-eye password__show"></i>
                                    </div>
                                    <p class="form-error-label" id="errorPassword"></p>
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
