const API_ORDENES = HOME_PATH + 'api/dashboard/ordenes.php?action=';

$(document).ready(function () {
    readRows(API_ORDENES, $('#ordersSpinner')[0]);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    var table = $('#table');
    if ($.fn.dataTable.isDataTable(table)) {
        table = $('#table').DataTable();
        table.clear();
        table.rows.add(dataset);
        table.draw();
    }
    else {
        table.DataTable({
            responsive: true,
            data: dataset,
            order: [0, 'desc'],
            language: {
                url: HOME_PATH + 'resources/es_ES.json'
            },
            columnDefs: [
                {
                    targets: '_all',
                    className: 'td-actions text-center'
                }
            ],
            columns: [
                { data: 'idorden' },
                { data: 'cliente' },
                { data: 'direccion' },
                {
                    data: null,
                    render: function (data) {
                        return `$${data["total"]}`;
                    },
                    targets: -1,
                },
                { data: 'fechacompra' },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" onclick="getOrderDetails(${data['idorden']}, this)" id="modal_open">
                            Más detalles
                        </button>`;
                    },
                    targets: -1
                },
            ]
        });
    }
}


function getOrderDetails( idorden, el = false ) {
    let identifier = { idorden: idorden };
    console.log(identifier);

    function before() { };
    function after() { };
    if (el) {
        function before() {
            el.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
        }
        function after() {
            el.innerHTML = 'Más detalles';
        }
    }

    $.ajax({
        url: API_ORDENES + 'generalDetails',
        type: 'post',
        data: identifier,
        dataType: 'json',
        beforeSend: before,
        complete: after,
        success: function (response) {
            let jsonResponse = response.dataset;

            jsonResponse.forEach(order => {
                $('#modal_id').html('Orden No. '+order.idorden);
                $('#modal_cliente').html(order.cliente);
                $('#modal_email').html(order.email);
                $('#modal_telefono').html(order.telefono);
                $('#modal_direccion').html(order.direccion);
                $('#modal_fecha_compra').html(order.fechacompra);
                $('#modal_fecha_entrega').html(order.fechaentrega);
                $('#modal_subtotal').html('$'+order.subtotal);
                $('#modal_iva').html('$'+order.iva);
                $('#modal_total').html('$'+order.total);
            });

            fetchOrderDetails(identifier, $('#modalSpinner')[0]);
        },
        error: function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        }
    });
};

function fetchOrderDetails( id, el = false ){

    function before() { };
    function after() { };
    if (el) {
        function before() {
            el.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
        }
        function after() {
            el.innerHTML = '';
        }
    }
    $.ajax({
        url: API_ORDENES + 'specificDetails',
        type: 'post',
        data: id,
        dataType: 'json',
        beforeSend: before,
        complete: after,
        success: function (response) {
            let jsonResponse = response.dataset;
            let tableRow = '';

            jsonResponse.forEach(order => {
                tableRow += `
                            <tr>
                                <th scope="row">${order.idproducto}</th>
                                <td>${order.nombre}</td>
                                <td>${order.cantidad}</td>
                                <td>${order.preciounitario}</td>
                            </tr>`;
            });
            $('#modal_table').html(tableRow);
        },
        error: function (jqXHR) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        }
    });
};


// function deleteRow(id, el)
// {
//     let identifier = { id_categoria: id };
//     confirmDelete( API_CATEGORIAS, identifier, el);
// }

// $( '#categories-form' ).submit(function( event ) {
//     event.preventDefault();
//         saveRow( API_CATEGORIAS, 'create', this, document.getElementById('categories-submit') );
// });
