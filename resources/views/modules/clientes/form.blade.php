@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('menu_seleccionado')
    @include('modules.partials.nav-bloqueado')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('js')
    <script src="{{ asset('libs/js/main-form_cli.js') }}"></script>
@endsection

@section('content')
    <div class="container contenedor-index">
        <form @yield('accion') method="POST">
            @yield('metodo')
            @csrf

            <div class="card">
                <div class="card-header">
                    <div class="row col-12">
                        <div class="col-6 mt-1"><span class="titulo-index">@yield('titulo-index')</span></div>
                        <div class="col-6 d-flex justify-content-end">
                            <button id="enviarBtn" type="submit" class="btn btn-blue mx-1">Guardar Datos</button>
                            <a class="btn btn-red mx-1" href="{{ route('clientes.index') }}">Cancelar</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-8 offset-2 mt-2 text-center">

                            <div class="input-group mt-2 mx-2">
                                <span class="input-group-text" id="basic-addon1">Nombre completo</span>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    placeholder=".. Ingrese nombre completo del Cliente" aria-label="nombre"
                                    aria-describedby="basic-addon1"
                                    @isset($cliente) value="{{ $cliente->nombre }}" @else value="{{ old('nombre') }}" @endisset>

                            </div>
                            <span id="errorNombre"></span>

                            <div class="input-group mx-2 mt-4">
                                <span class="input-group-text" id="basic-addon1">Teléfonos</span>
                                <input type="text" id="telefonos" name="telefonos" class="form-control"
                                    placeholder=".. Ingrese telefonos del Cliente" aria-label="telefonos"
                                    aria-describedby="basic-addon1"
                                    @isset($cliente) value="{{ $cliente->telefonos }}" @else value="{{ old('telefonos') }}" @endisset>
                            </div>
                            <span id="errorTelefonos"></span>

                            <div class="input-group mx-2 mt-4">
                                <span class="input-group-text" id="basic-addon1">Correo</span>
                                <input type="text" id="correo" name="correo" class="form-control"
                                    placeholder=".. Ingrese correo del Cliente" aria-label="correo"
                                    aria-describedby="basic-addon1"
                                    @isset($cliente) value="{{ $cliente->correo }}" @else value="{{ old('correo') }}" @endisset>
                            </div>
                            <span id="errorCorreo"></span>

                            {{-- * Se coloca el campo estatus por defecto en 0 cuando se carga registro --}}
                            <input type="text" name="estatus" value="0" hidden>

                        </div>

                    </div>
                </div>
        </form>
    </div>
@endsection
