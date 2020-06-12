const API_CATEGORIAS = HOME_PATH + 'api/dashboard/categories.php?action=';

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
                { data: 'idcategoriaproducto' },
                { data: 'categoria' },
                { data: null,
                orderable: false,
                render:function(data, type, row)
                {
                  return `
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" onclick="editRow(${data['idcategoriaproducto']}, this)"type="button">
                                    <span>
                                        <i class="fas fa-edit"></i>
                                        <p>Modíficar</p>
                                    </span>
                                </button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" onclick="deleteRow(${data['idcategoriaproducto']}, this)" type="button">
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
        url: API_CATEGORIAS + 'readOne',
        data: { id_categoria: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            $('#categories-form')[0].reset();
            $('#categories-submit')[0].innerHTML = 'Modificar categoría';
            $('#categories-cancel').toggleClass('d-none');
            $('#inputCategoría').attr("data-id",response.dataset.idcategoriaproducto)
            $( '#inputCategoría' ).val( response.dataset.categoria );
        } else {
            swal( 2, response.exception );
        }
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

function deleteRow(id, el)
{
    let identifier = { id_categoria: id };
    confirmDelete( API_CATEGORIAS, identifier, el);
}

$( '#categories-form' ).submit(function( event ) {
    event.preventDefault();
    if($('#inputCategoría').is('[data-id]')) {
        saveRow( API_CATEGORIAS, 'update', this, document.getElementById('categories-submit'), ['Categoría'], $('#inputCategoría').attr("data-id"), cancelUpdate );
    }
    else{
        saveRow( API_CATEGORIAS, 'create', this, document.getElementById('categories-submit'), ['Categoría'] );
    }
});

$('#categories-cancel')[0].addEventListener("click", cancelUpdate);



function cancelUpdate(){
    $('#categories-form')[0].reset();
    $('#inputCategoría').removeAttr('data-id');
    $('#categories-submit')[0].innerHTML = 'Añadir categoría';
    $('#categories-cancel').toggleClass('d-none');
}
