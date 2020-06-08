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
                        <button class="btn dash__table_button" type="button" data-toggle="modal" data-target="#orden" id="modal_open">
                            Más detalles
                        </button>`;
                },
                targets: -1
                },
            ]
        } );
    }
}

// function editRow(id){
//     console.log(id);
// }


// function deleteRow(id, el)
// {
//     let identifier = { id_categoria: id };
//     confirmDelete( API_CATEGORIAS, identifier, el);
// }

// $( '#categories-form' ).submit(function( event ) {
//     event.preventDefault();
//         saveRow( API_CATEGORIAS, 'create', this, document.getElementById('categories-submit') );
// });
