const API_PEDIDOS = HOME_PATH + 'api/store/cart.php?action=';

// Options
var options = {
    max_value: 5,
    step_size: 1,
    selected_symbol_type: 'utf8_star', // Must be a key from symbols
    cursor: 'default',
    readonly: false,
    change_once: false, // Determines if the rating can only be set once
}

$("#inputRating").rate(options);

function addCart() {
    const regex = /.*view\/(.*)/g;
    let match = regex.exec(window.location.href);

    $.ajax({
        type: 'post',
        url: API_PEDIDOS + 'createDetail',
        data: {idproducto: Number(match[1]), cantidad: Number($('#cantidadProducto').html())},
        dataType: 'json',
        success: function( response ) {
            switch(response.status){
                case 1:
                    swal(1, response.message);
                    break;
                case 0:
                    swal(2, response.exception);
                    break;
                case -1:
                    swal(3, response.exception +'. Redireccionando a inicio de sesión...', 'store/user/login', 4000);
                    break;
            }
        },
        error: function( jqXHR ) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if ( jqXHR.status == 200 ) {
                console.log( jqXHR.responseText );
            } else {
                console.log( jqXHR.status + ' ' + jqXHR.statusText );
            }
        }
    });
}
