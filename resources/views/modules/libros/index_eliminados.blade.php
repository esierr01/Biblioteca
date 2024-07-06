@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('menu_seleccionado')
    @include('modules.partials.nav-backend')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('content')
    <div class="container contenedor-index">
        @if ($msj = Session::get('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert" id="alerta">
                        <strong><i class="fa-solid fa-check"></i></strong> {{ $msj }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        @if ($msj = Session::get('msg_error'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alerta">
                        <strong><i class="fa-solid fa-check"></i></strong> {{ $msj }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="row col-12">
                    <div class="col-12 mt-1 text-center"><span class="titulo-index">Libros Eliminados</span></div>
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
                            <th>Fecha Eliminado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td class="text-danger" width="50px">{{ $libro->titulo }}</td>
                                <td class="text-center">
                                    @if ($libro->caratula != '')
                                        <a href="{{ asset('storage') . '/' . $libro->caratula }}" target="_blank">
                                            <img class="portada-libro" src="{{ asset('storage') . '/' . $libro->caratula }}"
                                                alt="Title" />
                                        </a>
                                    @else
                                        <a href="{{ asset('libs/img/no_disponible.png') }}" target="_blank">
                                            <img class="portada-libro"
                                                src="{{ asset('libs/img/no_disponible.png') }}" alt="Title" />
                                        </a>
                                    @endif
                                <td class="text-center">{{ $libro->ano_publica }}</td>
                                <td width="30px">{{ $libro->autor }}</td>
                                <td class="text-center" width="20px">{{ $libro->edicion }}</td>
                                <td class="text-center" width="20px">{{ $libro->ejemplares }}</td>
                                <td class="text-center" width="20px">{{ $libro->disponibles }}</td>
                                <td width="20px">{{ $libro->fecha_eliminado }}</td>
                                <td>
                                    <div class="btn-group" role="group">

                                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">

                                            @method('DELETE')
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-red" data-bs-toggle="modal" data-bs-target="#modalConfirmacion_{{ $libro->id }}">
                                                Restaurar Libro
                                            </button>

                                            <div class="modal" id="modalConfirmacion_{{ $libro->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content custom-fondo">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">¿Seguro que desea restaurar?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">
                                                                <strong><label>El libro: {{ $libro->titulo }}, del autor: {{ $libro->autor }}</label></strong><br>
                                                                <strong><label>Que fue eliminado el {{ $libro->fecha_eliminado }}</label></strong>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Sí, Restaurar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

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
