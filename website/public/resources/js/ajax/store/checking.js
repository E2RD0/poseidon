const API_CARRITO = HOME_PATH + 'api/store/cart.php?action=';
const greet = () => console.log("Hello World!");
const debouncedGreet = debounce(greet, 3000);

$(function () {
    readCart($('#productosSpinner')[0]);
    getAddress();
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
            if (response.status != 9) {
                let jsonResponse = response.dataset;
                let productos = "";
                let total = 0;

                jsonResponse.forEach((producto) => {
                    total += producto.preciounitario * producto.cantidad;
                    productos += `
                                <div class="d-flex align-items-center mb-5 justify-content-between">
                                    <div class="d-flex">
                                        <img src="${
                                            HOME_PATH +
                                            "resources/img/tienda/products/" +
                                            producto.imgurl
                                        }" alt="" width="70" class="img-fluid rounded-circle shadow-sm">
                                        <div class="d-flex flex-column align-middle justify-content-around px-3 check-title">
                                            <h6 class="mb-0">
                                                <a href="#" class="text-dark d-inline-block align-middle text-truncate" style="max-width: 160px;" title="${
                                                    producto.nombre
                                                }">${producto.nombre}</a>
                                            </h6>
                                            <span class="text-muted font-weight-light">#${
                                                producto.idproducto
                                            }</span>
                                        </div>
                                    </div>
                                    <strong class="d-inline-block ml-3">$${(
                                        producto.preciounitario *
                                        producto.cantidad
                                    ).toFixed(2)}</strong>
                                </div>`;
                });
                $("#carrito").html(productos);
                $("#total").html("$" + total.toFixed(2));
            } else {
                swal(
                    3,
                    "Se te ha cerrado la sesión, redireccionando al inicio de sesión...",
                    "store/user/login",
                    5000
                );
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

function getAddress(){
    $.ajax({
        url: API_CARRITO + 'getAddress',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            if (response.status != 9) {
                if (response.status > 0) {
                    $("#inputeAddress").val(response.dataset);
                }
            } else {
                swal(3, 'Se te ha cerrado la sesión, redireccionando al inicio de sesión...', 'store/user/login', 5000);
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
}

$("#checking-form").submit(function (event) {
    event.preventDefault();
    confirmCheck();
    //debouncedGreet();
});

function confirmCheck(){
    $.ajax({
        url: API_CARRITO + "finishOrder",
        type: "post",
        data: $( '#checking-form' ).serialize(),
        dataType: "json",
        success: function (response) {
            if (response.status != 9) {
                function red(){
                    redirect("store/user/dashboard");
                }
                if (response.status > 0) {
                    swal( 4, response.message, undefined, undefined, undefined, red);
                }
            } else {
                swal(3, 'Se te ha cerrado la sesión, redireccionando al inicio de sesión...', 'store/user/login', 5000);
            }

        },
        error: function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + " " + jqXHR.statusText);
            }
        },
    });
};
