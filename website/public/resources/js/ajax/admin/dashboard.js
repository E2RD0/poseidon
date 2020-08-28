const API_ORDENES = HOME_PATH + 'api/dashboard/ordenes.php?action=';
const API_PRODUCTOS = HOME_PATH + 'api/dashboard/productos.php?action=';
const API_CLIENTES = HOME_PATH + 'api/dashboard/clients.php?action=';
const API_REVIEWS = HOME_PATH + 'api/dashboard/reviews.php?action=';

$(function () {
    readRows(API_ORDENES, $('#dashboardSpinner')[0], 'recentOrders');
    getOrdersCount($('#dashboardOrderSpinner')[0]);
    getProductQuantities(($('#productsSpinner')[0]));
    mostSoldProductsChart();
    productsReviewCountChart();
    productsByCategory();
    clientsLastSeven();
    clientOrdersChart();
});

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
            searching: false,
            bLengthChange: false,
            info: false,
            paging: false,
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
};

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

            jsonResponse.forEach((producto, index) => {
                let style = (producto['cantidad'] <= 500 && producto['cantidad'] >= 60) ? 'bg-success' : ((producto['cantidad'] < 60 && producto['cantidad'] >= 20) ? 'bg-warning' : 'bg-danger');

                rows += `
                    <div class="row dash__side_card1_container  ${index == jsonResponse.length - 1 ? 'pb-4' : 'pb-0'} ${index == jsonResponse.length - 1 ? 'pb-4' : 'pb-0'}">
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
};

// Función para graficar la cantidad pedidos 7 días anteriores al actual.
function mostSoldProductsChart() {
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'mostSold',
        success: function (response) {
            if (response.status) {
                let nombres = [];
                let cantidad = [];
                response.dataset.forEach(chart => {
                    nombres.push(chart.nombre);
                    cantidad.push(chart.cantidad);
                });
                doughnutGraph('grafico1', nombres, cantidad, 'Productos más vendidos');
            } else {
                $('#grafico1').html('No se han encontrado datos.');
            }
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
}

function productsByCategory() {
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'productsByCategory',
        success: function (response) {
            if (response.status) {
                let categoria = [];
                let cantidad = [];
                response.dataset.forEach(chart => {
                    categoria.push(chart.categoria);
                    cantidad.push(chart.cantidad);
                });
                barGraph('grafico3', categoria, cantidad, 'Cantidad','Cantidad de productos por categoría', 10);
            } else {
                $('#grafico3').html('No se han encontrado datos.');
            }
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
}

function clientsLastSeven() {
    $.ajax({
        dataType: 'json',
        url: API_CLIENTES + 'clientsSevenDays',
        success: function (response) {
            if (response.status) {
                let fecha = [];
                let cantidad = [];
                response.dataset.forEach(chart => {
                    fecha.push(chart.fecha);
                    cantidad.push(chart.cantidad);
                });
                barGraph('grafico4', fecha, cantidad, 'Cantidad', 'Cantidad de clientes registrados por día.');
            } else {
                $('#grafico4').html('No se han encontrado datos.');
            }
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
}

function productsReviewCountChart() {
    $.ajax({
        dataType: 'json',
        url: API_REVIEWS + 'reviewCount',
        success: function (response) {
            if (response.status) {
                let nombre = [];
                let calificacion = [];
                response.dataset.forEach(chart => {
                    nombre.push(chart.nombre);
                    calificacion.push(chart.calificacion);
                });
                barGraph('grafico2', nombre, calificacion, 'Calificación', 'Productos con las mejores calificaciones.');
            } else {
                $('#grafico2').html('No se han encontrado datos.');
            }
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
}

function clientOrdersChart() {
    $.ajax({
        dataType: 'json',
        url: API_CLIENTES + 'clientOrdersChart',
        success: function (response) {
            if (response.status) {
                let cliente = [];
                let cantidad = [];
                response.dataset.forEach(chart => {
                    cliente.push(chart.cliente);
                    cantidad.push(chart.cantidad);
                });
                doughnutGraph('grafico5', cliente, cantidad, 'Clientes con la mayor cantidad de ordenes');
            } else {
                $('#grafico5').html('No se han encontrado datos.');
            }
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
}

function clientesNuevos(){
    $.ajax({
        type: 'post',
        url: API_CLIENTES + 'nuevosclientes',
        dataType: 'json',
        success: function( response ) {
            // If user login is succesfull
            if ( response.status == 1) {
                fetchResource('http://localhost/poseidon/website/public/reports/clientes.pdf');
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

function productosMasVendidos(){
    $.ajax({
        type: 'post',
        url: API_PRODUCTOS + 'reporteProductosMasVendidos',
        dataType: 'json',
        success: function( response ) {
            if ( response.status == 1) {
                fetchResource('http://localhost/poseidon/website/public/reports/productosmasvendidos.pdf');
            } else{
                swal(2, response.exception);
            }},
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
