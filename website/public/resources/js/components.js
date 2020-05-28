//Check for errors on input fields
function checkFields(errors, fieldName){
    var label = document.getElementById('error' + fieldName);
    var input = document.getElementById('input' + fieldName);
    if (errors[fieldName]) {
        label.innerHTML = errors[fieldName][0];
        input.classList.add('error');
    }
    else{
        if(input.classList.contains('error')){
            input.classList.remove('error');
        }
        label.innerHTML = '';
    }
}

//shows an alert
function swal(type, text, url = false, timer=0, allowCancel = false){
    switch (type) {
        case 1:
            title = "Éxito";
            icon = "success";
            break;
        case 2:
            title = "Error";
            icon = "error";
            break;
        case 3:
            title = "Advertencia";
            icon = "warning";
            break;
        case 4:
            title = "Confirmar";
            icon = "question";
            break;
        default:
            title = "Aviso";
            icon = "info";
    }
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: timer,
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancelar',
        allowOutsideClick: allowCancel,
        allowEscapeKey: allowCancel
    })
    .then(function() {
        if(url){
            redirect(url);
        }
    });
}

//redirects to specified url
function redirect(url){
    window.location.replace(window.location.origin + HOME_PATH + url);
}
