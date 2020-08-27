"use strict";
const API_CARRITO = HOME_PATH + 'api/store/cart.php?action=';
const greet = () => console.log("Hello World!");
const debouncedGreet = debounce(greet, 3000);

$(function () {
    readCart($('#productosSpinner')[0]);
});

function readCart(el = false){
    $("#productosOrden").html('');
    $('#cartEnd').html('');
    $.ajax({
        url: API_CARRITO + 'readCart',
        async: false,
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
                                        <div class='ctrl mx-auto' min="1" max="100">
                                            <div class='ctrl__button ctrl__button--decrement' id="subtract">&ndash;</div>
                                            <div class='ctrl__counter'>
                                                <input class='ctrl__counter-input' maxlength='10' type='text' value='${producto.cantidad}'>
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
                controls();
            } else {
                $('#productosSpinner').html('Aún no has comprado nada. <a href="../shop">Regresar a la tienda.</a>');
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
    confirmDelete( API_CARRITO, identifier, el, '¿Desea eliminar el producto?', readCart);
}

function updateProduct(){

}

function controls(){
    if ($(".ctrl").length) {
        function ctrls(element, min, max) {
            var _this = this;

            this.counter = 1;
            this.els = {
                decrement: element.querySelector(".ctrl__button--decrement"),
                counter: {
                    container: element.querySelector(".ctrl__counter"),
                    num: element.querySelector(".ctrl__counter-num"),
                    input: element.querySelector(".ctrl__counter-input"),
                },
                increment: element.querySelector(".ctrl__button--increment"),
            };

            this.decrement = function () {
                var counter = _this.getCounter();
                var nextCounter = _this.counter > min ? --counter : counter;
                _this.setCounter(nextCounter);
            };

            this.increment = function () {
                var counter = _this.getCounter();
                var nextCounter = counter < max ? ++counter : counter;
                _this.setCounter(nextCounter);
            };

            this.getCounter = function () {
                return _this.counter;
            };

            this.setCounter = function (nextCounter) {
                _this.counter = nextCounter;
            };

            this.debounce = function (callback) {
                setTimeout(callback, 100);
            };

            this.render = function (hideClassName, visibleClassName) {
                _this.els.counter.num.classList.add(hideClassName);

                setTimeout(function () {
                    _this.els.counter.num.innerText = _this.getCounter();
                    _this.els.counter.input.value = _this.getCounter();
                    _this.els.counter.num.classList.add(visibleClassName);
                }, 100);

                setTimeout(function () {
                    _this.els.counter.num.classList.remove(hideClassName);
                    _this.els.counter.num.classList.remove(visibleClassName);
                }, 200);
            };

            this.ready = function () {
                _this.els.decrement.addEventListener("click", function () {
                    _this.debounce(function () {
                        _this.decrement();
                        _this.render("is-decrement-hide", "is-decrement-visible");
                        updateProduct();
                    });
                });

                _this.els.increment.addEventListener("click", function () {
                    _this.debounce(function () {
                        _this.increment();
                        _this.render("is-increment-hide", "is-increment-visible");
                        updateProduct();
                    });
                });

                _this.els.counter.input.addEventListener("input", function (e) {
                    var parseValue = parseInt(e.target.value);
                    if (
                        !isNaN(parseValue) &&
                        parseValue >= min &&
                        parseValue <= max
                    ) {
                        _this.setCounter(parseValue);
                        _this.render();
                    }
                });

                _this.els.counter.input.addEventListener("focus", function (e) {
                    _this.els.counter.container.classList.add("is-input");
                });

                _this.els.counter.input.addEventListener("blur", function (e) {
                    _this.els.counter.container.classList.remove("is-input");
                    _this.render();
                    updateProduct();
                });
            };
        }

        // init
        document.querySelectorAll(".ctrl").forEach((ctrl) => {
            var controls = new ctrls(
                ctrl,
                ctrl.getAttribute("min"),
                ctrl.getAttribute("max")
            );
            document.addEventListener("DOMContentLoaded", controls.ready);
        });
    }
}
