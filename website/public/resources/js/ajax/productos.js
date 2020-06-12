const API_PRODUCTOS = HOME_PATH + 'api/dashboard/productos.php?action=';
const API_REVIEW = HOME_PATH + 'api/dashboard/reviews.php?action=';

$(document).ready(function () {
    readRows(API_PRODUCTOS, $('#productosSpinner')[0]);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    var table = $('#table');
    if ($.fn.dataTable.isDataTable(table)) {
        table = $('#table').DataTable();
        table.clear();
        table.rows.add(dataset);
        table.draw();
    }
    else {
        table.DataTable({
            responsive: true,
            data: dataset,
            language: {
                url: HOME_PATH + 'resources/es_ES.json'
            },
            columnDefs: [
                {
                    targets: '_all',
                    className: 'td-actions text-center'
                }
            ],
            columns: [
                { data: 'idproducto' },
                { data: 'nombre' },
                {
                    data: null,
                    render: function (data, type, row) {
                        let style = (data['cantidad'] <= 500 && data['cantidad'] >= 60) ? 'bg-success' : ((data['cantidad'] < 60 && data['cantidad'] >= 20) ? 'bg-warning' : 'bg-danger');
                        return `
                        <div class="w-100">
                            <div class="progress">
                                <div class="progress-bar ${style}" role="progressbar" style="width: ${data['cantidad']}%" aria-valuenow="${data['cantidad']}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="dash__sc1c_text">${data['cantidad']} restantes</p>
                        </div>`;
                    },
                    targets: -1
                },
                { data: 'precio' },
                { data: 'categoria' },
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button" onclick="modifyOrder(${data['idproducto']}, this)">
                                    <span>
                                        <i class="fas fa-edit"></i>
                                        <p>Modíficar</p>
                                    </span>
                                </button>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#review" id="modal_open" onclick="getProductReviewsData(${data['idproducto']}, this)">
                                    <span>
                                        <i class="fas fa-comments"></i>
                                        <p>Reseñas</p>
                                    </span>
                                </button>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" type="button" onclick="deleteProduct(${data['idproducto']}, this)">
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
        });
    }
}

function getProductReviewsData(idproducto, el = false ) {
    let identifier = { 'idproducto': idproducto };

    $.ajax({
        url: API_REVIEW + 'productReviewData',
        type: 'post',
        data: identifier,
        dataType: 'json',
        success: function (response) {
            let jsonResponse = response.dataset;
            let empty = false;

            jsonResponse.forEach(rental => {
                empty = (rental.reviews == 0) ? true : false;
                $('#producto').html(rental.producto);
                $('#review_contador').html(rental.reviews+' reseñas');
            });

            getProductReviews(identifier, el, empty);
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

function getProductReviews(identifier, el = false, empty = false ){
    if (empty === false){
        $.ajax({
            url: API_REVIEW + 'reviews',
            type: 'post',
            data: identifier,
            dataType: 'json',
            success: function (response) {
                let jsonResponse = response.dataset;
                let reviews = '';

                jsonResponse.forEach(review => {
                    reviews += `
                                <div class="col-12 col-md-6 my-3 mx-auto">
                                    <div class="col-12 shadow bg-white">
                                        <div class="row justify-content-center">
                                            <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                                <div class="col-12">
                                                    <p class="font-weight-bold" id="review_cliente">${review.cliente}</p>
                                                </div>
                                                <div class="col-12 mt-n3 review__punctuation">
                                                    <p>Puntuación:</p>
                                                </div>
                                                <div class="col-12 mt-n2">
                                                    <p class="ml-xl-5 review__grade" id="review_puntuacion">${review.puntuacion}</p>
                                                </div>
                                                <div class="col-12 ml-xl-n3 mt-n2">
                                                    <div class="star-rating" title="Puntuado ${review.puntuacion} de 5" id="review_puntuacion_titulo">
                                                        <span class="review-count" id="review_puntuacion_cantidad">(${review.puntuacion})</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                                <div class="row">
                                                    <div class="col-11 text-right">
                                                        <button type="button" class="close review__close" id="review_eliminar" onclick="deleteReview(${review.idreview}, this)">
                                                            <span aria-hidden="true">
                                                                <i class="fas fa-times p-1"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="mr-xl-5" id="review_comentario">${review.comentario}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                });
                $('#review_contenedor').html(reviews);
            },
        error: function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        }});
    } else {
        let reviewContainerContent = `
                            <div class="col-12 justify-content-center">
                                <p class="text-center">No hay reseñas para este producto</p>
                            </div>`;
        $('#review_contenedor').html(reviewContainerContent);
    }
};

function modifyOrder(id, el = false){
    console.log(id);
}

function deleteOrder(id, el = false){
    console.log(id);
}
