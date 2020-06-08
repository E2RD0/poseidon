const API_CATEGORIAS = HOME_PATH + 'api/dashboard/generaloptions.php?action=';

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
                {targets: -1,
                className: 'td-actions text-center'}
            ],
            columns: [
                { data: 'idopcion' },
                { data: 'clave' },
                { data: 'valor' },
                { data: null,
                orderable: false,
                render:function(data, type, row)
                {
                  return `
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" onclick="editRow(${data['idopcion']}, this) "type="button">
                                    <span>
                                        <i class="fas fa-edit"></i>
                                        <p>Modíficar</p>
                                    </span>
                                </button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" onclick="deleteRow(${data['idopcion']}, this)" type="button">
                                <span>
                                    <i class="fas fa-times"></i>
                                    <p>Eliminar</p>
                                </span>
                            </button>
                            </div>
                        </div>`;
                },
                targets: -1
                },
            ]
        } );
    }
}

function editRow(id){
    console.log(id);
}

function deleteRow(id, el)
{
    let identifier = { id_opcion: id };
    confirmDelete( API_CATEGORIAS, identifier, el);
}

$( '#generaloptions-form' ).submit(function( event ) {
    event.preventDefault();
    saveRow( API_CATEGORIAS, 'create', this, $( '#generaloptions-submit' ).val() );
});
