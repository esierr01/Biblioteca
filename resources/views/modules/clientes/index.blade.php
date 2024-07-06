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
                    <div class="col-6 mt-1"><span class="titulo-index">Clientes Existentes</span></div>
                    <div class="col-6 d-flex justify-content-end">
                        <a class="btn btn-blue mx-1" href="{{ route('clientes.create') }}"><i
                                class="fa-solid fa-circle-plus"></i> Incluir Nuevo Cliente</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="tabla" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfonos</th>
                            <th>Correo</th>
                            <th>Fecha Carga</th>
                            <th width="100px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="text-primary">{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->telefonos }}</td>
                                <td>{{ $cliente->correo }}</td>
                                <td>{{ $cliente->created_at }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" type="button"
                                            class="btn btn-sm btn-blue">Editar</a>

                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">

                                            @method('DELETE')
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-red" data-bs-toggle="modal"
                                                data-bs-target="#modalConfirmacion_{{ $cliente->id }}">
                                                Eliminar
                                            </button>

                                            <div class="modal" id="modalConfirmacion_{{ $cliente->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content custom-fondo">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">¿Seguro que desea eliminar?</h5>
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
