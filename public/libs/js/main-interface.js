//* Funcion para desaparecer automaticamente mensajes de error con id="alerta"
window.onload = () => {
    setTimeout(() => {
        if (document.getElementById('alerta') != null) {
            document.getElementById('alerta').remove()
        }
    }, 4000);
}

//* Funcion para mostrar la imagen seleccionada en el input, incluso luego de una validación de input fallida
function mostrarImagen(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            // Muestra la imagen
            document.getElementById('ImagenLibro').src = e.target.result;

            // Guarda el nombre del archivo y la URL de la imagen en localStorage
            localStorage.setItem('caratula_file_name', input.files[0].name);
            localStorage.setItem('caratula_file_data_url', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}




