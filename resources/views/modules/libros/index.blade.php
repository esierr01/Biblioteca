@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('menu_seleccionado')
    @include('modules.partials.nav-backend')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f0926b9a9.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <script src="{{ asset('libs/js/main-interface.js') }}"></script>
@endsection

@section('content')
    <div class="container contenedor-index">
        <div class="card">
            <div class="card-header">
                <div class="row col-12">
                    <div class="col-6 mt-1"><span class="titulo-index">Libros Existentes</span></div>
                    <div class="col-6 d-flex justify-content-end">
                        <a class="btn btn-blue mx-1" href="{{ route('libros.create') }}"><i class="fa-solid fa-circle-plus"></i> Incluir Nuevo Libro</a>
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
                                    <a href="{{ $libro->caratula }}" target="_blank">
                                        <img class="portada-libro" src="{{ $libro->caratula }}" alt="Title" />
                                    </a>
                                    
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