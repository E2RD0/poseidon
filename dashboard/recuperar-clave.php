<?php
require_once('core/helpers/login_template.php');
loginTemplate::loginHead('Recuperar contraseña');
?>

<main class="main__bg">
    <div class="row justify-content-md-end m-0">
        <div class="main__login">
            <div class="row justify-content-center m-0">
                <div class="col-12 main__form text-center">
                    <img src="resources/img/poseidon-l.svg" alt="logo poseidon" class="img-fluid">
                    <p class="main__message text-break">Tu contraseña se ha reestablecido.</p>
                </div>
                <div class="col-8">
                    <form action="">
                        <div class="row main__rows">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="clave" class="form-field__label">Ingresa la nueva contraseña</label>
                                        <input id="clave" type="password" class="form-field__input" required />
                                        <i class="fas fa-eye password__show"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row main__form_pass">
                            <div class="col-sm">
                                <div class="form-field">
                                    <div class="form-field__control">
                                        <label for="rclave" class="form-field__label">Repite la contraseña</label>
                                        <input id="rclave" type="password" class="form-field__input" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="recover__pass cgreen">
                                    <i class="fas fa-check"></i>
                                    <p class="recover__pass__text">Tiene 8 caracteres o más</p>
                                </div>
                                <div class="recover__pass cred">
                                    <i class="fas fa-times times"></i>
                                    <p class="recover__pass__text">Contiene una mayúscula</p>
                                </div>
                                <div class="recover__pass cgreen">
                                    <i class="fas fa-check"></i>
                                    <p class="recover__pass__text">Contiene una minúscula</p>
                                </div>
                                <div class="recover__pass cred">
                                    <i class="fas fa-times times"></i>
                                    <p class="recover__pass__text">Contiene un número</p>
                                </div>
                                <div class="recover__pass cgreen">
                                    <i class="fas fa-check"></i>
                                    <p class="recover__pass__text">Contiene un carácter especial</p>
                                </div>
                                <div class="recover__pass cred">
                                    <i class="fas fa-times times"></i>
                                    <p class="recover__pass__text">Amabas contraseñas son iguales</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-right">
                                    <button class="btn main__button" type="button"
                                        onclick="location.href='index.php'">Cambiar contraseña</button>
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
