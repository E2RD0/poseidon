const API_PRODUCTOS = HOME_PATH + 'api/store/products.php?action=';

$(document).ready(function () {
    readRows(API_PRODUCTOS, $('#spinner')[0]);
    readRows(API_PRODUCTOS, false, 'info', productInfo);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    if(typeof dataset !== 'undefined' && dataset.length > 0){
        dataset.forEach( function(row) {
            product = `
            <div class="product has-post-thumbnail featured col-lg-4 col-md-6">
            <a href="${HOME_PATH + 'store/product/view/'+row.idproducto}" class="product__link">
              <div class="product__image">
                <img width="300" height="300" src="${HOME_PATH + 'resources/img/tienda/products/'+row.imgurl}" class="" alt="" srcset=""/>
              </div>
              <h2 class="product__title">${row.nombre}</h2>
              <span class="product__price">$${row.precio}</span>
            </a>
            <div class="product__rating">
              <div class="star-rating" data-rating="${row.calificacion == null ? '-' : ''.repeat(Math.round(row.calificacion))}" title="${Math.round(row.calificacion * 10) / 10} de 5"><span class="review-count">(${Math.round(row.calificacion * 10) / 10})</span></div>
            </div>
          </div>`;
          $(`#${row.categoria} .row`).append(product);
          $("#all .row").append(product);
        });
    }
    else {
        //$('#loadMoreProducts')
    }
}
function productInfo(dataset) {
    if(typeof dataset !== 'undefined'){
        $('#priceRangeLow').attr('min',Math.round(dataset.min));
        $('#priceRangeLow').attr('max',Math.round(dataset.max));
        $('#priceRangeLow').val(Math.round(dataset.min));
        $('#priceRangeHigh').attr('min',Math.round(dataset.min));
        $('#priceRangeHigh').attr('max',Math.round(dataset.max));
        $('#priceRangeHigh').val(Math.round(dataset.max));
        $('#inputRangeLow').attr('min',Math.round(dataset.min));
        $('#inputRangeLow').attr('max',Math.round(dataset.max));
        $('#inputRangeLow').val(Math.round(dataset.min));
        $('#inputRangeHigh').attr('min',Math.round(dataset.min));
        $('#inputRangeHigh').attr('max',Math.round(dataset.max));
        $('#inputRangeHigh').val(Math.round(dataset.max));
    }
}
$('.easy-basket-filter-info').change(range);
$('.easy-basket-filter-range').change(range);
$('#search').keyup(search);
function range(){
    $('#search').val('')
    let minRange = Math.min($('#priceRangeLow').val(), $('#priceRangeHigh').val());
    let maxRange = Math.max($('#priceRangeLow').val(), $('#priceRangeHigh').val());
    let minInput = $('#inputRangeLow').val();
    let maxInput = $('#inputRangeHigh').val();

    $(".products .product").each(function() {
        let price = $('.product__price', this).html().substr(1);
        if(parseInt(price) >= minRange && parseInt(price) <= maxRange){
            $(this).show();
        }
        else {
            $(this).hide();
        }
    });
}
function search(){
    let minRange = Math.min($('#priceRangeLow').val(), $('#priceRangeHigh').val());
    let maxRange = Math.max($('#priceRangeLow').val(), $('#priceRangeHigh').val());
    let search = $('#search').val();

    $(".products .product").each(function() {
        let price = $('.product__price', this).html().substr(1);
        let name = $('.product__title', this).html().trim();
        if(parseInt(price) >= minRange && parseInt(price) <= maxRange){
            if(name.startsWith(search) || name == search || name.search(search)!=-1){
                $(this).show();
            }
            else {
                $(this).hide();
            }
        }
    });
}
