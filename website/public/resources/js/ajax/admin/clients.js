const API_CLIENTES = HOME_PATH + 'api/dashboard/clients.php?action=';

$( document ).ready(function() {
    readRows( API_CLIENTES, $('#spinner')[0]);
    getClientState();
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
                { data: 'idcliente' },
                { data: 'nombre' },
                { data: 'apellido' },
                { data: 'email' },
                { data: 'direccion' },
                { data: 'telefono' },
                { data: 'estado' },
                { data: null,
                orderable: false,
                render:function(data, type, row)
                {
                  return `
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" onclick="editRow(${data['idcliente']}, this)"type="button">
                                    <span>
                                        <i class="fas fa-edit"></i>
                                        <p>Modíficar</p>
                                    </span>
                                </button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" onclick="changeState(${data['idcliente']}, ${data['estado'] != 'Activo' ? 1 : 3}, this)" type="button">
                                <span>
                                    <i class="fas ${data['estado'] != 'Activo' ? 'fa-eye' : 'fa-eye-slash' }"></i>
                                    <p>${data['estado'] != 'Activo' ? 'Hacer activo' : 'Suspender'}</p>
                                </span>
                            </button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" onclick="reporteordenes(${data['idcliente']})" type="button">
                                <span>
                                    <i class="fas fa-download"></i>
                                    <p>Listado de ordenes</p>
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

function getClientState(){
    $.ajax({
        url: API_CLIENTES + 'type',
        dataType: 'json',
        success: function (response) {
            if(response){
                let jsonResponse = response.dataset;
                let dropDown = $('#inputEstado').html();

                jsonResponse.forEach(type => {
                    dropDown += `
                        <option value="${type.idestadocliente}">${type.estado}</option>
                    `;
                });

                $('#inputEstado').html(dropDown);
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
        url: API_CLIENTES + 'readOne',
        data: { id: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            $('#clients-form')[0].reset();
            $('#inputEmail').attr("data-id",response.dataset.idcliente)
            $( '#inputNombre' ).val( response.dataset.nombre );
            $( '#inputApellido' ).val( response.dataset.apellido );
            $( '#inputEmail' ).val( response.dataset.email );
            $( '#inputDirección' ).val( response.dataset.direccion );
            $( '#inputTeléfono' ).val( response.dataset.telefono );
            $( '#inputEstado' ).val( response.dataset.idestadocliente );
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

function changeState(idCliente, idEstado, el)
{
    let identifier = { idEstado: idEstado, idCliente: idCliente};
    confirmChange(identifier, el);
}
function confirmChange(identifier, el=false, text=false)
{
    function before(){};
    function after(){};
    if(el){
        if(el.closest(".td-actions")){
            var buttons = el.closest(".td-actions");
            var innerButtons = buttons.innerHTML;
        }
        function before() {
            if(buttons)
                buttons.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
        }
        function after() {
            if(buttons){
                buttons.innerHTML = innerButtons;
                $(buttons).children().find('.dropdown').toggleClass('show');
                $(buttons).children().find('.dropdown-menu').toggleClass('show');
            }
        }
    }
    swal(4, (text ? text : '¿Desea cambiar el estado?'), false, 0, true, del);
    function del() {
        $.ajax({
            type: 'post',
            url: API_CLIENTES + 'changeState',
            data: identifier,
            dataType: 'json',
            beforeSend: before,
            complete: after
        })
        .done(function( response ) {
            if ( response.status ) {
                readRows( API_CLIENTES );
                swal( 1, response.message);
            } else {
                swal( 2, response.exception);
            }
        })
        .fail(function( jqXHR ) {
            if ( jqXHR.status == 200 ) {
                console.log( jqXHR.responseText );
            } else {
                console.log( jqXHR.status + ' ' + jqXHR.statusText );
            }
        });
    }
}

$( '#clients-form' ).submit(function( event ) {
    event.preventDefault();
    if($('#inputEmail').is('[data-id]')) {
        saveRow( API_CLIENTES, 'update', this, document.getElementById('clients-submit'),['Nombre', 'Apellido', 'Email', 'Dirección', 'Teléfono', 'Estado'], $('#inputEmail').attr("data-id"), false, cancelUpdate );
    }
});

$('#clients-cancel')[0].addEventListener("click", cancelUpdate);

function cancelUpdate(){
    $('#clients-form')[0].reset();
    $('#clients-submit')[0].innerHTML = 'Actualizar cliente';
    $('#inputEmail').removeAttr('data-id');
    $('#tabClientes').click();
}

function reporteordenes(idcliente){
    $.ajax({
        type: 'post',
        url: API_CLIENTE + 'reporteOrdenes',
        data: "idcliente="+idcliente,
        dataType: 'json'
    })
    .done(function( response ) {
        // If user login is succesfull
        if ( response.status == 1) {
            fetch('http://localhost/poseidon/website/public/reports/ordenescliente.pdf')
          .then(resp => resp.blob())
          .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            // the filename you want
            a.download = 'ordenescliente.pdf';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            swal(1, 'Reporte generado correctamente'); // or you know, something with better UX...
          })
          .catch(() => alert('Error al descargar el reporte'));
        } else{
            swal(2, response.exception);
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
