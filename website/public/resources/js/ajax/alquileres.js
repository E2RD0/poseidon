const API_ORDENES = HOME_PATH + 'api/dashboard/alquileres.php?action=';

$(document).ready(function () {
    readRows(API_ORDENES, $('#alquileresSpinner')[0]);
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
                { data: 'sucursal' },
                { data: 'fechacompra' },
                { data: 'fechasalquiler' },
                { data: 'totalalquiler' },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#alquiler" onclick="getRentalDetails(${data['idorden']}, this)" id="modal_open">
                            Más detalles
                        </button>`;
                    },
                    targets: -1
                },
            ]
        });
    }
}

function getRentalDetails( idorden, el = false ) {
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
            console.log(jsonResponse);

            jsonResponse.forEach(rental => {
                $('#modal_idalquiler').html('Alquiler No. '+rental.idalquiler);
                $('#modal_cliente').html(rental.cliente);
                $('#modal_email').html(rental.email);
                $('#modal_telefono').html(rental.telefono);
                $('#modal_sucursal').html(rental.sucursal);
                $('#modal_fechaalquiler').html(rental.fechaalquiler);
                $('#modal_fechadevolucion').html(rental.fechadevolucion);
                $('#modal_fechacompra').html(rental.fechacompra);
                $('#modal_subtotal').html('$'+rental.subtotal);
                $('#modal_iva').html('$'+rental.iva);
                $('#modal_total').html('$'+rental.total);
            });

            fetchRentalDetails(identifier, $('#modalSpinner')[0]);
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

function fetchRentalDetails( id, el = false ){

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
            console.log(jsonResponse);

            jsonResponse.forEach(rental => {
                tableRow += `
                            <tr>
                                <th scope="row">${rental.idproducto}</th>
                                <td>${rental.nombre}</td>
                                <td>${rental.precioalquiler}</td>
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
