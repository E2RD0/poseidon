$( document ).ready(function() {
    getUserInfo();
});

function getUserInfo()
{
    $.ajax({
        dataType: 'json',
        url: API + 'info'
    })
    .done(function( response ) {
        if (response.status) {
                $( '#spinnerSettings' )[0].innerHTML = '';
                $( '#inputNombre' ).val( response.dataset.nombre );
                $( '#inputApellido' ).val( response.dataset.apellido );
                $( '#inputEmail' ).val( response.dataset.email );

        } else {
            swal(2, response.exception);
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

$( '#settings-form' ).submit(function( event ) {
    event.preventDefault();
    updateUser(this, document.getElementById('settings-submit'));
});

function updateUser(form, submitButton)
{
    var inner = submitButton.innerHTML;
    $.ajax({
        type: 'post',
        url: API + 'updateUser',
        data: $(form).serialize(),
        dataType: 'json',
        beforeSend: function() {
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            submitButton.innerHTML = inner;
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if (response.status==1) {
            getUserInfo();
            swal(1, response.message);
            $('#inputContraseña').val('');
            $('#inputNuevaContraseña').val('');
            $('#inputNewPasswordR').val('');
        } else if(response.status==-1){
            console.log('error con db');
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Nombre');
        checkFields(errors, 'Apellido');
        checkFields(errors, 'Email');
        checkFields(errors, 'Contraseña');
        checkFields(errors, 'Nueva Contraseña');
        checkFields(errors, 'NewPasswordR');
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

$('#inputContraseña')[0].addEventListener("click", function(){
    if (!$('#contra')[0].classList.contains('show')) {
        document.getElementById('pCambiarContraseña').innerHTML = 'Contraseña actual'
        $('#contra').collapse('show');
    }
})

$("body").click
(
  function(e)
  {
    if(e.target.id !== "inputContraseña" && e.target.id !== "inputNuevaContraseña" && e.target.id !== "inputNewPasswordR")
    {
        if ($('#inputContraseña').val() == '' && $('#inputNuevaContraseña').val() == '' && $('#inputNewPasswordR').val() == ''){
            $('#contra').collapse('hide');
            document.getElementById('pCambiarContraseña').innerHTML = 'Cambiar contraseña'
        }
    }
  }
);
