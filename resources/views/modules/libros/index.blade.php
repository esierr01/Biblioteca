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
                    <div class="col-6 mt-1"><span class="titulo-index">Libros Existentes</span></div>
                    <div class="col-6 d-flex justify-content-end">
                        <a class="btn btn-blue mx-1" href="{{ route('libros.create') }}"><i
                                class="fa-solid fa-circle-plus"></i> Incluir Nuevo Libro</a>
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
                                <td class="text-primary align-middle" width="50px">{{ $libro->titulo }}</td>
                                <td class="text-center">
                                    @if ($libro->caratula != '')
                                        <a href="{{ asset('storage') . '/' . $libro->caratula }}" target="_blank">
                                            <img class="portada-libro" src="{{ asset('storage') . '/' . $libro->caratula }}"
                                                alt="Title" />
                                        </a>
                                    @else
                                        <a href="{{ asset('libs/img/no_disponible.png') }}" target="_blank">
                                            <img class="portada-libro" src="{{ asset('libs/img/no_disponible.png') }}"
                                                alt="Title" />
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center align-middle">{{ $libro->ano_publica }}</td>
                                <td class="align-middle" width="30px">{{ $libro->autor }}</td>
                                <td class="text-center align-middle" width="20px">{{ $libro->edicion }}</td>
                                <td class="text-center align-middle" width="20px">{{ $libro->ejemplares }}</td>
                                <td class="text-center align-middle" width="20px">{{ $libro->disponibles }}</td>
                                <td class="align-middle" width="20px">{{ $libro->created_at }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('libros.edit', $libro->id) }}" type="button"
                                            class="btn btn-sm btn-blue">Editar</a>

                                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">

                                            @method('DELETE')
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-red" data-bs-toggle="modal"
                                                data-bs-target="#modalConfirmacion_{{ $libro->id }}">
                                                Eliminar
                                            </button>

                                            <div class="modal" id="modalConfirmacion_{{ $libro->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content custom-fondo">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">¿Seguro que desea eliminar?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">
                                                                <strong><label>El libro: {{ $libro->titulo }}, del autor:
                                                                        {{ $libro->autor }}</label></strong>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Sí,
                                                                Borrar</button>
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
