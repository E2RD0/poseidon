const API_USUARIOS = '../api/dashboard/users.php?action=';

$( document ).ready(function() {
    checkUsuarios();
});

$( '#register-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'register',
        data: $( '#register-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#register-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            $("#register-submit")[0].innerHTML = 'Registrarme';
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if ( response.status ) {
            console.log('usuario registrado correctamente');
            //sweetAlert( 1, response.message, 'index.php' );
        } else if(response.status == -1){
            console.log('error con db');
            //sweetAlert( 2, response.exception, null );
        }
        else{
            var errors = response.errors;
            console.log('hay errores');
            if (errors.Email) {
                console.log(errors.Email[0]);
            }
        }
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
