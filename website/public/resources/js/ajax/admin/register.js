const API_USUARIOS = HOME_PATH + 'api/dashboard/users.php?action=';

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
        if (response.status==1) {
            redirect('user/login')
        } else if(response.status==-1){
            console.log('error con db');
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Nombre');
        checkFields(errors, 'Apellido');
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
