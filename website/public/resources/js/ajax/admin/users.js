const API_USUARIOS = HOME_PATH + 'api/dashboard/users.php?action=';

$( document ).ready(function() {
    readRows( API_USUARIOS, $('#usersSpinner')[0]);
    getUsersType();
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
                { data: 'idusuario' },
                { data: 'nombre' },
                { data: 'apellido' },
                { data: 'email' },
                { data: 'tipo' },
                { data: null,
                orderable: false,
                render:function(data, type, row)
                {
                  return `
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" onclick="editRow(${data['idusuario']}, this)"type="button">
                                    <span>
                                        <i class="fas fa-edit"></i>
                                        <p>Modíficar</p>
                                    </span>
                                </button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" onclick="deleteRow(${data['idusuario']}, this)" type="button">
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

function getUsersType(){
    $.ajax({
        url: API_USUARIOS + 'type',
        dataType: 'json',
        success: function (response) {
            if(response){
                let jsonResponse = response.dataset;
                let dropDown = $('#inputTipo').html();

                jsonResponse.forEach(type => {
                    dropDown += `
                        <option value="${type.idtipousuario}">${type.tipo}</option>
                    `;
                });

                $('#inputTipo').html(dropDown);
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

function editRow(id){
    $.ajax({
        dataType: 'json',
        url: API_USUARIOS + 'readOne',
        data: { id: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            $('#users-form')[0].reset();
            $('#users-submit')[0].innerHTML = 'Modificar usuario';
            $('#users-cancel').toggleClass('d-none');
            $('#inputEmail').attr("data-id",response.dataset.idusuario)
            $( '#inputNombre' ).val( response.dataset.nombre );
            $( '#inputApellido' ).val( response.dataset.apellido );
            $( '#inputEmail' ).val( response.dataset.email );
            $( '#inputTipo' ).val( response.dataset.idtipousuario );
            $('#tabEdit').click();
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
    let identifier = { id: id };
    confirmDelete( API_USUARIOS, identifier, el);
}

$( '#users-form' ).submit(function( event ) {
    event.preventDefault();
    if($('#inputEmail').is('[data-id]')) {
        saveRow( API_USUARIOS, 'update', this, document.getElementById('users-submit'),['Nombre', 'Apellido', 'Email', 'Contraseña', 'Tipo'], $('#inputEmail').attr("data-id"), false, cancelUpdate );
    }
    else{
        saveRow( API_USUARIOS, 'create', this, document.getElementById('users-submit'), ['Nombre', 'Apellido', 'Email', 'Contraseña', 'Tipo'], 0,false,
         function(){
             $('#tabUsuarios').click();
             document.getElementById('users-submit').innerHTML="Agregar Usuario"}
         );
    }
});

$('#users-cancel')[0].addEventListener("click", cancelUpdate);

function cancelUpdate(){
    $('#users-form')[0].reset();
    $('#inputEmail').removeAttr('data-id');
    $('#users-submit')[0].innerHTML = 'Agregar usuario';
    $('#users-cancel').toggleClass('d-none');
    $('#tabUsuarios').click();
}
