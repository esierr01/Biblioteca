@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

{{-- @section('titulo-modulo', 'Menu Principal') --}}

@section('menu_seleccionado')
    @include('modules.partials.nav-menu')
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
<link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
@endsection

@section('content')
    <div class="container contenedor-index">
        <div class="card">
            <div class="card-header">
                <div class="row col-12">
                    <div class="col-6 mt-1"><span class="titulo-index">Libros Existentes</span></div>
                    <div class="col-6 d-flex justify-content-end">
                        <a class="btn btn-blue mx-1" href="">Incluir Nuevo Libro</a>
                    </div>                
                </div>
            </div>

            <div class="card-body">
                <table id="tabla" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Carátula</th>
                            <th>Publicación</th>
                            <th>Autor</th>
                            <th>Edición</th>
                            <th>Ejemplares</th>
                            <th>Disponibles</th>
                            <th>Fecha Carga</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td class="text-primary" width="50px">{{ $libro->titulo }}</td>
                                <td class="text-center">
                                    <img class="portada-libro" src="{{ $libro->caratula }}" alt="Title" />
                                </td>
                                <td class="text-center">{{ $libro->ano_publica }}</td>
                                <td width="30px">{{ $libro->autor }}</td>
                                <td class="text-center" width="20px">{{ $libro->edicion }}</td>
                                <td class="text-center" width="20px">{{ $libro->ejemplares }}</td>
                                <td class="text-center" width="20px">{{ $libro->disponibles }}</td>
                                <td width="20px">{{ $libro->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle btn-blue" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Opciones
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Editar</a></li>
                                            <li><a class="dropdown-item" href="#">Eliminar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script-final')
    <script>
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
@endsection
