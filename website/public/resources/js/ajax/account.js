const API = '../../../api/dashboard/users.php?action=';

function checkUsuarios()
{
    $.ajax({
        dataType: 'json',
        url: API + 'userCount'
    })
    .done(function( response ) {
    })
    .fail(function( jqXHR ) {
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}
