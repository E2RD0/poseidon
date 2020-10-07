const API_USUARIOS = HOME_PATH + 'api/dashboard/users.php?action=';

$( document ).ready(function() {
    checkUsuarios();
});

$( '#login-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'login',
        data: $( '#login-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#login-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            $("#login-submit")[0].innerHTML = 'Iniciar Sesión';
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if ( response.status == 1) {
            redirect('admin/dashboard');
        } else if (response.status == -1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Email');
        checkFields(errors, 'Contraseña');
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});

function passwordCaret() {
    let input = document.getElementById("inputContraseña");
    input.type = input.type == "password" ? "text" : "password";
}
