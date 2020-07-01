const API_USUARIOS = HOME_PATH + 'api/dashboard/users.php?action=';

$( document ).ready(function() {
    checkUsuarios();
});

$( '#recover-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'recoverPassword',
        data: $( '#recover-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#recover-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            $("#recover-submit")[0].innerHTML = 'Enviar';
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if ( response.status == 1) {
            redirect('admin/user/recoverCode');
        } else if (response.status == -1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Email');
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

$( '#code-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'recoverCode',
        data: $( '#code-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#code-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            $("#code-submit")[0].innerHTML = 'Verificar';
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if ( response.status == 1) {
            redirect('admin/user/newPassword');
        } else if (response.status == -1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Código');
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
