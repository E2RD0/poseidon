<?php
require_once('templates/login_template.php');
loginTemplate::loginHead("Recuperar contraseña");
?>

<main class="main__bg">
    <div class="row justify-content-md-end m-0">
        <div class="main__login">
            <div class="row justify-content-center m-0">
                <div class="col-12 recover__form text-center">
                  <img src="<?= HOME_PATH?>resources/img/dashboard/poseidon-l.svg" alt="logo poseidon" class="img-fluid">
                    <p class="recover__message text-break">Ingresa tu correo electrónico
                        y te enviaremos un enlace para reestablecer tu contraseña</p>
                </div>
                <div class="col-8">
                    <form autocomplete="off" action="" method="post" id="recover-form">
                        <div class="row main__rows">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="inputEmail" class="form-field__label">Correo electrónico</label>
                                        <input id="inputEmail" name="email" type="email" class="form-field__input" required/>
                                    </div>
                                    <p class="form-error-label" id="errorEmail"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col text-center">
                                <button class="btn recover__button" type="button" onclick="redirect('admin/user/login', true)">
                                    Átras
                                </button>
                                <button class="btn main__button" type="submit" id="recover-submit">Enviar</button>
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
