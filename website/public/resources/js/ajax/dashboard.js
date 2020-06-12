$(document).ready(function () {
    readRows(API_ORDENES, $('#categoriesSpinner')[0], 'recentOrders');
    getOrdersCount($('#orders_count')[0]);
});

function getOrdersCount(el = false){
    $.ajax({
        dataType: 'json',
        url: API_ORDENES + 'orderCount',
        beforeSend: function before() { if(el) {
                el.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
            }
        },
        success: function( response ) {
            $('#orders_count').html(response.dataset);
        },
        error: function( jqXHR ) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if ( jqXHR.status == 200 ) {
                console.log( jqXHR.responseText );
            } else {
                console.log( jqXHR.status + ' ' + jqXHR.statusText );
            }
        }});
}
