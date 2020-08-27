//Navbar
$(document).ready(function () {
    var burger = document.querySelector(".burger-container"),
    nav = document.querySelector(".navbar--main");

    burger.onclick = function() {
        nav.classList.toggle("menu-opened");
        document.body.classList.toggle("no-scroll");
    };

    document.addEventListener("click", function(event) {
        var isClickInside = nav.contains(event.target);
        if (!isClickInside && nav.classList.contains("menu-opened")) {
            nav.classList.remove("menu-opened");
            document.body.classList.toggle("no-scroll");
        };
    });

    if (getSidebarStatus() == 'toggled') {
       hideSidebar();
    }
    $('.toggle').click(function () {
        if (getSidebarStatus() == 'toggled') setSidebarStatus('extended'); else setSidebarStatus('toggled');
    });

})

function hideSidebar(){
    $('.wrapper').toggleClass('hide');
};

function getSidebarStatus(){
    let sidebarStatus = '';
    $.ajax({
        async: false,
        url: HOME_PATH + 'api/dashboard/users.php?action=getSidebar',
        dataType: 'json',
        success: function( response ) {
            if ( response.status ) {
                sidebarStatus = response.dataset.status;
            } else {
                swal( 2, response.exception );
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
    return sidebarStatus;
};

function setSidebarStatus(status){
    let data = {'status': status};
    $.ajax({
        url: HOME_PATH + 'api/dashboard/users.php?action=setSidebar',
        type: 'post',
        data: data,
        success: function( response ) {
            if ( response.status ) {
                hideSidebar();
            } else {
                swal( 2, response.exception );
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
};

//Materialize's Textfields
const setActive = (el, active) => {
    const formField = el.parentNode.parentNode
    if (active) {
        formField
            .classList
            .add('form-field--is-active')
    } else {
        formField
            .classList
            .remove('form-field--is-active')
        el.value === ''
            ? formField
                .classList
                .remove('form-field--is-filled')
            : formField
                .classList
                .add('form-field--is-filled')
    }
}
[].forEach
    .call(
        document.querySelectorAll('.form-field__input, .form-field__textarea'),
        (el) => {
            el.onblur = () => {
                setActive(el, false)
            }
            el.onfocus = () => {
                setActive(el, true)
            }
        }
)
//Adaptative Modals
$(function () {
    if (window.matchMedia('(max-width: 425px)').matches){
        document.getElementById('check_mq').classList.remove("w-75");
        document.getElementById('check_mq').classList.add("w-100");
    }
})

//Display selected image
function readURL(input) {
    if (input.files) {
        /*var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);*/
        var imgArea = document.getElementById('img-area');
        imgArea.innerHTML = '';
        for (var i = 0; i < input.files.length; i++) { //for multiple files

            (function(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement("img");
                    $(img).attr('src', e.target.result);
                    imgArea.appendChild(img);
                }
                reader.readAsDataURL(file);
            })(input.files[i]);
        }
    }
}
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );
input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'Archivo: ' + fileName;
}
