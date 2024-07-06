<!DOCTYPE html>
<html lang="es"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('libs/img/libreria.ico') }}" type="image/x-icon">

    {{--* Estilos CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">

    @yield('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
</head>

<body>
    @yield('menu_seleccionado')

    <div class="container mt-3 mb-2 contenedor-titulo">
        @yield('titulo-modulo')
    </div>

    @yield('content')

    <footer>
        <hr>
        <p>Copyright © Biblioteca 2024 - Desarrolado por Emmanuel Sierra</p>
    </footer>

    {{--* Scripts del Sistema --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f0926b9a9.js" crossorigin="anonymous"></script>
    <script src="{{ asset('libs/js/main-interface.js') }}"></script>
   
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <script src="{{ asset('libs/js/main-interface.js') }}"></script>

    @yield('js')

    <script>
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
    </script>

</body>

</html>
