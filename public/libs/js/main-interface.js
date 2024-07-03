//* Funcion para desaparecer automaticamente mensajes de error con id="alerta"
window.onload = () => {
    setTimeout(() => {
        if (document.getElementById('alerta') != null) {
            document.getElementById('alerta').remove()
        }
    }, 4000);
}

//* Funcion para activar datatable
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

