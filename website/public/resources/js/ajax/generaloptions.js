const API_PARAMETROS = HOME_PATH + 'api/dashboard/generaloptions.php?action=';

$( document ).ready(function() {
    readRows( API_PARAMETROS, $('#parameterSpinner')[0]);
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
    $.ajax({
        dataType: 'json',
        url: API_PARAMETROS + 'readOne',
        data: { idopcion: id },
        type: 'post',
        success: function( response ) {
            if ( response.status ) {
                $('#parameters-form')[0].reset();
                $('#parameters-title')[0].innerHTML = 'Modificar un parámetro';
                $('#parameters-submit')[0].innerHTML = 'Modificar parámetro';
                $('#parameters-cancel').toggleClass('d-none');
                $('input[name ="clave"]').attr("data-id",response.dataset.idopcion)
                $('input[name ="clave"]' ).val( response.dataset.clave );
                $('input[name ="valor"]' ).val( response.dataset.valor );
            } else {
                swal( 2, response.exception );
            }
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

$( '#parameters-form' ).submit(function( event ) {
    event.preventDefault();
    if($('input[name ="clave"]').is('[data-id]')) {
        saveRow( API_PARAMETROS, 'update', this, document.getElementById('parameters-submit'), ['Clave', 'Valor'] ,$('input[name ="clave"]').attr("data-id"), cancelUpdate );
    }
    else{
        saveRow( API_PARAMETROS, 'create', this, document.getElementById('parameters-submit'), ['Clave', 'Valor'] );
    }
});

$('#parameters-cancel')[0].addEventListener("click", cancelUpdate);

function cancelUpdate(){
    $('#parameters-form')[0].reset();
    $('#parameters-title')[0].innerHTML = 'Añadir un nuevo parámetro';
    $('#parameters-submit')[0].innerHTML = 'Añadir parámetro';
    $('#parameters-cancel').toggleClass('d-none');
    $('input[name ="clave"]').removeAttr('data-id');
}

function deleteRow(id, el)
{
    let identifier = { idclave: id };
    confirmDelete( API_PARAMETROS, identifier, el);
}
