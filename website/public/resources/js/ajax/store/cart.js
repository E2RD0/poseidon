const API_CARRITO = HOME_PATH + 'api/store/cart.php?action=';

$(function () {
    readCart($('#productosSpinner')[0]);
});

function readCart(el = false){
    $.ajax({
        url: API_CARRITO + 'readCart',
        type: 'post',
        beforeSend: function before() { if(el) {
                el.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
            }
        },
        dataType: 'json',
        success: function (response) {
            if(response.status > 0){
                let jsonResponse = response.dataset;
                let productos = '';
                let total = 0;

                jsonResponse.forEach(producto => {
                    total += producto.preciounitario*producto.cantidad;
                    productos += `
                                <tr iddetalleorden="${producto.iddetalleorden}">
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="${HOME_PATH + 'resources/img/tienda/products/'+producto.imgurl}" alt="" width="70" class="img-fluid rounded-circle shadow-sm" id="imagen">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle text-wrap overflow-hidden" id="nombreproducto" title="${producto.nombre}">${producto.nombre}</a></h5><span class="text-muted font-weight-light" id="idproducto" title="#${producto.idproducto}">#${producto.idproducto}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle" id="precio"><strong title="$${producto.preciounitario}">$${producto.preciounitario}</strong></td>
                                    <td class="align-middle">
                                        <div class='ctrl mx-auto' min="1" max="5">
                                            <div class='ctrl__button ctrl__button--decrement' id="subtract">&ndash;</div>
                                            <div class='ctrl__counter'>
                                                <input class='ctrl__counter-input' maxlength='10' type='text' value='1'>
                                                <div class='ctrl__counter-num' id="cantidad" >${producto.cantidad}</div>
                                            </div>
                                            <div class='ctrl__button ctrl__button--increment' id="add">+</div>
                                        </div>
                                    </td>
                                    <td class="align-middle" id="subtotal"><strong title="$${producto.preciounitario*producto.cantidad}">$${producto.preciounitario*producto.cantidad}</strong></td>
                                    <td class="border-0 align-middle">
                                        <button type="button" class="close review__close" id="review_eliminar" onclick="deleteProduct(${producto.iddetalleorden}, this)">
                                            <span aria-hidden="true">
                                                <i class="fas fa-times p-1"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>`;
                });
                $('#productosOrden').html(productos);
                $('#cartEnd').html(`<p class="my-0 mr-4">Costo total: <strong id="total">$${total.toFixed(2)}</strong></p>
                                    <a href="../user/checking" class="btn btn--cta btn-primary">Continuar</a>`);
                $('#productosSpinner').html('');
            } else {
                $('#productosSpinner').html('Aún no has comprado nada. <a href="store/shop">Regresar a la tienda.</a>');
            }
        },
        error: function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        }});
};

function deleteProduct(id, el = false){
    let identifier = {iddetalleorden: id};
    confirmDelete( API_CARRITO, identifier, el, '¿Desea eliminar el producto?', readCart());
}
