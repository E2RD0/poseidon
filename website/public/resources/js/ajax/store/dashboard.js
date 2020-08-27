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
                {
                    data: null,
                    orderable: false,
                    render: function (data) {
                        return `
                        <button class="btn btn-light" onclick="orderDetails(${data["idorden"]})">Ver Detalles</button>`;
                    },
                    targets: -1,
                },
            ],
        });
    }
}

function orderDetails(idorden){
    console.log(idorden);
}
