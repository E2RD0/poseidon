const API_PEDIDOS = HOME_PATH + 'api/store/cart.php?action=';
const API_PRODUCTOS = HOME_PATH + 'api/store/products.php?action=';

const regex = /.*view\/(.*)/g;
let match = regex.exec(window.location.href);
let idProducto = Number(match[1]);
// Options
var options = {
    max_value: 5,
    step_size: 1,
    selected_symbol_type: 'utf8_star', // Must be a key from symbols
    cursor: 'default',
    readonly: false,
    change_once: false, // Determines if the rating can only be set once
}

$("#inputRating").rate(options);

function addCart() {
    const regex = /.*view\/(.*)/g;
    let match = regex.exec(window.location.href);

    $.ajax({
        type: 'post',
        url: API_PEDIDOS + 'createDetail',
        data: {idproducto: Number(match[1]), cantidad: Number($('#cantidadProducto').html())},
        dataType: 'json',
        success: function( response ) {
            switch(response.status){
                case 1:
                    swal(1, response.message);
                    break;
                case 0:
                    swal(2, response.exception);
                    break;
                case -1:
                    swal(3, response.exception +'. Redireccionando a inicio de sesión...', 'store/user/login', 4000);
                    break;
            }
        },
        error: function( jqXHR ) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if ( jqXHR.status == 200 ) {
                console.log( jqXHR.responseText );
            } else {
                console.log( jqXHR.status + ' ' + jqXHR.statusText );
            }
        }
    });
}

$(document).ready(function () {
    getReviews();
});

function getReviews(){
    $.ajax({
        url: API_PRODUCTOS + 'reviews',
        type: 'post',
        data: { id_producto: idProducto },
        dataType: 'json',
        success: function (response) {
            let dataset = response.dataset;
            let container = $('.user-ratings');
            container.html('');
            if(typeof dataset !== 'undefined' && dataset.length > 0 && dataset!=null){
                dataset.forEach(row => {
                    container.append(`
                    <div class="user-rating">
                    <i class="fas fa-user-circle fa-3x mr-3"></i>
                    <div>
                      <h4 class="rating-username">${row.nombre + ' ' + row.apellido}</h4>
                      <div class="rating-score mb-2">
                      ${'<i class="fas fa-star"></i>'.repeat(Math.round(row.calificacion))}
                      </div>
                      <p class="rating-comment">
                        ${row.comentario}
                      </p>
                    </div>
                  </div>`
                    );
                });
            }
            else {
                container.html('<div class="text-center w-100"><p>Todavía no hay ninguna reseña.</p></div>')
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
function checkReview(){
    $.ajax({
        url: API_PRODUCTOS + 'checkReview',
        type: 'post',
        data: { id_producto: idProducto},
        dataType: 'json',
        success: function (response) {
            if(response.status == 1){
                $('#review-form').trigger("reset");
                dataset = response.dataset;
                $('#myLargeModalLabel').html('Ver reseña anterior');
                $('#inputReview').attr('disabled', '');
                $('#inputReview').val(dataset.comentario);
                $("#inputRating").rate("setValue",dataset.calificacion );
                $('#review-submit').attr('disabled', '');
                $('#modal').modal('show');
            }
            else if (response.status == 0) {
                $('#review-form').trigger("reset");
                $('#myLargeModalLabel').html('Escribir reseña');
                $("#inputRating").rate("setValue",5 );
                $('#modal').modal('show');
            }
            else{
                swal(3, response.exception)
            }
        },
        error: function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        },
        beforeSend: function () {$('#giveReview').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...')},
        complete: function () {$('#giveReview').html('Dar opinión')}
    });
}
function newReview(){
    $.ajax({
        url: API_PRODUCTOS + 'newReview',
        type: 'post',
        data: { id_producto: idProducto, review: $('#inputReview').val(), calificacion: $("#inputRating").rate("getValue")},
        dataType: 'json',
        success: function (response) {
            if(response.status){
                swal(1, 'Reseña ingresada correctamente.');
            }
            else {
                swal(2, response.exception);
            }
            getReviews();
        },
        error: function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        },
        beforeSend: function () {$('#review-submit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...')},
        complete: function () {$('#review-submit').html('Enviar'); $('#modal').modal('hide');}
    });
}

$( '#review-form' ).submit(function( event ) {
    event.preventDefault();
    newReview();
});
/*function getReviewsInfo(id){
    $.ajax({
        url: API_PRODUCTOS + 'reviewsInfo',
        type: 'post',
        data: { id_producto: id },
        dataType: 'json',
        success: function (response) {
            let dataset = response.dataset;
            let container = $('.rating-process');
            let num = parseInt($('.rating-process').attr('data-rating'));
            container.html('');
            if(typeof dataset !== 'undefined' && dataset.length > 0 && dataset!=null){
                dataset.forEach(row => {
                    container.append(`
                    <div class="rating-right-part">
                    <p><i class="fas fa-star mr-2"></i>${row.calificacion}</p>
                    <div class="progress-1" data-rating="${(row.count / num)*100}"></div>
                    </div>`
                    );
                });
            }
            else {
                //container.html('<div class="text-center w-100"><p>Todavía no hay ninguna reseña.</p></div>')
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
}*/
