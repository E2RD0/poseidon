const API = HOME_PATH + 'api/dashboard/users.php?action=';

function checkUsuarios()
{
    $.ajax({
        dataType: 'json',
        url: API + 'userCount'
    })
    .done(function( response ) {
        let current = window.location.pathname;
        if ( current == HOME_PATH + 'admin/user/register' ) {
            //if at least one user exists
            if (response.status) {
                swal(3, response.message +'. Redireccionando a inicio de sesión...', 'admin/user/login', 3000);
            } else {
                swal(5, 'Se necesita registrar el primer usuario del sistema');
            }
        } else {
            //redirect to register if there isn't at least one user
            if (!response.status ) {
                swal(3, response.exception +'. Redireccionando a registro...', 'admin/user/register', 3000);
            }
        }
    })
    .fail(function( jqXHR ) {
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

function logout()
{
    swal(4, '¿Estás seguro de que quieres cerrar sesión?', false, 0, true, out);
}

function out(text="", alert = 1){
    $.ajax({
        dataType: 'json',
        url: API + 'logout'
    })
    .done(function( response ) {
        if ( response.status ) {
            var message = text == "" ? response.message : text;
            swal( alert, message, 'admin/user/login' );
        }
        else if(response.status!= -9) {
            swal( 2, response.exception);
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
}

idleTime = 0;
$(document).ready(function() {

    var idleInterval = setInterval("timerIncrement()", 60000); // 1 minute //60000
    $(document.body).mousemove(function(e) {
        idleTime = 0;
    });
    $(document.body).keypress(function(e) {
        idleTime = 0;
    });

});

function timerIncrement() {

    idleTime = idleTime + 1;

    if (idleTime >= 2) {
        out('Sesión cerrada por inactividad', 0)
    }
}
