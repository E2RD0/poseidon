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
                    <p class="recover__message text-break">Haz clic en el enlace que se envió a tu correo electrónico o ingresa el código de recuperación.</p>
                </div>
                <div class="col-8">
                    <form action="" method="post" id="code-form">
                        <div class="row main__rows">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="inputCódigo" class="form-field__label">Código de recuperación</label>
                                        <input name="email" type="text" required class="d-none" value="<?= EMAIL?>">
                                        <input id="inputCódigo" name="pin" type="text" class="form-field__input" required/>
                                    </div>
                                    <p class="form-error-label" id="errorCódigo"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col text-center">
                                <button class="btn recover__button" type="button" onclick="redirect('admin/user/login')">
                                    Cancelar
                                </button>
                                <button class="btn main__button" type="submit" id="code-submit">Verificar</button>
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
