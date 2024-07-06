@extends('modules.layout.layout-interface')

@section('title', 'Biblioteca')

@section('menu_seleccionado')
    @include('modules.partials.nav-bloqueado')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/css/style-backend.css') }}">
@endsection

@section('js')
    <script src="{{ asset('libs/js/main-form_pre.js') }}"></script>
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
                            <button id="enviarBtn" type="submit" class="btn btn-blue mx-1">Efectuar Prestamo</button>
                            <a class="btn btn-red mx-1" href="{{ route('prestamos.index') }}">Cancelar</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-8 offset-2 mt-2 text-center">

                            <div class="input-group mt-3 mx-2">
                                <label class="input-group-text" for="id_libro">Nombre del Libro:</label>
                                <select name="id_libro" class="form-select" id="id_libro">
                                    <option value="0" selected>Seleccione Libro ....</option>
                                    @foreach ($libros as $libro)
                                        <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="errorIdLibro"></span>

                            <div class="input-group mt-3 mx-2">
                                <label class="input-group-text" for="id_cliente">Cliente:</label>
                                <select name="id_cliente" class="form-select" id="id_cliente">
                                    <option value="0" selected>Seleccione Cliente ....</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="errorIdCliente"></span>

                            {{-- * Se coloca el campo estatus por defecto en 0 cuando se carga registro --}}
                            <input type="text" name="estatus" value="0" hidden>
                        </div>

                    </div>
                </div>
        </form>
    </div>
@endsection
