const API_CLIENTE = HOME_PATH + 'api/store/client.php?action=';

$(document).ready(function () {
    readRows(API_CLIENTE, $('#ordenesSpinner')[0], 'getOrders');
});
//Método para rellenar la tabla de ordenes
function fillTable(dataset) {
    var table = $('#tablaOrdenes');
    if ($.fn.dataTable.isDataTable(table)) {
        table = $('#tablaOrdenes').DataTable();
        table.clear();
        table.rows.add(dataset);
        table.draw();
    }
    else {
        table.DataTable({
            responsive: true,
            data: dataset,
            language: {
                url: HOME_PATH + 'resources/es_ES.json'
            },
            searching: false,
            bLengthChange: false,
            info: false,
            columns:[
                { data: 'idorden' },
                { data: 'fechacompra' },
                { data: 'estado' },
                { data: 'total' },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                        <button class="btn btn-light" onclick="orderDetails(${data['idorden']})">Ver Detalles</button>`;
                    },
                    targets: -1
                },
            ]
        });
    }
}

function orderDetails(idorden){
    console.log(idorden);
}
