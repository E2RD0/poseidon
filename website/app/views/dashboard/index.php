<?php
require_once 'templates/login_template.php';
loginTemplate::loginHead('Iniciar Sesión');
?>

<main class="main__bg">
    <div class="row justify-content-md-end m-0">
        <div class="main__login">
            <div class="row justify-content-center m-0">
                <div class="col-12 main__form text-center">
                    <img src="<?= HOME_PATH?>resources/img/dashboard/poseidon-l.svg" alt="logo poseidon" class="img-fluid">
                    <p class="main__message text-break">¡Bienvenido de vuelta! Por favor inicia sesión con tu cuenta.
                    </p>
                </div>
                <div class="col-8">
                    <form action="" id="login-form" method="POST">
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
                            <p class="main__login_text">
                                <input type="checkbox" class="c filled-in" id="recordar" />
                                <label for="recordar">Recuérdame</label>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button class="btn main__button" type="submit" id="login-submit">Iniciar Sesión</button>
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-center">
                                <a class="main__forget_pass" href="javascript:void(0)" onclick="redirect('admin/user/recoverPassword', true)">Olvidé mi contraseña</a>
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
loginTemplate::loginEnd('login.js');
?>
