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
                    <div class="col-6 mt-1"><span class="titulo-index">Prestamos Activos</span></div>
                    <div class="col-6 d-flex justify-content-end">
                        <a class="btn btn-blue mx-1" href="{{ route('prestamos.create') }}"><i
                                class="fa-solid fa-circle-plus"></i> Cargar Nuevo Prestamo</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="tabla" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Estatus</th>
                            <th>Libro</th>
                            <th>Cliente</th>
                            <th>Fecha Prestamo</th>
                            <th width="100px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prestamos as $prestamo)
                            <tr style="align-content: center;">
                                @if ($prestamo->estatus == 0)
                                    <td class="text-light bg-success text-center">ACTIVO</td>
                                @else
                                    <td class="text-light bg-danger text-center">CERRADO</td>
                                @endif
                                <td>{{ $prestamo->Libro->titulo }}</td>
                                <td>{{ $prestamo->Cliente->nombre }}</td>
                                <td>{{ $prestamo->created_at }}</td>
                                <td style="width: 18em">
                                    @if ($prestamo->estatus == 0)
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST">

                                                @method('DELETE')
                                                @csrf

                                                <button type="button" class="btn btn-sm btn-red" data-bs-toggle="modal"
                                                    data-bs-target="#modalConfirmacion_{{ $prestamo->id }}">
                                                    Devolver Libro
                                                </button>

                                                <div class="modal" id="modalConfirmacion_{{ $prestamo->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content custom-fondo">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">¿Seguro que desea devolver?</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-center">
                                                                    <strong><label>El Libro: {{ $prestamo->Libro->titulo }}, que
                                                                            esta en prestamo a:
                                                                            {{ $prestamo->Cliente->nombre }}</label></strong>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-danger">Sí,
                                                                    Devolver</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
