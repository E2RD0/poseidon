<?php
require_once('templates/login_template.php');
loginTemplate::loginHead('Recuperar contraseña');
?>

<main class="main__bg">
    <div class="row justify-content-md-end m-0">
        <div class="main__login">
            <div class="row justify-content-center m-0">
                <div class="col-12 main__form text-center">
                    <img src="<?=HOME_PATH?>resources/img/dashboard/poseidon-l.svg" alt="logo poseidon" class="img-fluid">
                    <p class="main__message text-break">Ahora tienes que cambiar tu contraseña.</p>
                </div>
                <div class="col-8">
                    <form autocomplete="off" action="" id="form-newPassword">
                        <div class="row main__rows">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="inputNuevaContraseña" class="form-field__label">Ingresa la nueva contraseña</label>
                                        <input name="newPassword" id="inputNuevaContraseña" type="password" class="form-field__input" required="required" />
                                    </div>
                                    <p class="form-error-label" id="errorNuevaContraseña"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row main__form_pass">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="inputnewPasswordR" class="form-field__label">Repite la contraseña</label>
                                        <input name="newPasswordR" id="inputNewPasswordR" type="password" class="form-field__input" required="required" />
                                    </div>
                                    <p class="form-error-label" id="errorNewPasswordR"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-right">
                                    <button class="btn main__button" type="submit" id="password-submit">Cambiar contraseña</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
loginTemplate::loginEnd('recoverPassword.js');
?>
