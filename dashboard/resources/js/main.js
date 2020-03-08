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

$(document).ready(function () {
    $(".toggle").click(function () {
        $(".wrapper").toggleClass("hide");
    });
});

var colors = [
    '#FEDB3F',
    '#28a745',
    '#333333',
    '#c3e6cb',
    '#dc3545',
    '#6c757d'
];

/* bar chart */
var chBar = document.getElementById("chBar");
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

$(document).ready( function () {
    $('#table').DataTable({
        responsive: true
    });
} );

// $(document).ready(function () {
//     $(".dash__table_button").click( function () {
//         if (window.matchMedia('(max-width: 425px)').matches == true){
//             alert("yets");
//             $('#table').DataTable({
//                 responsive: true
//             });
//         }
//     });
// } );

// $(document).ready(function () {
//     var mql = window.matchMedia("max-width: 425px");
//     if (mql.matches) {
//         alert("yes");
//     };
// } )

$(function () {
    if (window.matchMedia('(max-width: 425px)').matches){
        document.getElementById('check_mq').classList.remove("w-75");
        document.getElementById('check_mq').classList.add("w-100");
    }
});

// $().ready(
//     function () {
//         $(".dash__table_button").click(
//             function () {
//                 alert(window.matchMedia("max-width: 425px").matches);

//             }
//         )
//     }
// )

// let mql = window.matchMedia('(max-width: 425px)');
//         if (mql.matches){
//             alert('a');
//         }

// if(mql){
//     alert(document.getElementById("check_mq").classList.contains("w-75"));
// }

// document.querySelector(".mq-value").innerText = mql.matches;
