const API_SUCURSALES = HOME_PATH + 'api/dashboard/sucursales.php?action=';

$( document ).ready(function() {
    readRows( API_SUCURSALES, $('#sucursalesSpinner')[0]);
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
                { data: 'idsucursal' },
                { data: 'nombre' },
                { data: null,
                orderable: false,
                render:function(data, type, row)
                {
                  return `
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" onclick="editRow(${data['idsucursal']}, this) "type="button">
                                    <span>
                                        <i class="fas fa-edit"></i>
                                        <p>Modíficar</p>
                                    </span>
                                </button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" onclick="deleteRow(${data['idsucursal']}, this)" type="button">
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
        url: API_SUCURSALES + 'readOne',
        data: { idsucursal: id },
        type: 'post',
        success: function( response ) {
            if ( response.status ) {
                $('#sucursales-form')[0].reset();
                $('#sucursales-title')[0].innerHTML = 'Modificar una sucursal';
                $('#sucursales-submit')[0].innerHTML = 'Modificar sucursal';
                $('#sucursales-cancel').toggleClass('d-none');
                $('[name ="nombre"]').attr("data-id",response.dataset.idsucursal)
                $('[name ="nombre"]' ).val( response.dataset.nombre );
                $('[name ="ubicacion"]' ).val( response.dataset.ubicacion );
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

$( '#sucursales-form' ).submit(function( event ) {
    event.preventDefault();
    if($('input[name ="nombre"]').is('[data-id]')) {
        saveRow( API_SUCURSALES, 'update', this, document.getElementById('sucursales-submit'), ['Sucursal'] ,$('input[name ="nombre"]').attr("data-id"), cancelUpdate );
    }
    else{
        saveRow( API_SUCURSALES, 'create', this, document.getElementById('sucursales-submit'), ['Sucursal'] );
    }
});

$('#sucursales-cancel')[0].addEventListener("click", cancelUpdate);

function cancelUpdate(){
    $('#sucursales-form')[0].reset();
    $('#sucursales-title')[0].innerHTML = 'Añadir una nueva sucursal';
    $('#sucursales-submit')[0].innerHTML = 'Añadir sucursal';
    $('#sucursales-cancel').toggleClass('d-none');
    $('input[name ="nombre"]').removeAttr('data-id');
}

function deleteRow(id, el)
{
    let identifier = { idsucursal: id };
    confirmDelete( API_SUCURSALES, identifier, el);
}
