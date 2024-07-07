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
                    <div class="col-12 mt-1 text-center"><span class="titulo-index">Clientes Eliminados</span></div>
                </div>
            </div>

            <div class="card-body">
                <table id="tabla" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="text-center">Teléfonos</th>
                            <th>Correo</th>
                            <th>Fecha Carga</th>
                            <th style="text-align: center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="text-danger align-middle">{{ $cliente->nombre }}</td>
                                <td class="align-middle">{{ $cliente->telefonos }}</td>
                                <td class="align-middle">{{ $cliente->correo }}</td>
                                <td class="align-middle">{{ $cliente->created_at }}</td>
                                <td class="align-middle" style="width: 18em; text-align: center">
                                    <div class="btn-group" role="group">
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">

                                            @method('DELETE')
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-red" data-bs-toggle="modal"
                                                data-bs-target="#modalConfirmacion_{{ $cliente->id }}">
                                                Restaurar Cliente
                                            </button>

                                            <div class="modal" id="modalConfirmacion_{{ $cliente->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content custom-fondo">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">¿Seguro que desea restaurar?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">
                                                                <strong><label>El Cliente: {{ $cliente->nombre }}</label></strong>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Sí,
                                                                Restaurar</button>
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
