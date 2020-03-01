<?php
require_once('core/helpers/login_template.php');
loginTemplate::loginHead("Recuperar contraseña");
?>

<main class="main__bg">
    <div class="row justify-content-md-end m-0">
        <div class="main__login">
            <div class="row justify-content-center m-0">
                <div class="col-12 recover__form text-center">
                    <img src="resources/img/poseidon-l.svg" alt="logo poseidon" class="img-fluid">
                    <p class="recover__message text-break">Ingreso tu correo electrónico
                    y te enviaremos un enlace para reestablecer tu contraseña</p>
                </div>
                <div class="col-8">
                    <form action="">
                        <div class="row main__rows">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="correo" class="form-field__label">Correo electrónico</label>
                                        <input id="correo" type="email" class="form-field__input" required/>
                                    </div>
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
loginTemplate::loginEnd();
?>
