const API = '../api/dashboard/users.php?action=';

function checkUsuarios()
{
    $.ajax({
        dataType: 'json',
        url: API + 'userCount'
    })
    .done(function( response ) {
        let current = window.location.pathname;
        if ( current == response.HOME_PATH + 'user/register' ) {
            //if at least one user exists
            if (response.status) {
                Swal.fire({
                    title: 'Advertencia',
                    text: response.message +'. Redireccionando a inicio de sesión...',
                    icon: 'warning',
                    timer: 3000,
                    buttons: false,
                })
                .then(() => {
                    window.location.replace(window.location.origin + response.HOME_PATH + 'user/login');
                })
            } else {
                Swal.fire({
                    title: 'Aviso',
                    text: 'Se necesita registrar el primer usuario del sistema',
                    icon: 'info',
                })
            }
        } else {
            //redirect to register if there isn't at least one user
            if (!response.status ) {
                Swal.fire({
                    title: 'Advertencia',
                    text: response.exception +'. Redireccionando a registro...',
                    icon: 'warning',
                    timer: 3000,
                    buttons: false,
                })
                .then(() => {
                    window.location.replace(window.location.origin + response.HOME_PATH + 'user/register');
                })
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
checkUsuarios();
