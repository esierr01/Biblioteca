//* Funcion para desaparecer automaticamente mensajes de error con id="alerta"
window.onload = () => {
    setTimeout(() => {
        if (document.getElementById('alerta') != null) {
            document.getElementById('alerta').remove()
        }
    }, 4000);
}

//* Funcion para activar datatable y configurarla
new DataTable('#tabla', {
    responsive: true,
    language: {
        "processing": "Procesamiento en curso...",
        "search": "Buscar&nbsp;:",
        "lengthMenu": "Mostrar _MENU_ elementos",
        "info": "Mostrando elementos _START_ a _END_ de _TOTAL_ elementos",
        "infoEmpty": "Mostrando elementos 0 a 0 de 0 elementos",
        "infoFiltered": "(filtrados de _MAX_ elementos en total)",
        "infoPostFix": "",
        "loadingRecords": "Cargando...",
        "zeroRecords": "No hay elementos para mostrar",
        "emptyTable": "No hay datos disponibles en la tabla",
        "paginate": {
            "first": "Primero",
            "previous": "Anterior",
            "next": "Siguiente",
            "last": "Último"
        },
        "aria": {
            "sortAscending": ": activar para ordenar la columna en orden ascendente",
            "sortDescending": ": activar para ordenar la columna en orden descendente"
        }
    },
    "pageLength": 10, // Número de registros que quieres mostrar por defecto
    "lengthMenu": [5, 10, 15, 20] // Opciones de cantidad de registros por página en el menú desplegable
});

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

//* Procedimiento y funcion para que guarde el nombre del archivo de caratula seleccionado en caso de error en validación
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('formFileSm');
    const imgElement = document.getElementById('ImagenLibro');

    // Limpiar localStorage si la página se carga sin errores de validación
    if (!document.querySelector('.text-danger')) {
        localStorage.removeItem('caratula_file_name');
        localStorage.removeItem('caratula_file_data_url');
    }

    // Verifica si hay un nombre de archivo y una URL de imagen guardados en localStorage
    const savedFileName = localStorage.getItem('caratula_file_name');
    const savedFileDataURL = localStorage.getItem('caratula_file_data_url');

    if (savedFileName && savedFileDataURL) {
        // Crea un nuevo archivo vacío con el mismo nombre guardado (solo para mostrar el nombre)
        const file = new File([""], savedFileName);
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;

        // Muestra la imagen guardada
        imgElement.src = savedFileDataURL;
    }

    // Escucha el evento de cambio del input de archivo
    fileInput.addEventListener('change', function (event) {
        mostrarImagen(event);
    });
});