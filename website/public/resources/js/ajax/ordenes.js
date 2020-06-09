const API_CATEGORIAS = HOME_PATH + 'api/dashboard/ordenes.php?action=';

$( document ).ready(function() {
    readRows( API_CATEGORIAS, $('#categoriesSpinner')[0]);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    var table = $('#table');
    if($.fn.dataTable.isDataTable(table)){
        table = $('#table').DataTable();
        table.clear();
        table.rows.add(dataset);
        table.draw();
    }
    else{
        table.DataTable( {
            responsive: true,
            data: dataset,
            language: {
                url: HOME_PATH + 'resources/es_ES.json'
            },
            columnDefs: [
                {targets: '_all',
                className: 'td-actions text-center'}
            ],
            columns: [
                { data: 'idorden' },
                { data: 'cliente' },
                { data: 'direccion' },
                { data: 'total' },
                { data: 'fechacompra' },
                { data: null,
                orderable: false,
                render:function(data, type, row)
                {
                  return `
                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" onclick="getOrderDetails(${data['idorden']}, this) id="modal_open">
                            Más detalles
                        </button>`;
                },
                targets: -1
                },
            ]
        } );
    }
}

function readOrder( api , el=false)
{
    function before(){};
    function after(){}
    if(el){
        function before() {
            el.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
        }
        function after() {
            el.innerHTML = '';
        }
    }
    $.ajax({
        dataType: 'json',
        url: api + 'show',
        beforeSend: before,
        complete: after
    })
    .done(function( response ) {
        fillTable( response.dataset );
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

function getOrderDetails(id){
    console.log(id);
}


// function deleteRow(id, el)
// {
//     let identifier = { id_categoria: id };
//     confirmDelete( API_CATEGORIAS, identifier, el);
// }

// $( '#categories-form' ).submit(function( event ) {
//     event.preventDefault();
//         saveRow( API_CATEGORIAS, 'create', this, document.getElementById('categories-submit') );
// });
