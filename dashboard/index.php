<?php
require_once 'core/helpers/login_template.php';
loginTemplate::loginHead('Iniciar Sesión');
?>

<main class="main__bg">
    <div class="row justify-content-md-end m-0">
        <div class="main__login">
            <div class="row justify-content-center m-0">
                <div class="col-12 main__form text-center">
                    <img src="resources/img/poseidon-l.svg" alt="logo poseidon" class="img-fluid">
                        <p class="main__message text-break">¡Bienvenido de vuelta! Por favor inicia sesión con tu cuenta.</p>
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
                            <div class="row main__form_pass">
                                <div class="col-sm">
                                    <div class="form-field">
                                        <div class="form-field__control">
                                            <label for="clave" class="form-field__label">Contraseña</label>
                                            <input id="clave" type="password" class="form-field__input" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="main__login_text">
                                    <input type="checkbox" class="c filled-in" id="recordar"/>
                                    <label for="recordar">Recuérdame</label>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button class="btn main__button" type="submit">Iniciar Sesión</button>
                                </div>
                                <div class="w-100"></div>
                                <div class="col text-center">
                                    <a class="main__forget_pass" href="recuperar-clave.php">Olvidé mi contraseña</a>
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
loginTemplate::loginEnd();
?>
