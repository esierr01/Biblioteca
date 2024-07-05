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

//* Validación de los input del form de libros
document.getElementById('enviarBtn').addEventListener('click', function (event) {
    var ejemplares = document.getElementById('ejemplares').value;
    var disponibles = document.getElementById('disponibles').value;
    var titulo = document.getElementById('titulo').value;
    var autor = document.getElementById('autor').value;
    var errorSpanDisponible = document.getElementById('errorDisponible');
    var errorSpanTitulo = document.getElementById('errorTitulo');
    var errorSpanAutor = document.getElementById('errorAutor');

    if (parseInt(disponibles) > parseInt(ejemplares)) {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanDisponible.textContent = 'Los ejemplares disponibles no pueden ser mayores que los existentes';
        errorSpanDisponible.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanDisponible.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

    if (titulo.trim() === '') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanTitulo.textContent = 'El título es requerido para cargar un libro';
        errorSpanTitulo.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanTitulo.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

    if (autor.trim() === '') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanAutor.textContent = 'El autor es requerido para cargar un libro';
        errorSpanAutor.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanAutor.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }
});

