const API_PRODUCTOS = HOME_PATH + 'api/dashboard/productos.php?action=';

$(document).ready(function () {
    readRows(API_ORDENES, $('#dashboardSpinner')[0], 'recentOrders');
    getOrdersCount($('#dashboardOrderSpinner')[0]);
    getProductQuantities(($('#productsSpinner')[0]));
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

function getProductQuantities(el = false){
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'productQuantities',
        beforeSend: function before() { if(el) {
                el.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
            }
        },
        success: function( response ) {
            let jsonResponse = response.dataset;
            let rows = '';

            jsonResponse.forEach(producto => {
                let style = (producto['cantidad'] <= 500 && producto['cantidad'] >= 60) ? 'bg-success' : ((producto['cantidad'] < 60 && producto['cantidad'] >= 20) ? 'bg-warning' : 'bg-danger');
                rows += `
                    <div class="row dash__side_card1_container">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <p class="dash__sc1_text text-truncate" title="${producto.producto}">${producto.producto}</p>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12 dash__bar">
                            <div class="progress">
                                <div class="progress-bar ${style}" role="progressbar" style="width: ${producto.cantidad}%" aria-valuenow="${producto.cantidad}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="dash__sc1c_text">${producto.cantidad} restantes</p>
                        </div>
                    </div>`;
                $('#productsSpinner').html(rows);
            });
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
