//Check for errors on input fields
function checkFields(errors, fieldName){
    var label = document.getElementById('error' + fieldName.replace(/ /g,''));
    var input = document.getElementById('input' + fieldName.replace(/ /g,''));
    if (errors[fieldName]) {
        label.innerHTML = errors[fieldName][0];
        input.classList.add('error');
    }
    else{
        if(input.classList.contains('error')){
            input.classList.remove('error');
        }
        label.innerHTML = '';
    }
}

//shows an alert
function swal(type, text, url = false, timer=0, allowCancel = false, callback = undefined){
    var result = false;
    switch (type) {
        case 1:
            title = "Éxito";
            icon = "success";
            break;
        case 2:
            title = "Error";
            icon = "error";
            break;
        case 3:
            title = "Advertencia";
            icon = "warning";
            break;
        case 4:
            title = "Confirmar";
            icon = "question";
            break;
        default:
            title = "Aviso";
            icon = "info";
    }
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: timer,
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancelar',
        showCancelButton: allowCancel,
        allowOutsideClick: allowCancel,
        allowEscapeKey: allowCancel
    })
    .then(function(value) {
        if(url){
            redirect(url);
        }
        if(value.isConfirmed && callback != undefined){
            callback();
        }
    });
}

//redirects to specified url
function redirect(url, link=false){
    if(link){
        window.location.href = window.location.origin + HOME_PATH + url;
    }
    else{
        window.location.replace(window.location.origin + HOME_PATH + url);
    }
}

function readRows( api , el=false, action = 'show', fun=false)
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
        url: api + action,
        beforeSend: before,
        complete: after
    })
    .done(function( response ) {
        if(fun){
            fun(response.dataset);
        }
        else{
            fillTable( response.dataset );
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

function confirmDelete( api, identifier, el=false, text=false, complete = undefined)
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
    swal(4, (text ? text : '¿Desea eliminar el registro?'), false, 0, true, del);
    function del() {
        $.ajax({
            type: 'post',
            url: api + 'delete',
            data: identifier,
            dataType: 'json',
            beforeSend: before,
            complete: after
        })
        .done(function( response ) {
            if ( response.status ) {
                swal( 1, response.message, undefined, undefined, undefined, (complete != undefined ? complete : readRows(api)));
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

function saveRow( api, action, form, submitButton, checkErrors = [], id=0, complete = false, done=false)
{
    var inner = submitButton.innerHTML;
    $.ajax({
        type: 'post',
        url: api + action,
        data: $(form).serialize()+"&id="+id,
        dataType: 'json',
        beforeSend: function() {
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        }
    })
    .done(function( response ) {
        // If user is registered successfully
        if (response.status==1) {
            readRows(api);
            swal(1, response.message);
            form.reset();
        } else if(response.status==-1){
            console.log('error con db');
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkErrors.forEach( function(el) {
            checkFields(errors, el);
        });
    })
    .always(function( response ) {
        if(response){
            if (response.status==1) {
                if(done){done();}
                else{
                    submitButton.innerHTML = inner;
                }
            }
            else {
                if(complete){complete();}
                else {
                    submitButton.innerHTML = inner;
                }
            }
        }
        else {
            if(complete){complete();}
            else {
                submitButton.innerHTML = inner;
            }
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

const debounce = (callback, delay = 250) => {
    let timeoutId;
    return (...args) => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            timeoutId = null;
            callback(...args);
        }, delay);
    };
};

/*
*   Función para generar una gráfica de barras verticales. Requiere el archivo chart.js para funcionar.
*
*   Parámetros: canvas (identificador de la etiqueta canvas), xAxis (datos para el eje X), yAxis (datos para el eje Y), legend (etiqueta para los datos) y title (título del gráfico).
*
*   Retorno: ninguno.
*/
function barGraph(canvas, xAxis, yAxis, legend, title, stepSize = 2) {
    //Arreglo para definir colores de las barras
    let color = ['rgb(255, 250, 158)',
        'rgb(254, 239, 136)',
        'rgb(255, 237, 73)',
        'rgb(255, 220, 34)',
        'rgba(255, 209, 36)',
        'rgb(251, 186, 0)',
        'rgb(183, 104, 1)'];

    // Se establece el contexto donde se mostrará el gráfico, es decir, se define la etiqueta canvas a utilizar.
    const context = $('#' + canvas);
    // Se crea una instancia para generar la gráfica con los datos recibidos.
    const chart = new Chart(context, {
        type: 'bar',
        data: {
            labels: xAxis,
            datasets: [{
                label: legend,
                data: yAxis,
                backgroundColor: color
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: title,
                fontSize: 14
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: stepSize
                    }
                }]
            }
        }
    });
}

/*
*   Función para generar una gráfica de doughnut. Requiere el archivo chart.js para funcionar.
*
*   Parámetros: canvas (identificador de la etiqueta canvas), legend (etiqueta para los datos), daata (datos para generar el gráfico) y title (título del gráfico).
*
*   Retorno: ninguno.
*/

function doughnutGraph(canvas, legend, daata, title) {
    //Arreglo para definir colores de las barras
    let color = ['rgb(254, 239, 136)',
        'rgb(255, 237, 73)',
        'rgba(255, 209, 36)',
        'rgb(251, 186, 0)',
        'rgb(183, 104, 1)'];

    // Se establece el contexto donde se mostrará el gráfico, es decir, se define la etiqueta canvas a utilizar.
    const context = $('#' + canvas);
    // Se crea una instancia para generar la gráfica con los datos recibidos.

    const chart = new Chart(context, {
        type: 'doughnut',
        data: {
            labels: legend,
            datasets: [
                {
                    label: legend,
                    backgroundColor: color,
                    data: daata
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: title,
                fontSize: 14
            }
        }
    });

}
