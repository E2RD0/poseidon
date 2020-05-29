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
    }
  })
})
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
//Sidebar
$(document).ready(function () {
    $('.toggle').click(function () {
        $('.wrapper').toggleClass('hide');
    });
})
//Chart
var colors = [
    '#FEDB3F',
    '#28a745',
    '#333333',
    '#c3e6cb',
    '#dc3545',
    '#6c757d'
];
var chBar = document.getElementById('chBar');
if (chBar) {
    new Chart(chBar, {
        type: 'bar',
        data: {
            labels: [
                "Tabla de surf X",
                "Tabla de surf X",
                "Tabla de surf X",
                "Tabla de surf X",
                "Tabla de surf X",
                "Tabla de surf X"
            ],
            datasets: [
                 {
                    data: [
                        639,
                        465,
                        493,
                        478,
                        589,
                        632
                    ],
                    backgroundColor: colors[0]
                }
            ]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                xAxes: [
                    {
                        barPercentage: 0.4,
                        categoryPercentage: 0.5
                    }
                ]
            }
        }
    });
}
//Datatables initializer
/*$(document).ready( function () {
    $('#table').DataTable({
        responsive: true
    });
} )*/
//Adaptative Modals
$(function () {
    if (window.matchMedia('(max-width: 425px)').matches){
        document.getElementById('check_mq').classList.remove("w-75");
        document.getElementById('check_mq').classList.add("w-100");
    }
})
//Adaptative canvas -Doesn't works
$(document).ready(function () {
    $('.toggle').click(function () {
        document.getElementById('canva').classList.remove("col-lg-12");
        document.getElementById('canva').classList.add("col-lg-11");
    });
})
//Display selected image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );
input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'Nombre de archivo: ' + fileName;
}
