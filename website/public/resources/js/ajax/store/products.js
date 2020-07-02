const API_PRODUCTOS = HOME_PATH + 'api/store/products.php?action=';
const API_CATEGORIES = HOME_PATH + 'api/store/categories.php?action=';


$(document).ready(function () {
    getProductCategories();
    readRows(API_PRODUCTOS);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    if(dataset){
        $("#tab-all .row").html("");
        dataset.forEach( function(row) {
            product = `
            <div class="product has-post-thumbnail featured col-lg-3 col-md-6">
            <a href="${HOME_PATH + 'store/products/view/'+row.idproducto}" class="product__link">
              <div class="product__image">
                <img width="300" height="300" src="${HOME_PATH + 'resources/img/tienda/products/'+row.imgurl}" class="" alt="" srcset=""/>
              </div>
              <h2 class="product__title">${row.nombre}</h2>
              <span class="product__price">${row.precio}</span>
            </a>
            <div class="product__rating">
              <div class="star-rating" data-rating="${row.calificacion == null ? '-' : ''.repeat(Math.round(row.calificacion))}" title="${Math.round(row.calificacion * 10) / 10} de 5"><span class="review-count">(${Math.round(row.calificacion * 10) / 10})</span></div>
            </div>
          </div>`;
          $(`#tab-${row.categoria} .row`).append(product);
          $("#tab-all .row").append(product);
        });
        /*$(".mbox").each(function() {
            console.log($(this).html());
            mvar += $(this).html();
        });*/
    }
    else {
        $("#tab-all .row").html('No hay productos disponibles.');
    }
}

function getProductCategories(){
    $.ajax({
        url: API_CATEGORIES + 'show',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            let jsonResponse = response.dataset;
            let nav = $('ul.nav-categorias');
            let tabs = $('#productos-destacados');

            jsonResponse.forEach(row => {
                nav.append(`<li class="nav-item"><a data-toggle="tab" href="#tab-${row.categoria}" class="nav-link" aria-expanded="false">${row.categoria}</a></li>`);
                tabs.append(`
                    <div class="tab-pane" id="tab-${row.categoria}" role="tabpanel">
                      <div class="products products-featured row">
                        </div>
                    </div>`
                );
            });
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
