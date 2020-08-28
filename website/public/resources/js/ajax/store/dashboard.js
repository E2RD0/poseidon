const API_CLIENTE = HOME_PATH + 'api/store/client.php?action=';
const API_GRAFICOS = HOME_PATH + 'api/dashboard/graficos.php?action=';

$(document).ready(function () {
    readRows(API_CLIENTE, $('#ordenesSpinner')[0], 'getOrders');
});
//Método para rellenar la tabla de ordenes
function fillTable(dataset) {
    let table = $('#tablaOrdenes');
    if ($.fn.dataTable.isDataTable(table)) {
        table = $('#tablaOrdenes').DataTable();
        table.clear();
        table.rows.add(dataset);
        table.draw();
    } else {
        table.DataTable({
            responsive: true,
            data: dataset,
            language: {
                url: HOME_PATH + "resources/es_ES.json",
            },
            searching: false,
            bLengthChange: false,
            info: false,
            columns: [
                {
                    data: null,
                    render: function (data) {
                        return `#${data["idorden"]}`;
                    },
                    targets: -1,
                },
                { data: "fechacompra" },
                {
                    data: null,
                    render: function (data) {
                        return `$${data["total"]}`;
                    },
                    targets: -1,
                },
                { data: "estado" },
                {
                    data: null,
                    orderable: false,
                    render: function (data) {
                        return `
                        <button class="btn btn-light" onclick="factura(${data["idorden"]})">Ver factura</button>`;
                    },
                    targets: -1,
                },
            ],
        });
    }
}
//Método AJAX para traer la factura de la orden.
function factura(idorden){
    $.ajax({
        type: 'post',
        url: API_CLIENTE + 'factura',
        data: "idorden="+idorden,
        dataType: 'json',
        success: function( response ) {
            // If user login is succesfull
            if ( response.status == 1) {
                fetchResource('http://localhost/poseidon/website/public/reports/factura.pdf');
            } else{
                swal(2, response.exception);
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
