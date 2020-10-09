const API = HOME_PATH + 'api/store/client.php?action=';

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
        if ( response.status == 9 ) {
            var message = text == "" ? response.message : text;
            swal( alert, message, 'store/user/login' );
        } else if(response.status!= -9){
            swal( 2, response.exception);
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        }
        else if( jqXHR.status == 404){
        }
        else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}




idleTime = 0;
$(document).ready(function() {

    var idleInterval = setInterval("timerIncrement()", 60000); // 1 minute //60000
    $(this).mousemove(function(e) {
        idleTime = 0;
    });
    $(this).keypress(function(e) {
        idleTime = 0;
    });

});

function timerIncrement() {

    idleTime = idleTime + 1;

    if (idleTime >= 1) {
        out('Sesión cerrada por inactividad', 0)
    }
}
