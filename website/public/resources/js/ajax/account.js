const API = HOME_PATH + 'api/dashboard/users.php?action=';

function checkUsuarios()
{
    $.ajax({
        dataType: 'json',
        url: API + 'userCount'
    })
    .done(function( response ) {
        let current = window.location.pathname;
        if ( current == HOME_PATH + 'user/register' ) {
            //if at least one user exists
            if (response.status) {
                swal(3, response.message +'. Redireccionando a inicio de sesión...', 'user/login', 3000);
            } else {
                swal(5, 'Se necesita registrar el primer usuario del sistema');
            }
        } else {
            //redirect to register if there isn't at least one user
            if (!response.status ) {
                swal(3, response.exception +'. Redireccionando a registro...', 'user/register', 3000);
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
